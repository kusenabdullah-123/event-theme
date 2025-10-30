<?php
// =======================
// 🔹 REGISTER POST TYPE: PENILAIAN
// =======================
function RegisterPostTypePenilaian()
{
    $labels = array(
        'name'               => 'Penilaian',
        'singular_name'      => 'Penilaian',
        'menu_name'          => 'Penilaian',
        'add_new'            => 'Tambah Baru',
        'add_new_item'       => 'Tambah Penilaian Baru',
        'new_item'           => 'Penilaian Baru',
        'edit_item'          => 'Edit Penilaian',
        'view_item'          => 'Lihat Penilaian',
        'all_items'          => 'Semua Penilaian',
        'search_items'       => 'Cari Penilaian',
        'not_found'          => 'Tidak ditemukan.',
        'not_found_in_trash' => 'Tidak ditemukan di tong sampah.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'penilaian'),
        'show_in_rest'       => false,
    );

    register_post_type('penilaian', $args);
}
add_action('init', 'RegisterPostTypePenilaian');

// =======================
// 🔹 Tambah Metabox Upload Multi PDF + Tanggal
// =======================
function penilaian_add_pdf_metabox() {
    add_meta_box(
        'penilaian_pdf_box',
        'Detail Penilaian',
        'penilaian_pdf_box_callback',
        'penilaian',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'penilaian_add_pdf_metabox');

function penilaian_pdf_box_callback($post) {
    $pdf_urls = get_post_meta($post->ID, '_penilaian_pdfs', true);
    $tanggal = get_post_meta($post->ID, '_penilaian_tanggal', true);
    if (!is_array($pdf_urls)) $pdf_urls = [];
    ?>
    <p>
        <label for="penilaian_tanggal"><strong>Tanggal Pelaksanaan:</strong></label><br>
        <input type="date" name="penilaian_tanggal" id="penilaian_tanggal" 
               value="<?php echo esc_attr($tanggal); ?>" style="width: 250px;">
    </p>

    <hr>

    <p><strong>File PDF Saat Ini:</strong></p>
    <?php if (!empty($pdf_urls)): ?>
        <ul style="margin-left: 20px;">
            <?php foreach ($pdf_urls as $url): ?>
                <li>
                    <a href="<?php echo esc_url($url); ?>" target="_blank">
                        <?php echo basename($url); ?>
                    </a>
                    <label style="color:red; margin-left:10px;">
                        <input type="checkbox" name="hapus_pdf[]" value="<?php echo esc_attr($url); ?>">
                        Hapus
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p><em>Belum ada file PDF diunggah.</em></p>
    <?php endif; ?>

    <hr>

    <p>
        <label for="penilaian_pdf_upload"><strong>Upload File PDF Baru (bisa lebih dari satu):</strong></label><br>
        <input type="file" name="penilaian_pdf_upload[]" id="penilaian_pdf_upload" accept="application/pdf" multiple><br>
        <small>Hanya file .pdf yang diperbolehkan.</small>
    </p>
    <?php
}

// =======================
// 🔹 Pastikan form admin bisa upload file
// =======================
function penilaian_form_enctype_fix() {
    echo ' enctype="multipart/form-data"';
}
add_action('post_edit_form_tag', 'penilaian_form_enctype_fix');


// =======================
// 🔹 Simpan banyak PDF dan tanggal
// =======================
function penilaian_save_pdf($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Simpan tanggal
    if (isset($_POST['penilaian_tanggal'])) {
        update_post_meta($post_id, '_penilaian_tanggal', sanitize_text_field($_POST['penilaian_tanggal']));
    }

    // Ambil data lama
    $existing_pdfs = get_post_meta($post_id, '_penilaian_pdfs', true);
    if (!is_array($existing_pdfs)) $existing_pdfs = [];

    // Hapus file yang dicentang
    if (!empty($_POST['hapus_pdf'])) {
        foreach ($_POST['hapus_pdf'] as $url) {
            $path = str_replace(wp_get_upload_dir()['baseurl'], wp_get_upload_dir()['basedir'], $url);
            if (file_exists($path)) @unlink($path);
            $existing_pdfs = array_diff($existing_pdfs, [$url]);
        }
    }

    // Upload file baru
    if (!empty($_FILES['penilaian_pdf_upload']['name'][0])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $files = $_FILES['penilaian_pdf_upload'];

        foreach ($files['name'] as $key => $name) {
            if (empty($name)) continue;

            $file = array(
                'name'     => $name,
                'type'     => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error'    => $files['error'][$key],
                'size'     => $files['size'][$key]
            );

            $file_type = wp_check_filetype_and_ext($file['tmp_name'], $file['name']);
            if ($file_type['ext'] !== 'pdf') continue;

            $upload = wp_handle_upload($file, array('test_form' => false));
            if (!isset($upload['error']) && isset($upload['url'])) {
                $existing_pdfs[] = esc_url($upload['url']);
            }
        }
    }

    // Simpan ulang semua PDF
    update_post_meta($post_id, '_penilaian_pdfs', array_values($existing_pdfs));
}
add_action('save_post_penilaian', 'penilaian_save_pdf');


// =======================
// 🔹 Flush permalink setelah tema aktif
// =======================
add_action('after_switch_theme', function () {
    RegisterPostTypePenilaian();
    flush_rewrite_rules();
});

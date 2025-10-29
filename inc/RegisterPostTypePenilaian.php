<?php
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
// 🔹 Tambah Metabox Upload PDF + Tanggal
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
    $pdf_url = get_post_meta($post->ID, '_penilaian_pdf', true);
    $tanggal = get_post_meta($post->ID, '_penilaian_tanggal', true);
    ?>
    <p>
        <label for="penilaian_tanggal"><strong>Tanggal Pelaksanaan:</strong></label><br>
        <input type="date" name="penilaian_tanggal" id="penilaian_tanggal" 
               value="<?php echo esc_attr($tanggal); ?>" style="width: 250px;">
    </p>

    <hr>

    <p>
        <?php if ($pdf_url): ?>
            <strong>File saat ini:</strong><br>
            <a href="<?php echo esc_url($pdf_url); ?>" target="_blank">
                <?php echo basename($pdf_url); ?>
            </a><br><br>
        <?php endif; ?>

        <label for="penilaian_pdf_upload"><strong>Upload File PDF Baru:</strong></label><br>
        <input type="file" name="penilaian_pdf_upload" id="penilaian_pdf_upload" accept="application/pdf"><br>
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
// 🔹 Simpan PDF dan tanggal
// =======================
function penilaian_save_pdf($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Simpan tanggal
    if (isset($_POST['penilaian_tanggal'])) {
        update_post_meta($post_id, '_penilaian_tanggal', sanitize_text_field($_POST['penilaian_tanggal']));
    }

    // Proses upload file PDF
    if (!empty($_FILES['penilaian_pdf_upload']['name'])) {

        $file = $_FILES['penilaian_pdf_upload'];

        // Pastikan file adalah PDF
        $file_type = wp_check_filetype_and_ext($file['tmp_name'], $file['name']);
        if ($file_type['ext'] !== 'pdf') {
            return; // Bukan PDF, hentikan
        }

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $upload = wp_handle_upload($file, array('test_form' => false));

        if (!isset($upload['error']) && isset($upload['url'])) {
            // Hapus file lama jika ada
            $old_pdf = get_post_meta($post_id, '_penilaian_pdf', true);
            if ($old_pdf) {
                $old_path = str_replace(wp_get_upload_dir()['baseurl'], wp_get_upload_dir()['basedir'], $old_pdf);
                if (file_exists($old_path)) {
                    @unlink($old_path);
                }
            }

            // Simpan file baru
            update_post_meta($post_id, '_penilaian_pdf', esc_url($upload['url']));
        }
    }
}
add_action('save_post', 'penilaian_save_pdf');

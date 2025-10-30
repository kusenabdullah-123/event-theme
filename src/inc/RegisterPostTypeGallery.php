<?php
// ===================================================
// 🔹 RENAME FILE GAMBAR KE FORMAT DATETIME
// ===================================================
add_filter('wp_handle_upload_prefilter', 'rename_gallery_image_to_datetime');
function rename_gallery_image_to_datetime($file)
{
    $image_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');
    if (in_array($file['type'], $image_types)) {
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $datetime = date('Ymd_His'); // contoh: 20251029_203015
        $file['name'] = $datetime . '.' . $file_ext;
    }
    return $file;
}

// ===================================================
// 🔹 GANTI FOLDER UPLOAD KHUSUS UNTUK POST TYPE GALLERY
// ===================================================
add_filter('upload_dir', 'custom_upload_folder_gallery_by_day');
function custom_upload_folder_gallery_by_day($upload)
{
    if (isset($_REQUEST['post_id'])) {
        $post_type = get_post_type($_REQUEST['post_id']);
        if ($post_type === 'gallery') {
            $time = current_time('mysql');
            $y = date('Y', strtotime($time));
            $m = date('m', strtotime($time));
            $d = date('d', strtotime($time));

            // Folder: /gallery/YYYY/MM/DD
            $upload['subdir'] = "/gallery/$y/$m/$d";
            $upload['path'] = $upload['basedir'] . $upload['subdir'];
            $upload['url']  = $upload['baseurl'] . $upload['subdir'];
        }
    }
    return $upload;
}

// ===================================================
// 🔹 REGISTER CUSTOM POST TYPE: GALLERY
// ===================================================
function register_post_type_gallery()
{
    $labels = array(
        'name'               => 'Gallery',
        'singular_name'      => 'Gallery',
        'menu_name'          => 'Gallery',
        'name_admin_bar'     => 'Gallery',
        'add_new'            => 'Tambah Gallery',
        'add_new_item'       => 'Tambah Gallery Baru',
        'new_item'           => 'Gallery Baru',
        'edit_item'          => 'Edit Gallery',
        'view_item'          => 'Lihat Gallery',
        'all_items'          => 'Semua Gallery',
        'search_items'       => 'Cari Gallery',
        'not_found'          => 'Tidak ada Gallery ditemukan.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array('slug' => 'gallery'),
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array('title', 'thumbnail', 'excerpt'),
    );

    register_post_type('gallery', $args);
}
add_action('init', 'register_post_type_gallery');

// ===================================================
// 🔹 META BOX UNTUK UPLOAD BANYAK GAMBAR
// ===================================================
function gallery_add_images_meta_box()
{
    add_meta_box(
        'gallery_images_box',
        'Daftar Gambar',
        'gallery_images_meta_box_callback',
        'gallery',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'gallery_add_images_meta_box');

function gallery_images_meta_box_callback($post)
{
    $images = get_post_meta($post->ID, '_gallery_images', true);
    wp_nonce_field('save_gallery_images', 'gallery_images_nonce');
?>
    <div id="gallery-images-wrapper">
        <p><button type="button" class="button add-gallery-image">+ Tambah Gambar</button></p>
        <ul id="gallery-images-list">
            <?php
            if (!empty($images)) {
                foreach ($images as $image) {
                    echo '<li style="margin-bottom:10px;">
                        <img src="' . esc_url($image) . '" style="max-width:100px;vertical-align:middle;margin-right:10px;">
                        <input type="hidden" name="gallery_images[]" value="' . esc_url($image) . '">
                        <button type="button" class="button remove-gallery-image">Hapus</button>
                    </li>';
                }
            }
            ?>
        </ul>
    </div>

    <script>
        jQuery(document).ready(function($) {
            let gallery_frame;

            // Tombol tambah gambar
            $(document).on('click', '.add-gallery-image', function(e) {
                e.preventDefault();

                // Jika frame sudah dibuat sebelumnya, buka ulang
                if (gallery_frame) {
                    gallery_frame.open();
                    return;
                }

                // Buat instance baru
                gallery_frame = wp.media({
                    title: 'Pilih atau Upload Gambar',
                    button: {
                        text: 'Gunakan Gambar Ini'
                    },
                    multiple: true // bisa pilih banyak
                });

                // Saat gambar dipilih
                gallery_frame.on('select', function() {
                    const attachments = gallery_frame.state().get('selection').toJSON();
                    attachments.forEach(function(attachment) {
                        const imageURL = attachment.sizes?.thumbnail?.url || attachment.url;
                        $('#gallery-images-list').append(
                            '<li style="margin-bottom:10px;">' +
                            '<img src="' + imageURL + '" style="max-width:100px;vertical-align:middle;margin-right:10px;">' +
                            '<input type="hidden" name="gallery_images[]" value="' + attachment.url + '">' +
                            '<button type="button" class="button remove-gallery-image">Hapus</button>' +
                            '</li>'
                        );
                    });

                    // Tutup frame setelah pilih
                    gallery_frame.close();
                });

                // Buka media uploader
                gallery_frame.open();
            });

            // Tombol hapus gambar
            $(document).on('click', '.remove-gallery-image', function() {
                $(this).closest('li').fadeOut(200, function() {
                    $(this).remove();
                });
            });
        });
    </script>

<?php
}

function gallery_save_images_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['gallery_images_nonce']) || !wp_verify_nonce($_POST['gallery_images_nonce'], 'save_gallery_images')) return;

    if (isset($_POST['gallery_images'])) {
        update_post_meta($post_id, '_gallery_images', array_map('esc_url', $_POST['gallery_images']));
    } else {
        delete_post_meta($post_id, '_gallery_images');
    }
}
add_action('save_post_gallery', 'gallery_save_images_meta_box');

// ===================================================
// 🔹 FLUSH PERMALINK SAAT THEME DI AKTIFKAN
// ===================================================
add_action('after_switch_theme', function () {
    register_post_type_gallery();
    flush_rewrite_rules();
});

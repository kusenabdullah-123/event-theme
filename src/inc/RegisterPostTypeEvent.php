<?php
// ===================================================
// 🔹 UBAH NAMA FILE GAMBAR MENJADI FORMAT DATETIME
// ===================================================
add_filter('wp_handle_upload_prefilter', 'rename_image_file_to_datetime');
function rename_image_file_to_datetime($file) {
    $image_types = array('image/jpeg', 'image/png', 'image/gif');
    if (in_array($file['type'], $image_types)) {
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $datetime = date('Ymd_His'); // Format: YYYYMMDD_HHmmss
        $file['name'] = $datetime . '.' . $file_ext;
    }
    return $file;
}

// ===================================================
// 🔹 BUAT FOLDER UPLOAD: /event/YYYY/MM/DD
// ===================================================
add_filter('upload_dir', 'custom_upload_folder_event_by_day');
function custom_upload_folder_event_by_day($upload) {
    // Jalankan hanya ketika sedang upload dari post type 'event'
    if (isset($_REQUEST['post_id'])) {
        $post_type = get_post_type($_REQUEST['post_id']);
        if ($post_type === 'event') {
            $time = current_time('mysql');
            $y = date('Y', strtotime($time));
            $m = date('m', strtotime($time));
            $d = date('d', strtotime($time));

            // Set folder upload: /event/YYYY/MM/DD
            $upload['subdir'] = "/event/$y/$m/$d";
            $upload['path'] = $upload['basedir'] . $upload['subdir'];
            $upload['url']  = $upload['baseurl'] . $upload['subdir'];
        }
    }
    return $upload;
}

// ===================================================
// 🔹 REGISTER CUSTOM POST TYPE: EVENT
// ===================================================
function register_post_type_event() {
    $labels = array(
        'name'               => 'Event',
        'singular_name'      => 'Event',
        'menu_name'          => 'Event',
        'name_admin_bar'     => 'Event',
        'add_new'            => 'Tambah Event',
        'add_new_item'       => 'Tambah Event Baru',
        'new_item'           => 'Event Baru',
        'edit_item'          => 'Edit Event',
        'view_item'          => 'Lihat Event',
        'all_items'          => 'Semua Event',
        'search_items'       => 'Cari Event',
        'not_found'          => 'Tidak ada Event ditemukan.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array('slug' => 'event'),
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('event', $args);

    // Register taxonomy kategori event
    $taxonomy_labels = array(
        'name'              => 'Kategori Event',
        'singular_name'     => 'Kategori Event',
        'menu_name'         => 'Kategori Event',
        'all_items'         => 'Semua Kategori Event',
        'edit_item'         => 'Edit Kategori Event',
        'view_item'         => 'Lihat Kategori Event',
        'update_item'       => 'Perbarui Kategori Event',
        'add_new_item'      => 'Tambah Kategori Baru',
        'new_item_name'     => 'Nama Kategori Baru',
        'search_items'      => 'Cari Kategori Event',
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_quick_edit'=> true,
        'rewrite'           => array('slug' => 'event-kategori'),
    );

    register_taxonomy('event_kategori', array('event'), $taxonomy_args);
}
add_action('init', 'register_post_type_event');

// ===================================================
// 🔹 FIELD: TANGGAL PELAKSANAAN
// ===================================================
function event_add_tanggal_meta_box() {
    add_meta_box(
        'event_tanggal_box',
        'Tanggal Pelaksanaan',
        'event_tanggal_meta_box_callback',
        'event',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'event_add_tanggal_meta_box');

function event_tanggal_meta_box_callback($post) {
    $value = get_post_meta($post->ID, '_tanggal_pelaksanaan', true);
    ?>
    <label for="tanggal_pelaksanaan">Pilih tanggal pelaksanaan:</label>
    <input 
        type="date" 
        name="tanggal_pelaksanaan" 
        id="tanggal_pelaksanaan"
        value="<?php echo esc_attr($value); ?>" 
        style="width:100%;"
    >
    <?php
}

function event_save_tanggal_meta_box($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['tanggal_pelaksanaan'])) {
        update_post_meta(
            $post_id,
            '_tanggal_pelaksanaan',
            sanitize_text_field($_POST['tanggal_pelaksanaan'])
        );
    }
}
add_action('save_post_event', 'event_save_tanggal_meta_box');

// ===================================================
// 🔹 FLUSH PERMALINK SAAT THEME AKTIF
// ===================================================
add_action('after_switch_theme', function() {
    register_post_type_event();
    flush_rewrite_rules();
});

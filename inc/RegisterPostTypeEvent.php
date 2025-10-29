<?php
// ====== REGISTER CUSTOM POST TYPE: EVENT ======
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

    // ====== REGISTER CUSTOM TAXONOMY: KATEGORI EVENT ======
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


// ====== CUSTOM FIELD: TANGGAL PELAKSANAAN ======
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


// ====== FLUSH PERMALINK SAAT TEMA DI AKTIFKAN ======
add_action('after_switch_theme', function() {
    register_post_type_event();
    flush_rewrite_rules();
});

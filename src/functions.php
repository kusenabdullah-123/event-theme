<?php
/**
 * Theme Functions for Event Theme
 *
 * @package EventTheme
 */

// ===================================================
// 🔹 INCLUDE FILES
// ===================================================
$theme_inc_files = [
    '/inc/class-wp-bootstrap-navwalker.php',
    '/inc/RegisterPostTypeEvent.php',
    '/inc/RegisterPostTypeGallery.php',
    '/inc/RegisterPostTypePenilaian.php',
];

foreach ($theme_inc_files as $file) {
    $path = get_template_directory() . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}

// ===================================================
// 🔹 ENQUEUE STYLES & SCRIPTS
// ===================================================
function event_theme_enqueue_assets()
{
    // ===== CSS =====
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
        [],
        '6.6.0'
    );

    wp_enqueue_style(
        'aos',
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
        [],
        '2.3.1'
    );

    $theme_uri = get_template_directory_uri();

    wp_enqueue_style('bootstrap',  $theme_uri . '/assets/css/bootstrap.min.css', [], null);
    wp_enqueue_style('lineicons',  $theme_uri . '/assets/css/lineicons.css', [], null);
    wp_enqueue_style('tiny-slider', $theme_uri . '/assets/css/tiny-slider.css', [], null);
    wp_enqueue_style('glightbox',  $theme_uri . '/assets/css/glightbox.min.css', [], null);
    wp_enqueue_style('main-style', $theme_uri . '/style.css', ['bootstrap'], wp_get_theme()->get('Version'));

    // ===== JS =====
    wp_enqueue_script(
        'aos',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        [],
        '2.3.1',
        true
    );

    wp_enqueue_script('bootstrap', $theme_uri . '/assets/js/bootstrap.bundle.min.js', ['jquery'], null, true);
    wp_enqueue_script('glightbox', $theme_uri . '/assets/js/glightbox.min.js', [], null, true);
    wp_enqueue_script('tiny-slider', $theme_uri . '/assets/js/tiny-slider.js', [], null, true);
    wp_enqueue_script('main', $theme_uri . '/assets/js/main.js', ['jquery', 'aos'], null, true);
}
add_action('wp_enqueue_scripts', 'event_theme_enqueue_assets');

// ===================================================
// 🔹 THEME SETUP
// ===================================================
function event_theme_setup()
{
    // Tambahkan dukungan fitur dasar
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Daftarkan menu navigasi
    register_nav_menus([
        'primary' => __('Primary Menu', 'event-theme'),
    ]);
}
add_action('after_setup_theme', 'event_theme_setup');

// ===================================================
// 🔹 RENAME FILE UPLOADS (tambah prefix tanggal)
// ===================================================
add_filter('wp_handle_upload_prefilter', function ($file) {
    $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
    $datetime = gmdate('Ymd_His');
    $file['name'] = sanitize_file_name($datetime . '.' . $ext);
    return $file;
});

// ===================================================
// 🔹 CUSTOM UPLOAD FOLDER BERDASARKAN POST TYPE
// ===================================================
add_filter('upload_dir', function ($upload) {
    $post_type = null;

    // Ambil post type jika upload dari editor post
    if (!empty($_REQUEST['post_id'])) {
        $post_id = absint($_REQUEST['post_id']);
        $post_type = get_post_type($post_id);
    }

    // Jika tidak ada post type, return default
    if (empty($post_type)) {
        return $upload;
    }

    // Ambil tanggal hari ini
    $time = current_time('mysql');
    $y = date('Y', strtotime($time));
    $m = date('m', strtotime($time));
    $d = date('d', strtotime($time));

    // Tentukan sub-folder berdasarkan post type
    switch ($post_type) {
        case 'event':
            $subdir = "/event/$y/$m/$d";
            break;

        case 'gallery':
            $subdir = "/gallery/$y/$m/$d";
            break;

        case 'penilaian':
            $subdir = "/penilaian/pdf/$y/$m/$d";
            break;

        default:
            return $upload;
    }

    // Update hasil filter upload
    $upload['subdir'] = $subdir;
    $upload['path']   = trailingslashit($upload['basedir']) . ltrim($subdir, '/');
    $upload['url']    = trailingslashit($upload['baseurl']) . ltrim($subdir, '/');

    return $upload;
});

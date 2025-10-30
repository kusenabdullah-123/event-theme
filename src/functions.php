<?php

if (file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php')) {
  require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

require_once get_template_directory() . '/inc/RegisterPostTypeEvent.php';
require_once get_template_directory() . '/inc/RegisterPostTypeGallery.php';
require_once get_template_directory() . '/inc/RegisterPostTypePenilaian.php';

function event_theme_scripts()
{
  // CSS
  wp_enqueue_style(
    'font-awesome', // handle
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', // src
    array(), // dependencies
    '6.6.0' // versi
  );
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  wp_enqueue_style('lineicons', get_template_directory_uri() . '/assets/css/lineicons.css');
  wp_enqueue_style('tiny-slider', get_template_directory_uri() . '/assets/css/tiny-slider.css');
  wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css');
  wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css');

  // JS
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
  wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/js/glightbox.min.js', array(), null, true);
  wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/assets/js/tiny-slider.js', array(), null, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'event_theme_scripts');

function event_theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');


  register_nav_menus(array(
    'primary' => __('Primary Menu', 'event-theme'),
  ));
}
add_action('after_setup_theme', 'event_theme_setup');


add_filter('wp_handle_upload_prefilter', function($file) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $datetime = date('Ymd_His'); // Format: 20251030_204500
    $file['name'] = $datetime . '.' . $ext;
    return $file;
});

// ===================================================
// 🔹 GANTI FOLDER UPLOAD BERDASARKAN POST TYPE
// ===================================================
add_filter('upload_dir', function($upload) {
    $post_type = null;

    if (isset($_REQUEST['post_id'])) {
        $post_type = get_post_type($_REQUEST['post_id']);
    }

    $time = current_time('mysql');
    $y = date('Y', strtotime($time));
    $m = date('m', strtotime($time));
    $d = date('d', strtotime($time));

    // === EVENT ===
    if ($post_type === 'event') {
        $upload['subdir'] = "/event/$y/$m/$d";
    }

    // === GALLERY ===
    elseif ($post_type === 'gallery') {
        $upload['subdir'] = "/gallery/$y/$m/$d";
    }

    // === PENILAIAN (PDF SAJA) ===
    elseif ($post_type === 'penilaian') {
        $upload['subdir'] = "/penilaian/pdf/$y/$m/$d";
    }

    // === LAINNYA (default WP) ===
    else {
        return $upload;
    }

    // Update path dan URL upload
    $upload['path'] = $upload['basedir'] . $upload['subdir'];
    $upload['url']  = $upload['baseurl'] . $upload['subdir'];

    return $upload;
});

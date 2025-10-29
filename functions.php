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

function event_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');


  register_nav_menus(array(
    'primary' => __('Primary Menu', 'event-theme'),
  ));
}
add_action('after_setup_theme', 'event_theme_setup');

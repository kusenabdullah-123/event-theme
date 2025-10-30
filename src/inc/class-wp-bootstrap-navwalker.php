<?php
/**
 * WP_Bootstrap_Navwalker
 * Compatible with Bootstrap 5
 */

if (!class_exists('WP_Bootstrap_Navwalker')) {
  class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

    // Start Level (submenu)
    public function start_lvl(&$output, $depth = 0, $args = null) {
      $indent = str_repeat("\t", $depth);
      $submenu = ($depth > 0) ? ' sub-menu' : '';
      $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    // Start Element (menu item)
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
      $indent = ($depth) ? str_repeat("\t", $depth) : '';

      $classes = empty($item->classes) ? [] : (array) $item->classes;
      $classes[] = 'nav-item';

      // Tambahkan class dropdown jika punya anak
      if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown';
      }

      $class_names = join(' ', array_filter($classes));
      $class_names = ' class="' . esc_attr($class_names) . '"';

      $output .= $indent . '<li' . $class_names . '>';

      $atts = [];
      $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
      $atts['target'] = !empty($item->target) ? $item->target : '';
      $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
      $atts['href']   = !empty($item->url) ? $item->url : '';

      $link_class = 'nav-link';
      if ($depth > 0) $link_class = 'dropdown-item';

      // Jika punya anak
      if (in_array('menu-item-has-children', $classes)) {
        $link_class .= ' dropdown-toggle';
        $atts['data-bs-toggle'] = 'dropdown';
        $atts['aria-expanded'] = 'false';
        $atts['role'] = 'button';
      }

      $atts['class'] = $link_class;

      $attributes = '';
      foreach ($atts as $attr => $value) {
        if (!empty($value)) {
          $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }
      }

      $title = apply_filters('the_title', $item->title, $item->ID);
      $item_output = $args->before ?? '';
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before ?? '';
      $item_output .= $title;
      $item_output .= $args->link_after ?? '';
      $item_output .= '</a>';
      $item_output .= $args->after ?? '';

      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = null) {
      $output .= "</li>\n";
    }
  }
}

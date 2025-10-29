<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!--====== NAVBAR START ======-->
<!--====== NAVBAR START ======-->
<section class="navbar-area navbar-nine">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-logo.svg" alt="Logo" />
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine"
            aria-controls="navbarNine" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'navbar-nav ms-auto',
              'fallback_cb' => '__return_false',
              'depth' => 2,
              'walker' => new WP_Bootstrap_Navwalker()
            ));
            ?>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <style>
    /* Navbar dengan warna utama dan shadow lembut */
.navbar-area.navbar-nine {
  position: relative;
  z-index: 100;
  background-color: #155bd5;
  /* Layer ganda: satu lembut, satu dalam */
  box-shadow:
    0 2px 4px rgba(0, 0, 0, 0.1),
    0 8px 16px rgba(21, 91, 213, 0.4);
}


    /* Responsif: sedikit kurangi bayangan di layar kecil */
    @media (max-width: 992px) {
      .navbar-area.navbar-nine {
        box-shadow: 0 3px 8px rgba(21, 91, 213, 0.25);
      }
    }
  </style>
</section>
<!--====== NAVBAR END ======-->

  <!--====== NAVBAR END ======-->

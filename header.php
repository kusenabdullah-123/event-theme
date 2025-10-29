<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

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
                'theme_location' => 'primary', // ini harus sama dengan register_nav_menus
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
  </section>
  <!--====== NAVBAR END ======-->

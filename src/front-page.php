  <!-- Start header Area -->
  <?php get_header(); ?>

  <section id="hero-area" class="header-area header-eight position-relative overflow-hidden">
      <!-- Background Shape (Wave lembut dengan warna baru) -->
      <div class="hero-bg-shape">
          <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
              <defs>
                  <linearGradient id="gradHero" x1="0%" y1="0%" x2="100%" y2="100%">
                      <stop offset="0%" stop-color="#0066dd" />
                      <stop offset="50%" stop-color="#0055cc" />
                      <stop offset="100%" stop-color="#004aad" />
                  </linearGradient>
              </defs>
              <path fill="url(#gradHero)" fill-opacity="1"
                  d="M0,160L80,154.7C160,149,320,139,480,154.7C640,171,800,213,960,197.3C1120,181,1280,107,1360,69.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
              </path>
          </svg>

          <!-- Tambahan elemen dekoratif di atas -->
          <div class="hero-top-shape"></div>
          <div class="hero-top-shape small left"></div>
      </div>

      <div class="container position-relative z-10">
          <div class="row align-items-center">
              <!-- Left Text -->
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="header-content text-white">
                      <h1 class="fw-bold mb-3">Obor Langit Group.</h1>
                      <p class="mb-4">
                          Membangun prestasi akademik melalui kompetisi yang terstruktur dan inspiratif.
                          Dengan pengalaman menyelenggarakan olimpiade nasional, kami menciptakan wadah terbaik
                          bagi siswa SD/MI dan SMP/MTs untuk mengembangkan potensi akademik mereka secara optimal dan berkelanjutan.
                      </p>
                      <div class="button">
                          <a href="<?php echo site_url('/tentang-kami'); ?>" class="btn btn-light btn-header me-3 px-4 py-2">
                              Selengkapnya
                          </a>
                          <a href="https://www.youtube.com/watch?v=r44RKWyfcFw"
                              class="glightbox video-button d-inline-flex align-items-center text-white text-decoration-none">
                              <span class="btn icon-btn rounded-circle me-2"
                                  style="background: rgba(255, 255, 255, 1); width: 45px; height: 45px; display:flex; align-items:center; justify-content:center;">
                                  <i class="lni lni-play fs-5"></i>
                              </span>
                              <span class="text fw-semibold">Watch Intro</span>
                          </a>
                      </div>
                  </div>
              </div>

              <!-- Right Image Slider -->
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="header-image slider">
                      <div>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/slider-1.png"
                              alt="Event Conference" class="img-fluid rounded shadow" />
                      </div>
                      <div>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/slider-2.png"
                              alt="Team Collaboration" class="img-fluid rounded shadow" />
                      </div>
                      <div>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/slider-3.png"
                              alt="Corporate Event" class="img-fluid rounded shadow" />
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <style>
          #hero-area {
              padding-top: 120px;
              padding-bottom: 100px;
              color: #fff;
          }

          /* Background wave */
          .hero-bg-shape {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              z-index: 0;
              overflow: hidden;
          }

          .hero-bg-shape svg {
              position: absolute;
              bottom: 0;
              left: 0;
              width: 100%;
              height: 100%;
          }

          /* Tambahan shape lembut di atas */
          .hero-top-shape {
              position: absolute;
              top: -80px;
              right: -100px;
              width: 300px;
              height: 300px;
              background: radial-gradient(circle at center, #00ddaa33 0%, transparent 70%);
              border-radius: 50%;
              z-index: 1;
          }

          .hero-top-shape.small.left {
              top: -60px;
              left: -80px;
              width: 180px;
              height: 180px;
              background: radial-gradient(circle at center, #0066dd33 0%, transparent 70%);
          }

          /* Hero text */
          .header-content h1 {
              font-size: 3.8rem;
              line-height: 1.2;
          }

          .header-content p {
              font-size: 1.1rem;
              opacity: 0.9;
          }

          .btn.icon-btn {
              border: none;
              transition: background 0.3s ease;
          }

          .btn.icon-btn:hover {
              background: rgba(255, 255, 255, 0.3) !important;
          }

          .btn-header {
              color: #004aad;
          }

          @media (max-width: 992px) {
              .header-content {
                  text-align: center;
                  margin-bottom: 40px;
              }

              .hero-top-shape,
              .hero-top-shape.small.left {
                  display: none;
              }
          }
      </style>
  </section>



  <!-- <section id="hero-area" class="header-area header-eight">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="header-content">
                      <h1>Obor Langit Group.</h1>
                      <p>
                          Membangun prestasi akademik melalui kompetisi yang terstruktur dan inspiratif.
                          Dengan pengalaman menyelenggarakan olimpiade nasional, kami menciptakan wadah terbaik
                          bagi siswa SD/MI dan SMP/MTs untuk mengembangkan potensi akademik mereka secara optimal dan berkelanjutan.
                      </p>
                      <div class="button">
                      <a href="<?php echo site_url('/tentang-kami'); ?>" class="btn primary-btn">Selengkapnya</a>
                          <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM"
                              class="glightbox video-button">
                              <span class="btn icon-btn rounded-full">
                                  <i class="lni lni-play"></i>
                              </span>
                              <span class="text">Watch Intro</span>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="header-image slider">
                      <div>
                          <img src="https://images.unsplash.com/photo-1551836022-4c4c79ecde51?auto=format&fit=crop&w=1000&q=80"
                              alt="Event Conference" />
                      </div>
                      <div>
                          <img src="https://images.unsplash.com/photo-1503424886307-b090341d25d1?auto=format&fit=crop&w=1000&q=80"
                              alt="Team Collaboration" />
                      </div>
                      <div>
                          <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1000&q=80"
                              alt="Corporate Event" />
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </section> -->
  <!-- End header Area -->

  <!--====== ABOUT FIVE PART START ======-->

  <section class="about-area about-five">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-12">
                  <div class="about-image-five">
                      <svg class="shape" width="106" height="134" viewBox="0 0 106 134" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <circle cx="1.66654" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="1.66654" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="16.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="16.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="16.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="16.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="16.333" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="16.333" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="16.333" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="16.333" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="16.333" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="16.333" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="30.9998" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6665" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="30.9998" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6665" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="30.9998" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6665" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="30.9998" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="31" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6668" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="31" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6668" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="31" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6668" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="31" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6668" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="31" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6668" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="31" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="74.6668" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="45.6665" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="89.3333" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="60.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="1.66679" r="1.66667" fill="#DADADA" />
                          <circle cx="60.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="16.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="60.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="31.0001" r="1.66667" fill="#DADADA" />
                          <circle cx="60.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="45.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="60.333" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="60.3335" r="1.66667" fill="#DADADA" />
                          <circle cx="60.333" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="88.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="60.333" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="117.667" r="1.66667" fill="#DADADA" />
                          <circle cx="60.333" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="74.6668" r="1.66667" fill="#DADADA" />
                          <circle cx="60.333" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="103" r="1.66667" fill="#DADADA" />
                          <circle cx="60.333" cy="132" r="1.66667" fill="#DADADA" />
                          <circle cx="104" cy="132" r="1.66667" fill="#DADADA" />
                      </svg>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/about.png" alt="about" />
                  </div>
              </div>
              <div class="col-lg-6 col-12">
                  <div class="about-five-content">
                      <h6 class="small-title text-lg">VISI & MISI</h6>
                      <h2 class="main-title fw-bold">Komitmen dan Kredibilitas di Dunia Akademik</h2>
                      <div class="about-five-tab">
                          <nav>
                              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <button class="nav-link nav-tabs active" id="nav-who-tab" data-bs-toggle="tab" data-bs-target="#nav-who"
                                      type="button" role="tab" aria-controls="nav-who" aria-selected="true">SEJARAH</button>
                                  <button class="nav-link nav-tabs " id="nav-vision-tab" data-bs-toggle="tab" data-bs-target="#nav-vision"
                                      type="button" role="tab" aria-controls="nav-vision" aria-selected="false">VISI</button>
                                  <button class="nav-link nav-tabs" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history"
                                      type="button" role="tab" aria-controls="nav-history" aria-selected="false">MISI</button>
                              </div>
                          </nav>
                          <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-who" role="tabpanel" aria-labelledby="nav-who-tab">
                                  <p>Obor Langit adalah Event Organizer yang bergerak di bidang akademik, khususnya penyelenggaraan Olimpiade Akademik Nasional. Kami hadir sebagai wadah pengembangan potensi pelajar Indonesia melalui ajang kompetisi yang edukatif, inspiratif, dan membangun semangat berprestasi di bidang ilmu pengetahuan.</p>
                              </div>
                              <div class="tab-pane fade" id="nav-vision" role="tabpanel" aria-labelledby="nav-vision-tab">
                                  <p>Menjadi pelopor penyelenggara Olimpiade Akademik nasional yang unggul dan terpercaya dalam membangun ekosistem prestasi pelajar Indonesia yang berintegritas, visioner, dan siap bersaing di tingkat global.</p>
                              </div>
                              <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                                  <p>
                                      Menyelenggarakan kompetisi akademik yang profesional, transparan, dan berorientasi pada pengembangan potensi pelajar.
                                  </p>

                                  <p>Menguatkan kepercayaan publik melalui kegiatan yang terkurasi oleh Puspresnas dan diakui secara resmi oleh Dinas Pendidikan.</p>

                                  <p>Mendorong lahirnya generasi berkarakter unggul, inovatif, dan bersemangat untuk berprestasi di tingkat nasional maupun internasional.</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- container -->
  </section>

  <!-- Start Cta Area -->
  <section id="call-action" class="call-action">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
                  <div class="inner-content">
                      <h2>KEMBANGKAN POTENSI TERBAIKMU, RAIH PRESTASI GEMILANGMU.</h2>
                      <p>
                          menggambarkan semangat untuk terus berproses dan mengasah kemampuan diri hingga mencapai hasil yang membanggakan. Pesan ini mengajak setiap individu untuk percaya pada potensi yang dimiliki, berusaha maksimal, dan berani meraih kesuksesan melalui dedikasi serta kerja keras.
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End Cta Area -->



<div id="event" class="latest-news-area section">
    <div class="section-title-five">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content text-center">
                        <h6>Event</h6>
                        <h2 class="fw-bold">Latest Event & Upcoming</h2>
                        <p>Ayo lihat event terbaru dan event yang masih buka pendaftaran.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'post_type'      => 'event',
                'posts_per_page' => 5,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();

                    // Ambil semua kategori dari taxonomy 'event_kategori'
                    $terms = get_the_terms(get_the_ID(), 'event_kategori');
            ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="single-news h-100 d-flex flex-column shadow-lg rounded overflow-hidden">
                            <div class="image d-flex justify-content-center position-relative p-1">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'thumb w-100']); ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg"
                                             alt="<?php the_title(); ?>" class="thumb w-100">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="content-body p-3 flex-grow-1 d-flex flex-column">
                                <?php if (!empty($terms) && !is_wp_error($terms)): ?>
                                    <div class="mb-2">
                                        <?php foreach ($terms as $term): ?>
                                            <span class="badge bg-primary text-light me-1">
                                                <?php echo esc_html($term->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <h4 class="title mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-dark fw-semibold text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>

                                <p class="flex-grow-1"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<div class="col-12 text-center"><p>Tidak ada event tersedia.</p></div>';
            endif;
            ?>
        </div>
    </div>
</div>


  <!-- End Latest News Area -->

  <section id="gallery" class="latest-news-area section">
      <div class="section-title-five">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="content text-center">
                          <h6>Galeri</h6>
                          <h2 class="fw-bold">Dokumentasi Kegiatan & Event</h2>
                          <p>
                              Kumpulan momen terbaik dari berbagai acara dan kegiatan kami.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="container">
          <div class="row g-4">
              <?php
                // Query untuk menampilkan hanya 3 post terakhir dari galeri
                $gallery_query = new WP_Query([
                    'post_type'      => 'gallery', // ganti dengan slug CPT galeri kamu
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ]);

                if ($gallery_query->have_posts()) :
                    while ($gallery_query->have_posts()) :
                        $gallery_query->the_post();
                ?>
                      <div class="col-lg-4 col-md-6 col-12">
                          <a href="<?php the_permalink(); ?>" class="text-decoration-none w-full">
                              <div class="gallery-card">
                                  <?php if (has_post_thumbnail()) : ?>
                                      <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                                  <?php else : ?>
                                      <img src="https://via.placeholder.com/600x400?text=No+Image" alt="<?php the_title(); ?>">
                                  <?php endif; ?>

                                  <div class="gallery-info">
                                      <div class="gallery-title"><?php the_title(); ?></div>
                                      <div class="gallery-desc">
                                          <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                      </div>
                                      <div class="gallery-date">
                                          <?php echo get_the_date('j F Y'); ?>
                                      </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                  <div class="col-12 text-center">
                      <p>Belum ada galeri yang tersedia.</p>
                  </div>
              <?php endif; ?>
          </div>
      </div>

      <style>
          #gallery {
              background-color: #fff;
              padding-top: 80px;
              padding-bottom: 80px;
          }

          .gallery-card {
              border: none;
              border-radius: 10px;
              overflow: hidden;
              box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
              transition: transform 0.3s ease, box-shadow 0.3s ease;
              height: 100%;
          }

          .gallery-card:hover {
              transform: translateY(-5px);
              box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
          }

          .gallery-card img {
              width: 100%;
              height: 240px;
              object-fit: cover;
          }

          .gallery-info {
              padding: 1.25rem;
              background: #fff;
          }

          .gallery-title {
              font-size: 1rem;
              font-weight: 600;
              color: #222;
              margin-bottom: 0.5rem;
          }

          .gallery-desc {
              font-size: 0.9rem;
              color: #666;
              margin-bottom: 0.5rem;
          }

          .gallery-date {
              font-size: 0.8rem;
              color: #999;
              font-style: italic;
          }

          .w-full {
              width: 100%;
              display: block;
          }
      </style>
  </section>




  <!-- ========================= contact-section start ========================= -->
  <section id="contact" class="contact-section">
      <div class="container">
          <div class="row">
              <div class="col-xl-4">
                  <div class="contact-item-wrapper">
                      <div class="row">
                          <div class="col-12 col-md-6 col-xl-12">
                              <div class="contact-item">
                                  <div class="contact-icon">
                                      <i class="lni lni-phone"></i>
                                  </div>
                                  <div class="contact-content">
                                      <h4>Kontak</h4>
                                      <p>0984537278623</p>
                                      <p>oborlangit@gmail.com</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-xl-12">
                              <div class="contact-item">
                                  <div class="contact-icon">
                                      <i class="lni lni-map-marker"></i>
                                  </div>
                                  <div class="contact-content">
                                      <h4>Alamat</h4>
                                      <p class="alamat">Perum Puri Gading Mas Permai, Blok I No.16, Dusun Krajan, Dadapan, Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68462</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-xl-12">
                              <div class="contact-item">
                                  <div class="contact-icon">
                                      <i class="lni lni-alarm-clock"></i>
                                  </div>
                                  <div class="contact-content">
                                      <h4>Jam Operasional</h4>
                                      <p>24 Hours / 7 Days Open</p>
                                      <p>Office: 09:00 - 21:00</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-8">
                  <div class="contact-form-wrapper">
                      <div class="row">
                          <div class="col-xl-10 col-lg-8 mx-auto">
                              <div class="section-title text-center">
                                  <h2>
                                      Hubungi Kami
                                  </h2>
                              </div>
                          </div>
                      </div>
                      <form action="#" class="contact-form">
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="text" name="name" id="name" placeholder="Name" required />
                              </div>
                              <div class="col-md-6">
                                  <input type="text" name="phone" id="phone" placeholder="Phone" required />
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <textarea name="message" id="message" placeholder="Type Message" rows="5"></textarea>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <div class="button text-center rounded-buttons">
                                      <button type="submit" class="btn primary-btn rounded-full">
                                          Send Message
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php get_footer(); ?>
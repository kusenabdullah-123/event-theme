<?php get_header(); ?>

<section id="gallery" class="latest-news-area section">
    <div class="section-title-five">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
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
            if (have_posts()) : 
                $delay = 0; // Delay untuk animasi tiap card
                while (have_posts()) : the_post(); 
                    $delay += 150; // Tambah delay 150ms agar animasi berurutan
            ?>
                    <div class="col-lg-4 col-md-6 col-12" 
                         data-aos="fade-up" 
                         data-aos-delay="<?php echo $delay; ?>" 
                         data-aos-duration="1000">
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
            else : ?>
                <div class="col-12 text-center" data-aos="fade-up">
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
            background: #fff;
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
        }
    </style>
</section>

<?php get_footer(); ?>

<?php get_header(); ?>

<div id="event" class="latest-news-area section my-2">
    <div class="section-title-five">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content text-center">
                        <h6>Event</h6>
                        <h2 class="fw-bold">Latest Event & Upcoming</h2>
                        <p>Ayo lihat semua event terbaru dan event yang masih buka pendaftaran.</p>
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
                'posts_per_page' => -1, // ✅ tampilkan semua event
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();

                    // Ambil kategori dari taxonomy 'event_kategori'
                    $terms = get_the_terms(get_the_ID(), 'event_kategori');
                    $kategori = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
            ?>
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="single-news h-100 d-flex flex-column shadow-lg rounded overflow-hidden">
                            <div class="image d-flex flex-row justify-content-center position-relative">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'thumb w-100']); ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg" alt="<?php the_title(); ?>" class="thumb w-100">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="content-body p-3 flex-grow-1 d-flex flex-column">
                                <?php if ($kategori): ?>
                                    <span class="badge bg-primary text-light mb-2 align-self-start">
                                        <?php echo esc_html($kategori); ?>
                                    </span>
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

<?php get_footer(); ?>

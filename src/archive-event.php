<?php get_header(); ?>

<div id="event" class="latest-news-area section my-2">
    <div class="section-title-five">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
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
            // 🔹 Query: Ambil semua post type 'event'
            $query = new WP_Query([
                'post_type'      => 'event',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($query->have_posts()):
                $delay = 0;

                while ($query->have_posts()):
                    $query->the_post();

                    // 🔹 Ambil taxonomy 'event_kategori'
                    $terms = get_the_terms(get_the_ID(), 'event_kategori');
                    $delay += 100;
            ?>
                    <div class="col-lg-3 col-md-6 col-12 mb-4"
                         data-aos="fade-up"
                         data-aos-delay="<?php echo esc_attr($delay); ?>"
                         data-aos-duration="1000">

                        <div class="single-news h-100 d-flex flex-column shadow-lg rounded overflow-hidden">
                            <!-- 🔹 Thumbnail -->
                            <div class="image position-relative">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium', [
                                            'class' => 'thumb w-100',
                                            'alt'   => esc_attr(get_the_title()),
                                        ]); ?>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/no-image.jpg'); ?>"
                                             alt="<?php echo esc_attr(get_the_title()); ?>"
                                             class="thumb w-100">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <!-- 🔹 Konten Event -->
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
                                    <a href="<?php echo esc_url(get_permalink()); ?>"
                                       class="text-dark fw-semibold text-decoration-none">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </a>
                                </h4>

                                <p class="flex-grow-1 mb-0">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                ?>
                <div class="col-12 text-center" data-aos="fade-up">
                    <p>Tidak ada event tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

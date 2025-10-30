<?php get_header(); ?>

<div id="single-event" class="single-event-page section py-5 my-5">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php
                // Ambil kategori event
                $terms = get_the_terms(get_the_ID(), 'event_kategori');
                $kategori = $terms && !is_wp_error($terms) ? $terms[0]->name : '';

                // Ambil tanggal pelaksanaan
                $tanggal = get_post_meta(get_the_ID(), '_tanggal_pelaksanaan', true);
                $tanggal_format = $tanggal ? date_i18n('j F Y', strtotime($tanggal)) : 'Belum ditentukan';
                ?>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="event-header text-center mb-4">

                            <h1 class="fw-bold mb-3"><?php the_title(); ?></h1>

                            <div class="event-meta text-muted mb-4">
                                <i class="bi bi-calendar-event"></i>
                                <strong>Tanggal Pelaksanaan:</strong> <?php echo esc_html($tanggal_format); ?>
                            </div>
                        </div>

                        <div class="event-thumbnail mb-5 text-center">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded shadow-sm']); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.jpg" alt="<?php the_title(); ?>" class="img-fluid rounded shadow-sm">
                            <?php endif; ?>
                        </div>

                        <div class="event-content mt-2">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

            <?php endwhile;
        else: ?>
            <div class="row">
                <div class="col-12 text-center">
                    <p>Event tidak ditemukan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
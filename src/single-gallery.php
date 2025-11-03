<?php get_header(); ?>

<section id="single-gallery" class="py-5">
    <div class="container">
        <div class="row g-3">
            <?php
            $images = get_post_meta(get_the_ID(), '_gallery_images', true);

            if ($images) :
                $delay = 0; // Delay untuk animasi bertahap
                foreach ($images as $img) :
                    $delay += 100; // Tambah 100ms per gambar

                    // Jika data berisi ID attachment
                    if (is_numeric($img)) {
                        echo '<div class="col-lg-4 col-md-6 col-12"
                                 data-aos="zoom-in"
                                 data-aos-delay="' . esc_attr($delay) . '"
                                 data-aos-duration="1000">
                                <div class="gallery-image">'
                            . wp_get_attachment_image($img, 'full', false, [
                                'class' => 'img-fluid',
                                'loading' => 'lazy'
                            ]) .
                            '</div>
                              </div>';
                    }

                    // Jika data berisi URL (fallback)
                    else {
                        // Hilangkan suffix ukuran kecil (-300x200)
                        $full_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif))/i', '', $img);
                        echo '<div class="col-lg-4 col-md-6 col-12"
                                 data-aos="zoom-in"
                                 data-aos-delay="' . esc_attr($delay) . '"
                                 data-aos-duration="1000">
                                <div class="gallery-image">
                                    <img src="' . esc_url($full_url) . '" alt="" class="img-fluid" loading="lazy">
                                </div>
                              </div>';
                    }

                endforeach;
            else : ?>
                <div class="col-12 text-center" data-aos="fade-up" data-aos-duration="800">
                    <p>Belum ada gambar di galeri ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    #single-gallery {
        background-color: #fff;
        min-height: 45rem;
    }

    .gallery-image {
        height: 100%;
        width: 100%;
        overflow: hidden;
        border-radius: 8px;
        transition: transform .3s ease;
    }

    .gallery-image img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform .3s ease;
    }

    /* Efek hover lembut */
    .gallery-image:hover img {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<?php get_footer(); ?>

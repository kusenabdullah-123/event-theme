<?php get_header(); ?>

<section id="single-gallery" class="py-5">
    <div class="container">
        <div class="row g-3">
            <?php
            $images = get_post_meta(get_the_ID(), '_gallery_images', true);

            if ($images) :
                foreach ($images as $img) :

                    // Jika data berisi ID attachment
                    if (is_numeric($img)) {
                        echo '<div class="col-lg-4 col-md-6 col-12">
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
                        echo '<div class="col-lg-4 col-md-6 col-12">
                                <div class="gallery-image">
                                    <img src="' . esc_url($full_url) . '" alt="" class="img-fluid" loading="lazy">
                                </div>
                              </div>';
                    }

                endforeach;
            else : ?>
                <p class="text-center">Belum ada gambar di galeri ini.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    #single-gallery {
        background-color: #fff;
    }

    .gallery-image {
        height: 100%;
        width: 100%;
    }

    .gallery-image img {
        height: 100%;
        width: 100%;/* tinggi lebih besar tapi tetap tajam */
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform .3s ease;
    }
</style>

<?php get_footer(); ?>

<?php get_header(); ?>

<div id="penilaian-single" class="section">
    <div class="container py-5">
        <?php if (have_posts()): while (have_posts()): the_post(); 
            $pdf_url = get_post_meta(get_the_ID(), '_penilaian_pdf', true);
            $tanggal = get_post_meta(get_the_ID(), '_penilaian_tanggal', true);
        ?>
            <div class="card p-4 shadow-sm">
                <h2 class="fw-bold mb-3"><?php the_title(); ?></h2>

                <?php if ($tanggal): ?>
                    <p><strong>Tanggal Pelaksanaan:</strong> <?php echo esc_html($tanggal); ?></p>
                <?php endif; ?>

                <hr>

                <?php if ($pdf_url): ?>
                    <iframe src="<?php echo esc_url($pdf_url); ?>" width="100%" height="600px"></iframe>
                    <p class="mt-3">
                        <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-success" download>Download PDF</a>
                    </p>
                <?php else: ?>
                    <p><em>File PDF belum tersedia.</em></p>
                <?php endif; ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>

<?php get_header(); ?>

<section id="penilaian" class="py-5">
    <div class="container">
        <div class="section-title-five text-center mb-4">
            <h6>Penilaian</h6>
            <h2 class="fw-bold">Daftar Penilaian</h2>
        </div>

        <?php if (have_posts()): ?>
            <ul class="list-group list-group-flush">
                <?php while (have_posts()): the_post();
                    $tanggal = get_post_meta(get_the_ID(), '_penilaian_tanggal', true);
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 mb-2">
                        <div>
                            <a href="<?php the_permalink(); ?>" class="fw-bold text-dark text-decoration-none">
                                <?php the_title(); ?>
                            </a>
                        </div>
                        <?php if ($tanggal): ?>
                            <small class="text-muted">Tanggal Pelaksanaan: <?php echo esc_html($tanggal); ?></small>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p class="text-center mt-4">Belum ada data penilaian.</p>
        <?php endif; ?>
    </div>
</section>

<style>
    #penilaian {
        background-color: #f5f5f5; /* abu soft untuk section */
    }

    .list-group-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #e0e0e0; /* bg lebih kelihatan */
    }

    .list-group-item + .list-group-item {
        margin-top: 8px;
    }

    .list-group-item a {
        color: #333;
        text-decoration: none;
    }
</style>

<?php get_footer(); ?>

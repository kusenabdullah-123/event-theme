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
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 mb-2 clickable-li">
                        <a href="<?php the_permalink(); ?>" class="stretched-link"></a>
                        <div>
                            <?php the_title(); ?>
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
        background-color: #f5f5f5;
    }

    .list-group-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #e0e0e0;
        position: relative; /* untuk stretched-link */
        cursor: pointer; /* ini bikin cursor pointer */
        transition: background-color 0.2s;
    }

    .list-group-item:hover {
        background-color: #d0d0d0;
    }

    .list-group-item + .list-group-item {
        margin-top: 8px;
    }

    .list-group-item a.stretched-link {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-decoration: none;
        z-index: 1;
    }

    .list-group-item div,
    .list-group-item small {
        position: relative;
        z-index: 2; /* supaya konten tetap di atas link */
    }
</style>

<?php get_footer(); ?>

<?php get_header(); ?>

<section id="penilaian" class="py-5">
    <div class="container">
        <div class="section-title-five text-center mb-4">
            <h6>Penilaian</h6>
            <h2 class="fw-bold">Daftar Penilaian</h2>
        </div>

        <?php if (have_posts()) : ?>
            <ul class="list-group list-group-flush">
                <?php 
                while (have_posts()) : the_post();
                    // Ambil tanggal pelaksanaan dari meta field
                    $tanggal = get_post_meta(get_the_ID(), '_penilaian_tanggal', true);
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3 mb-2 clickable-li">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="stretched-link" aria-label="<?php echo esc_attr(get_the_title()); ?>"></a>
                        
                        <div class="fw-semibold text-dark">
                            <?php echo esc_html(get_the_title()); ?>
                        </div>

                        <?php if (!empty($tanggal)) : ?>
                            <small class="text-muted">
                                Tanggal Pelaksanaan: <?php echo esc_html($tanggal); ?>
                            </small>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>

        <?php else : ?>
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
        position: relative;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .list-group-item:hover {
        background-color: #d0d0d0;
        transform: translateY(-2px);
    }

    .list-group-item + .list-group-item {
        margin-top: 8px;
    }

    .list-group-item a.stretched-link {
        position: absolute;
        inset: 0; /* shorthand untuk top/left/right/bottom 0 */
        text-decoration: none;
        z-index: 1;
    }

    .list-group-item div,
    .list-group-item small {
        position: relative;
        z-index: 2;
    }

    @media (max-width: 576px) {
        .list-group-item {
            flex-direction: column;
            align-items: flex-start;
        }
        .list-group-item small {
            margin-top: 4px;
        }
    }
</style>

<?php get_footer(); ?>

<?php get_header(); ?>

<section id="single-penilaian" class="section py-5" style="background:#f9fafb;">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
      $pdf_urls = get_post_meta(get_the_ID(), '_penilaian_pdfs', true);
      $tanggal  = get_post_meta(get_the_ID(), '_penilaian_tanggal', true);
      if (!is_array($pdf_urls)) $pdf_urls = [];
    ?>
      <div class="card shadow-sm border-0 rounded-4 p-4">
        <h2 class="fw-bold mb-3 text-primary"><?php the_title(); ?></h2>

        <?php if ($tanggal): ?>
          <p class="mb-4"><strong>Tanggal Pelaksanaan:</strong> <?php echo esc_html($tanggal); ?></p>
        <?php endif; ?>

        <hr class="mb-4">

        <?php if (!empty($pdf_urls)) : ?>
          <div class="pdf-gallery">
            <?php foreach ($pdf_urls as $index => $pdf_url): ?>
              <div class="pdf-item mb-5">
                <h5 class="fw-semibold mb-2">File Penilaian <?php echo $index + 1; ?></h5>
                <div class="ratio ratio-16x9 mb-3" style="border-radius:10px; overflow:hidden;">
                  <iframe src="<?php echo esc_url($pdf_url); ?>#toolbar=0" width="100%" height="500" style="border:none;"></iframe>
                </div>
                <a href="<?php echo esc_url($pdf_url); ?>" class="btn btn-success btn-sm" target="_blank" download>
                  <i class="lni lni-download"></i> Download PDF
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <p><em>Belum ada file PDF yang diunggah untuk penilaian ini.</em></p>
        <?php endif; ?>

      </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<style>
  #single-penilaian .card {
    background: #fff;
  }
  #single-penilaian h2 {
    color: #1a237e;
  }
  .pdf-item {
    border: 1px solid #eee;
    background: #fff;
    border-radius: 10px;
    padding: 1rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }
  .pdf-item iframe {
    border-radius: 8px;
  }
  .pdf-item + .pdf-item {
    margin-top: 2rem;
  }
</style>

<?php get_footer(); ?>

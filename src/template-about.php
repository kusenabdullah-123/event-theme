<?php

/**
 * Template Name: About Page
 */
get_header();
?>

<section class="about-area about-five py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Gambar Kiri -->
            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                <div class="about-image-five position-relative">
                    <svg class="shape position-absolute top-0 start-0" width="106" height="134" viewBox="0 0 106 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="1.66654" cy="1.66679" r="1.66667" fill="#DADADA" />
                        <circle cx="16.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                        <circle cx="30.9998" cy="31.0001" r="1.66667" fill="#DADADA" />
                        <circle cx="45.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                        <circle cx="60.3333" cy="60.3335" r="1.66667" fill="#DADADA" />
                        <circle cx="74.6668" cy="74.6668" r="1.66667" fill="#DADADA" />
                        <circle cx="89.3333" cy="89.3333" r="1.66667" fill="#DADADA" />
                        <circle cx="104" cy="104" r="1.66667" fill="#DADADA" />
                    </svg>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/about-img1.jpg" alt="Tentang Kami" class="img-fluid rounded-3 shadow" />
                </div>
            </div>

            <!-- Konten Kanan -->
            <div class="col-lg-6 col-12">
                <div class="about-five-content">
                    <h6 class="small-title text-uppercase text-primary fw-semibold mb-2">Tentang Kami</h6>
                    <h2 class="main-title fw-bold mb-4">Kami Hadir dengan Pengalaman & Pengetahuan</h2>
                    <p>
                        Obor Langit adalah Event Organizer yang bergerak di bidang akademik, khususnya penyelenggaraan Olimpiade Akademik Nasional. Kami hadir sebagai wadah pengembangan potensi pelajar Indonesia melalui ajang kompetisi yang edukatif, inspiratif, dan membangun semangat berprestasi di bidang ilmu pengetahuan.
                    </p>
                    <p>
                        Sebagai penyelenggara Olimpiade Akademik yang telah terkurasi oleh Puspresnas (Pusat Prestasi Nasional), kegiatan kami bersifat resmi dan diakui oleh Dinas Pendidikan. Hal ini menjadi bukti komitmen kami dalam menjaga kualitas, kredibilitas, serta integritas setiap kegiatan yang diselenggarakan.
                    </p>
                    <p>
                        Melalui Obor Langit, kami berupaya menciptakan pengalaman kompetisi yang bermakna, menumbuhkan karakter berprestasi, dan mendorong generasi muda Indonesia untuk terus mengembangkan potensi terbaiknya menuju masa depan yang gemilang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .about-image-five {
        position: relative;
    }

    .about-image-five .shape {
        position: absolute;
        left: -30px;
        top: -30px;
        z-index: -1;
        opacity: 0.3;
    }

    .about-five-content p {
        margin-bottom: 1rem;
        line-height: 1.7;
        color: #555;
    }

    .about-five-content .small-title {
        letter-spacing: 1px;
    }
</style>

<?php get_footer(); ?>
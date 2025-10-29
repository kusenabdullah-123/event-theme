<?php

/**
 * Template Name: Contact Page
 */
get_header();
?>

<!-- ========================= contact-section start ========================= -->
<section id="contact" class="contact-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="contact-item-wrapper">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="lni lni-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <h4>Kontak</h4>
                                    <p>0984537278623</p>
                                    <p>yourmail@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <div class="contact-content">
                                    <h4>Alamat</h4>
                                    <p>Jl. Contoh No.123, Jakarta, Indonesia</p>
                                    <p>Indonesia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="lni lni-alarm-clock"></i>
                                </div>
                                <div class="contact-content">
                                    <h4>Jam Operasional</h4>
                                    <p>24 Jam / 7 Hari</p>
                                    <p>Office: 10:00 - 17:30</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="col-xl-8">
                <div class="contact-form-wrapper">
                    <div class="row">
                        <div class="col-xl-10 col-lg-8 mx-auto">
                            <div class="section-title text-center">
                                <span>Hubungi Kami</span>
                                <h2>Siap untuk Memulai?</h2>
                                <p>Kirimkan pesan Anda dan tim kami akan segera menghubungi Anda.</p>
                            </div>
                        </div>
                    </div>

                    <form action="#" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="name" id="name" placeholder="Nama" required class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="phone" id="phone" placeholder="Nomor Telepon" required class="form-control" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <textarea name="message" id="message" placeholder="Pesan Anda..." rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn primary-btn rounded-full">
                                    Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Form Kontak -->
        </div>
    </div>
</section>
<!-- ========================= contact-section end ========================= -->

<!-- ========================= map-section ========================= -->
<section class="map-section map-style-9">
    <div class="map-container">
        <iframe
            style="border:0; height: 500px; width: 100%;"
            loading="lazy"
            allowfullscreen
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.7887109309127!2d-77.44196278417968!3d38.95165507956235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDU3JzA2LjAiTiA3N8KwMjYnMjMuMiJX!5e0!3m2!1sen!2sbd!4v1545420879707">
        </iframe>
    </div>
</section>
<!-- ========================= map-section end ========================= -->

<style>
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .contact-icon {
        font-size: 30px;
        color: var(--bs-primary);
        margin-right: 15px;
    }

    .contact-content h4 {
        font-weight: 700;
        margin-bottom: 5px;
    }

    .contact-form input,
    .contact-form textarea {
        border-radius: 8px;
        padding: 10px 15px;
    }

    .primary-btn {
        background-color: #007bff;
        color: #fff;
        border-radius: 50px;
        padding: 10px 25px;
        border: none;
    }

    .primary-btn:hover {
        background-color: #0056b3;
    }

    .map-section iframe {
        border-radius: 10px;
    }
</style>

<?php get_footer(); ?>
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
                                    <p>oborlangit@gmail.com</p>
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
                                    <p class="alamat">Perum Puri Gading Mas Permai, Blok I No.16, Dusun Krajan, Dadapan, Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68462</p>
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
                                    <p>Office: 09:00 - 21:00</p>
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
                                <h2>Hubungi Kami</h2>
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

<style>
    .contact-section {
        min-height: 45rem;
    }
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



</style>

<?php get_footer(); ?>
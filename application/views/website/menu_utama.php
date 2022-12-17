<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $row->nama_usaha;?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('gambar/') ?>logo.png" rel="icon">
    <link href="<?= base_url('gambar/') ?>logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('bizpage/') ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('bizpage/') ?>assets/css/style.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">

    <!-- =======================================================
  * Template Name: BizPage - v5.10.1
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <!-- <h1 class="logo"><a href="index.html">Arkatama</a></h1> -->
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <a href="<?= base_url('user'); ?>" class="logo"><img src="<?= base_url('gambar/') ?>logo1.png" alt="" class="img-fluid"></a>

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                            <li><a class="nav-link scrollto " href="#banner">Produk/Layanan</a></li>

                            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                            <?php if($this->session->userdata('username') == null){?>
                            <li class="dropdown"><a href="#"><span>Masuk</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>

                                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                                </ul>
                            </li>
                        <?php }else{?>
                            <li class="dropdown"><a href="#"><span><?php echo $this->session->userdata('nama'); ?></span> <i class="bi bi-chevron-down"></i></a>
                                <ul>

                                    <li><a href="#"><?php echo $this->session->userdata('username') ?></a></li>
                                    <li><a href="<?= base_url('login/logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        <?php }?>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
                </div>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

                <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <?php foreach ($hero as $value) { ?> ?>
                            <div class="carousel-item active" style="background-image: url(<?= base_url('gambar/thumb/') . $value->image; ?>)">
                                <div class="carousel-container">
                                    <div class="container">
                                        <h2 class="animate__animated animate__fadeInDown judulHero" id="judulHero"><?= $value->ukuran; ?></h2>
                                        <p class="animate__animated animate__fadeInUp">Tersedia: <?= $value->jumlah; ?></p>
                                        <a href="#featured-services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>


                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <!-- ======= Services Section ======= -->
        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action">
            <div class="container text-center" data-aos="zoom-in">
                <h3>Mulai pesan kebutuhan Anda di <?php echo $row->nama_usaha;?></h3>
                <p> <?php echo $row->nama_usaha;?> menghadirkan layanan terbaik untuk memenuhi kebutuhan produktivitas dan kredibilitas bisnis Anda.</p>
                <a class="cta-btn" href="#contact">Hubungi Kami</a>
            </div>
        </section><!-- End Call To Action Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="banner" class="section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Produk Banner,Stiker,Buku,Yasin,Mug,Stampel,Bendera,Nota</h3>
                </header>

                <div class="row ">
                    <p class="d-flex justify-content-end"><a href="<?= base_url('user/page_produk/'); ?>" id="lihatSemua">Lihat lainnya ></a></p>
                </div>
                <div class="row text-center product">
                    <div class="col">
                        <div class="swiper mySwiper">

                            <div class="swiper-wrapper">
                                <?php foreach ($banner as $brg) : ?>

                                        <div class="swiper-slide card-product" style="width: 265px; margin: 0 auto;">

                                            <div class="card" style="width: 265px;">
                                                <img src="<?= base_url('gambar/thumb/') . $brg->image; ?>" class="card-img-top" height="255" width="225" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="font-size: 16px;"><b><?= $brg->ukuran; ?></b></h5>
                                                    
                                                    <span class="badge rounded-pill text-bg-success mt-3 mb-3">Jumlah. <?=$brg->jumlah;  ?></span>
                                                    <br>
                                                      
                                                    <a href="<?php echo 'https://api.whatsapp.com/send?phone='.$row->no_hp;?>" target="_blank" class="btn btn-primary btn-sm">Kontak
                                                    </a>

                            
                                                </div>
                                            </div>

                                        </div>
                                <?php endforeach; ?>
                            </div>



                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="toogle-slider d-flex justify-content-end mt-2">
                        <i class="bi bi-arrow-left-circle-fill iconBg" style="font-size: 2.2rem;"></i>
                        <i class="bi bi-arrow-right-circle-fill iconBg" style="font-size: 2.2rem; margin-left: 10px;"></i>
                    </div>
                </div>

                <!-- Swiper -->
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="section-bg" style="padding-top: 20;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h3>Kontak Kami</h3>
                    <p>Tertarik menggunakan layanan <?php echo $row->nama_usaha;?>? Tapi pengen tanya-tanya dulu? Klik kontak dibawah ya.</p>
                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <address><?php echo $row->alamat;?></address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="bi bi-phone"></i>
                            <h3>No Telepon</h3>
                            <p><a href="tel:+155895548855"><?php echo $row->no_hp;?></a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:info@arkatama.id"><?php echo $row->email;?></a></p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

        <!-- ======= Our Clients Section ======= -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3><?php echo $row->nama_usaha;?></h3>
                        <p><?php echo $row->tentang;?>.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Navigasi</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#banner">Produk/Layanan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#contact">Kontak</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Kontak Kami</h4>
                        <p>
                           <?php echo $row->alamat;?><br>
                            <strong>Phone:</strong> <?php echo $row->no_hp;?><br>
                            <strong>Email:</strong> <?php echo $row->email;?><br>
                        </p>



                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Sosial Media</h4>
                        <div class="social-links">
                            <a href="<?php echo $row->facebook;?>" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="<?php echo $row->instagram;?>" class="instagram"><i class="bi bi-instagram"></i></a>
                        
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><?php echo $row->nama_usaha;?></strong>.
            </div>
           
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- Vendor JS Files -->
    <script src="<?= base_url('bizpage/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('bizpage/') ?>assets/js/main.js"></script>
    <script src="<?= base_url('assets/') ?>js/main.js"></script>

</body>

</html>
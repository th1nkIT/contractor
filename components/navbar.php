<?php

function navbarComponent()
{
    $currentUrl = $_SERVER['REQUEST_URI'];
    $ROUTE = $_ENV['ROUTE'];

    // Beranda
    $berandaClass = ($currentUrl ===  $ROUTE || $currentUrl ===  $ROUTE) ? 'aktif' : '';

    // Proyek
    $proyekClass = (strpos($currentUrl,  $ROUTE . 'proyek') === 0) ? 'aktif' : '';

    // Bisnis
    $bisnisClass = (strpos($currentUrl,  $ROUTE . 'bisnis') === 0) ? 'aktif' : '';

    // Artikel
    $articleClass = (strpos($currentUrl,  $ROUTE . 'article') === 0) ? 'aktif' : '';

    // Kontak
    $kontakClass = (strpos($currentUrl,  $ROUTE . 'kontak') === 0) ? 'aktif' : '';

    // Tentang Kami
    $tentangKamiClass = (strpos($currentUrl,  $ROUTE . 'tentang-kami') === 0) ? 'aktif' : '';

    // Galeri
    $galeriClass = (strpos($currentUrl,  $ROUTE . 'galeri') === 0) ? 'aktif' : '';

    echo '
    <section class="navbars">
        <!-- Navbar Sosmed Start -->
        <div class="navbars-sosmed">
            <!-- Sosmed Link Kiri Start -->
            <div class="sosmed-kiri">
                <a href="#"><i class="bi-envelope"></i> admin@yuriborneo.com</a>
                <a href="#"><i class="bi-telephone"></i> +6282255665512</a>
            </div>
            <!-- Sosmed Link Kiri End -->

            <!-- Sosmed Link Kanan Start -->
            <div class="sosmed-kanan">
                <a href="#"><i class="bi-facebook"></i></a>
                <a href="#"><i class="bi-twitter"></i></a>
                <a href="#"><i class="bi-linkedin"></i></a>
                <a href="#"><i class="bi-google"></i></a>
            </div>
            <!-- Sosmed Link Kanan End -->
        </div>
        <!-- Navbar Sosmed End -->

        <div class="navbars-konten">
            <!-- Logo Start -->
            <div class="navbars-logo">
                <a href="/"><img src="/backstage/img/logo_backstage_warna.png" width="35px" alt="Logo Backstage Yuri Borneo"></a>
            </div>
            <!-- Logo End -->

            <!-- Nav Start -->
            <div class="navbars-ex">
                <button type="button" id="hamburger-menu"><i class="bi-list"></i></button>
            </div>
            <div class="navbars-nav">
                <a class="' . $berandaClass . '" href="/">BERANDA</a>
                <div class="drop">
                    <button type="button">TENTANG KAMI <i class="bi-chevron-down"></i></button>
                    <ul>
                        <li><a class="' . $tentangKamiClass . '" href="/tentang-kami">TENTANG KAMI</a></li>
                        <li><a class="' . $galeriClass . '" href="/galeri">GALERI</a></li>
                    </ul>
                </div>
                <a class="' . $proyekClass . '" href="/proyek">PROYEK</a>
                <a class="' . $bisnisClass . '" href="/bisnis">BISNIS KAMI</a>
                <a class="' . $articleClass . '" href="/article">ARTIKEL</a>
                <a class="' . $kontakClass . '" href="/kontak">KONTAK</a>
            </div>
            <!-- Nav End -->
        </div>
    </section>
    ';
}

<?php

function navbarComponent()
{
    $currentUrl = $_SERVER['REQUEST_URI'];

    // Beranda
    $berandaClass = ($currentUrl === '/thinkit/' || $currentUrl === '/thinkit') ? 'aktif' : '';

    // Proyek
    $proyekClass = (strpos($currentUrl, '/thinkit/proyek') === 0) ? 'aktif' : '';

    // Bisnis
    $bisnisClass = (strpos($currentUrl, '/thinkit/bisnis') === 0) ? 'aktif' : '';

    // Artikel
    $articleClass = (strpos($currentUrl, '/thinkit/article') === 0) ? 'aktif' : '';

    echo '
    <section class="navbars">
        <!-- Navbar Sosmed Start -->
        <div class="navbars-sosmed">
            <!-- Sosmed Link Kiri Start -->
            <div class="sosmed-kiri">
                <a href="#"><i class="bi-envelope"></i> info@gmail.com</a>
                <a href="#"><i class="bi-telephone"></i> +6221 4288 4257</a>
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
                <a href="/thinkit">logo</a>
            </div>
            <!-- Logo End -->

            <!-- Nav Start -->
            <div class="navbars-ex">
                <button type="button" id="hamburger-menu"><i class="bi-list"></i></button>
            </div>
            <div class="navbars-nav">
                <a class="' . $berandaClass . '" href="/thinkit">BERANDA</a>
                <div class="drop">
                    <button type="button">TENTANG KAMI <i class="bi-chevron-down"></i></button>
                    <ul>
                        <li><a href="pages/tentang/tentang-kami.php">TENTANG KAMI</a></li>
                        <li><a href="pages/tentang/galeri.php">GALERI</a></li>
                    </ul>
                </div>
                <a class="' . $proyekClass . '" href="/thinkit/proyek">PROYEK</a>
                <a class="' . $bisnisClass . '" href="/thinkit/bisnis">BISNIS KAMI</a>
                <a class="' . $articleClass . '" href="/thinkit/article">ARTIKEL</a>
                <a href="pages/kontak/kontak.php">KONTAK</a>
            </div>
            <!-- Nav End -->
        </div>
    </section>
    ';
}

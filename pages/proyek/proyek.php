<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- My CSS -->
    <link rel="stylesheet" href="../../plugin/css/app.css">
    <link rel="stylesheet" href="../../plugin/css/artikel.css">
    <link rel="stylesheet" href="../../plugin/css/bis.css">
    <link rel="stylesheet" href="../../plugin/css/db.css">
    <link rel="stylesheet" href="../../plugin/css/footer.css">
    <link rel="stylesheet" href="../../plugin/css/Nav.css">
    <link rel="stylesheet" href="../../plugin/css/pry.css">
    
    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">
    
    <title>Halaman Proyek</title>
</head>
<body>
    <!-- Header Start -->
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
                        <a href="../../index.php">logo</a>
                    </div>
                <!-- Logo End -->

                <!-- Nav Start -->
                    <div class="navbars-nav">
                        <a href="../../index.php">BERANDA</a>
                        <div class="drop">
                            <a href="#">TENTANG KAMI <i class="bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="../tentang/tentang-kami.php">Tentang Kami</a></li>
                                <li><a href="../tentang/galeri.php">Galeri</a></li>
                            </ul>
                        </div>
                        <a class="aktif" href="proyek.php">PROYEK</a>
                        <a href="../bisnis/bisnis.php">BISNIS KAMI</a>
                        <a href="../artikel/artikel.php">ARTIKEL</a>
                        <a href="../kontak/kontak.php">KONTAK</a>
                    </div>
                <!-- Nav End -->
            </div>
        </section>

        <!-- Jumbotron Start -->
            <section class="jb-proyek">
                <div class="jb-konten-proyek">
                    <h1>Halaman Proyek</h1>
                </div>
            </section>
        <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Konten Proyek Start -->
        <section class="page">
            <!-- Button Proyek Start -->
                <div class="status">
                    <button class="aktif" type="button" onclick="semua()">SEMUA</button>
                    <button type="button" onclick="sudah()">SUDAH DIKERJAKAN</button>
                    <button type="button" onclick="sedang()">SEDANG DIKERJAKAN</button>
                    <button type="button" onclick="akan()">AKAN DIKERJAKAN</button>
                </div>
            <!-- Button Proyek End -->

            <!-- Konten Proyek Start -->
                <div class="konten-proyek">
                    <div class="cards-proyek">
                        <!-- Img Cards Start -->
                            <div class="img-cards">
                                <img src="../../plugin/img/danau.jpeg" alt="">
                            </div>
                        <!-- Img Cards End -->

                        <!-- Konten Cards Start -->
                            <div class="cards-main">
                                <h1>Judul</h1>
                                <p class="sts-done"><span>Selesai!</span></p>
                                <p>&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, itaque.</p>
                                <div class="btn-cards">
                                    <a href="#">Selengkapnya <i class="bi-arrow-right"></i></a>
                                </div>
                            </div>
                        <!-- Konten Cards End -->
                    </div>
                </div>
            <!-- Konten Proyek End -->
        </section>
    <!-- Konten Proyek End -->

    <!-- Info Start -->
    <section class="info">
            <!-- Alamat Start -->
                <div class="konten-info">
                    <h1>IKON 1</h1>
                    <p><b>Alamat</b></p>
                    <p>Jl. Letjen Lorem ipsum dolor sit amet consectetur.</p>
                </div>
            <!-- Alamat End -->

            <!-- Telefon Start -->
                <div class="konten-info">
                    <h1>IKON 2</h1>
                    <p><b>Hubungi Kami</b></p>
                    <p>
                        +62 821 4288 4257 <br />
                        +62 821 4288 4258
                    </p>
                </div>
            <!-- Telefon End -->

            <!-- Jam Kerja Start -->
                <div class="konten-info">
                    <h1>IKON 3</h1>
                    <p><b>Jam Kerja</b></p>
                    <p>
                        Senin - Jumat (08:00 AM - 05:00 PM) <br />
                        Sabtu dan Minggu : Libur
                    </p>
                </div>
            <!-- Jam Kerja End -->
        </section>
    <!-- Info End -->

    <!-- Footer Start -->
        <footer class="footer">
            <div class="foot">
                <h1>Tentang Kami</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima repudiandae optio aliquam omnis earum expedita, blanditiis saepe sapiente numquam ipsa!</p>
            </div>

            <div class="foot">
                <h1>Info Terbaru</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima repudiandae optio aliquam omnis earum expedita, blanditiis saepe sapiente numquam ipsa!</p>
            </div>

            <div class="foot">
                <h1>Berita Terpopuler</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima repudiandae optio aliquam omnis earum expedita, blanditiis saepe sapiente numquam ipsa!</p>
            </div>

            <div class="foot">
                <h1>Quick Links</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima repudiandae optio aliquam omnis earum expedita, blanditiis saepe sapiente numquam ipsa!</p>
            </div>
        </footer>

        <!-- Copyright Start -->
            <div class="copy">
                <h1>Copyright &copy; 2023. All Rights Reserved.</h1>
            </div>
        <!-- Copyright End -->
    <!-- Footer End -->
</body>
</html>
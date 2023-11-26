<?php
    require 'backstage/koneksi/koneksi.php';

    // Settings
    $stmt_settings = $koneksi->prepare("SELECT * FROM settings");
    $stmt_settings->execute();
    $settings = $stmt_settings->get_result();
    $stmt_settings->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="plugin/css/app.css">
    <link rel="stylesheet" href="plugin/css/artikel.css">
    <link rel="stylesheet" href="plugin/css/bisnis.css">
    <link rel="stylesheet" href="plugin/css/db.css">
    <link rel="stylesheet" href="plugin/css/footer.css">
    <link rel="stylesheet" href="plugin/css/navbar.css">
    
    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">
    
    <title>Halaman Beranda</title>
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
                        <a href="index.php">logo</a>
                    </div>
                <!-- Logo End -->

                <!-- Nav Start -->
                    <div class="navbars-nav">
                        <a class="aktif" href="index.php">BERANDA</a>
                        <a href="#">TENTANG KAMI</a>
                        <a href="pages/proyek/proyek.php">PROYEK</a>
                        <a href="pages/bisnis/bisnis.php">BISNIS KAMI</a>
                        <a href="pages/artikel/artikel.php">ARTIKEL</a>
                        <a href="pages/kontak/kontak.php">KONTAK</a>
                    </div>
                <!-- Nav End -->
            </div>
        </section>

        <!-- Jumbotron Start -->
            <section class="jb">
                <div class="jb-konten">
                    <div class="jb-kiri">
                        <a href="#"><i class="bi-arrow-left-circle"></i></a>
                    </div>

                    <!-- Jumbotron Main Start -->
                        <div class="jb-main">
                            <h1>Kami Fokus Untuk Anda</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae fugit fuga ad veniam? Voluptatem distinctio modi officiis magni quaerat repudiandae expedita illum nostrum, rem perspiciatis ratione rerum nesciunt dolor ipsa.</p>
                            
                            <div class="jb-main-btn">
                                <a href="pages/proyek/proyek.php">LIHAT PROYEK</a>
                                <a class="tentang-kami-btn" href="pages/tentang/tentang-kami.php">TENTANG KAMI</a>
                            </div>
                        </div>
                    <!-- Jumbotron Main End -->
                    
                    <div class="jb-kanan">
                        <a href="#"><i class="bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </section>
        <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Alasan Start -->
        <section class="alasan">
            <!-- Titke Alasan Start -->
                <div class="judul">
                    <h1>MENGAPA MEMILIH KAMI</h1>
                    <p>Alasan mengapa Perusahaan Anda harus memilih jasa kami dalam pembangunan"</p>
                </div>
            <!-- Title Alasan End -->

            <!-- Konten Alasan Start -->
                <div class="konten-alasan">
                    <div class="main-konten">
                        <div class="main-alasan">
                            <span>IKON 1</span>
                            <div class="isi-alasan">
                                <h1>Kami Berpengalaman Lebih Dari 10 Tahun</h1>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                            </div>
                        </div>

                        <div class="main-alasan">
                            <span>IKON 2</span>
                            <div class="isi-alasan">
                                <h1>Mempunyai Tim yang Solid & Berpengalaman</h1>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                            </div>
                        </div>

                        <div class="main-alasan">
                            <span>IKON 3</span>
                            <div class="isi-alasan">
                                <h1>Berinovasi</h1>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                            </div>
                        </div>

                        <div class="main-alasan">
                            <span>IKON 4</span>
                            <div class="isi-alasan">
                                <h1>Tantangan Bukanlah Halangan</h1>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Konten Alasan End -->
        </section>
    <!-- Alasan End -->

    <!-- Bisnis Kami Start -->
        <div class="bisnis-kami">
            <!-- Title Bisnis Start -->
                <div class="judul">
                    <h1>BISNIS KAMI</h1>
                    <p>Berikut adalah bidang layanan yang kami kerjakan</p>
                </div>
            <!-- Title Bisnis End -->

            <!-- Card Start -->
                <div class="cards-bisnis">
                    <div class="cards">
                        <!-- Card Foto -->
                            <div class="cards-foto">
                                <img src="plugin/img/danau.jpeg" alt="" />
                            </div>
                        <!-- Card Foto End -->

                        <!-- Card Konten Start -->
                            <div class="cards-konten">
                                <h1>Judul</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, possimus. Nemo nihil quas minima exercitationem!</p>
                                <div class="cards-btn">
                                    <a href="#">Selengkapnya <i class="bi-arrow-right"></i></a>
                                </div>
                            </div>
                        <!-- Card Konten End -->
                    </div>
                </div>
            <!-- Card End -->
        </div>
    <!-- Bisnis Kami End -->

    <!-- Pertanyaan Start -->
        <section class="pertanyaan">
            <!-- Title Pertanyaan Start -->
                <div class="judul">
                    <h1>PUNYA BEBERAPA PERTANYAAN?</h1>
                    <p>Berikut adalah pertanyaan yang sering ditanyakan kepada tim customer servis kami</p>
                </div>
            <!-- Title Pertanyaan End -->

            <!-- Konten Pertanyaan Start -->
                <div class="tanya">
                    <!-- Image Pertanyaan Start -->
                        <div class="pertanyaan-img">
                            <img src="plugin/img/bingung.jpg" alt="">
                        </div>
                    <!-- Image Pertanyaan End -->
            
                    <!-- Pertanyaan Start -->
                        <div class="pertanyaan-konten">
                            <!-- Pertanyaan -->
                                <div class="question">
                                    <div class="pertanyaannya">
                                        <h1>Apa itu PT. Naviri Multi Konstruksi?</h1>
                                        <button type='button'><i class="bi-dot"></i><i class="bi-dot"></i><i class="bi-dot"></i></button>
                                    </div>

                                    <div class="jawaban">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto eaque tempore voluptatibus exercitationem esse doloremque! Molestias alias at sapiente nobis maxime sed sequi cumque.</p>
                                    </div>
                                </div>
                            <!-- Pertanyaan -->

                            <!-- Pertanyaan -->
                                <div class="question">
                                    <div class="pertanyaannya">
                                        <h1>Berpengalaman dan mencapai keberhasilan bidang apa?</h1>
                                        <button type='button'><i class="bi-dot"></i><i class="bi-dot"></i><i class="bi-dot"></i></button>
                                    </div>

                                    <div class="jawaban">
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi optio iste quidem quis quaerat. Laudantium ullam voluptatum vero ut! Perspiciatis ipsam voluptatibus repellendus nemo voluptate.</p>
                                    </div>
                                </div>
                            <!-- Pertanyaan -->

                            <!-- Pertanyaan -->
                                <div class="question">
                                    <div class="pertanyaannya">
                                        <h1>Sudah berapa banyak konstruksi yang dibangun?</h1>
                                        <button type='button'><i class="bi-dot"></i><i class="bi-dot"></i><i class="bi-dot"></i></button>
                                    </div>

                                    <div class="jawaban">
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci soluta incidunt eaque, rerum odio porro accusamus quod! Temporibus, deserunt accusamus possimus mollitia ea eligendi quod?</p>
                                    </div>
                                </div>
                            <!-- Pertanyaan -->

                            <!-- Pertanyaan -->
                                <div class="question">
                                    <div class="pertanyaannya">
                                        <h1>Peralatan apa yang digunakan?</h1>
                                        <button type='button'><i class="bi-dot"></i><i class="bi-dot"></i><i class="bi-dot"></i></button>
                                    </div>

                                    <div class="jawaban">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cumque minima, similique esse animi atque exercitationem ea delectus ipsa a, incidunt consectetur molestiae provident maiores.</p>
                                    </div>
                                </div>
                            <!-- Pertanyaan -->

                            <!-- Pertanyaan -->
                                <div class="question">
                                    <div class="pertanyaannya">
                                        <h1>Apakah PT. Naviri Multi Konstruksi sudah bersertifikat internasional?</h1>
                                        <button type='button'><i class="bi-dot"></i><i class="bi-dot"></i><i class="bi-dot"></i></button>
                                    </div>

                                    <div class="jawaban">
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita perferendis ex modi omnis. Numquam saepe vero adipisci exercitationem excepturi accusantium error dolores, suscipit placeat! Dolores.</p>
                                    </div>
                                </div>
                            <!-- Pertanyaan -->
                        </div>
                    <!-- Pertanyaan End -->
                </div>
            <!-- Konten Pertanyaan End -->
        </section>
    <!-- Pertanyaan End -->

    <!-- Artikel Start -->
        <section class="artikel">
            <!-- Title Artikel Start -->
                <div class="judul">
                    <h1>ARTIKEL TERBARU</h1>
                    <p>Berisi berita informasi dan event yang ada di perusahaan kami</p>
                </div>
            <!-- Title Artikel End -->

            <!-- Konten Artikel Start -->
                <div class="artikel-konten">
                    <!-- Card Artikel Start -->
                        <div class="cards-artikel">
                            <!-- Cards Foto Start -->
                                <div class="cards-foto">
                                    <img src="plugin/img/danau.jpeg" alt="" />
                                </div>
                            <!-- Cards Foto End -->

                            <!-- Cards Konten Start -->
                                <div class="cards-konten">
                                    <div class="cards-konten-title">
                                        <div class="info-title">
                                            <h1>Admin</h1>
                                            <p>20-10-2023</p>
                                        </div>
                                        <h1>Judul</h1>
                                    </div>
                                    <p class='isi-artikel'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, possimus. Nemo nihil quas minima exercitationem!</p>
                                    <div class="cards-btn">
                                        <a href="#">Selengkapnya <i class="bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            <!-- Cards Konten End -->
                        </div>
                    <!-- Card Artikel End -->
                </div>
            <!-- Konten Artikel End -->
        </section>
    <!-- Artikel End -->

    <!-- Client Kami Start -->
        <section class="client">
            <!-- Title Client Start -->
                <div class="judul">
                    <h1>CLIENT KAMI</h1>
                    <p>Beberapa perusahaan dan Instansi yang sudah mempercayakan pengerjaan konstruksinya dengan kami</p>
                </div>
            <!-- Title Client End -->

            <!-- Konten Client Start -->
                <div class="konten-client">
                    <div class="img-client">
                        <img src="plugin/img/danau.jpeg" alt="" />
                    </div>

                    <div class="img-client">
                        <img src="plugin/img/danau.jpeg" alt="" />
                    </div>

                    <div class="img-client">
                        <img src="plugin/img/danau.jpeg" alt="" />
                    </div>

                    <div class="img-client">
                        <img src="plugin/img/danau.jpeg" alt="" />
                    </div>

                    <div class="img-client">
                        <img src="plugin/img/danau.jpeg" alt="" />
                    </div>
                </div>
            <!-- Konten Client End -->
        </section>
    <!-- Client Kami End -->

        <!-- Info Start -->
        <section class="info">
            <?php while ($pecah_settings = $settings->fetch_assoc()) : ?>
                <div class="konten-info">
                    <h1>IKON 1</h1>
                    <p><b><?php echo $pecah_settings['title']; ?></b></p>
                    <p><?php echo $pecah_settings['keterangan']; ?></p>
                </div>
            <?php endwhile; ?>
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
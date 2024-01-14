<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- My CSS -->
    <link rel="stylesheet" href="../../plugin/css/App.css">
    <link rel="stylesheet" href="../../plugin/css/artikel.css">
    <link rel="stylesheet" href="../../plugin/css/Bisnis.css">
    <link rel="stylesheet" href="../../plugin/css/Dashboard.css">
    <link rel="stylesheet" href="../../plugin/css/Footer.css">
    <link rel="stylesheet" href="../../plugin/css/nv.css">
    <link rel="stylesheet" href="../../plugin/css/Pro.css">
    
    <!-- Query Media CSS -->
    <link rel="stylesheet" href="../../plugin/css/responsive/Bisnis.css">
    <link rel="stylesheet" href="../../plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="../../plugin/css/responsive/Footer.css">
    <link rel="stylesheet" href="../../plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="../../plugin/css/responsive/View.css">
    
    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">
    
    <title>Halaman Binis Kami</title>
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
                    <div class="navbars-ex">
                        <button type="button" id="hamburger-menu"><i class="bi-list"></i></button>
                    </div>
                    <div class="navbars-nav">
                        <a href="../../index.php">BERANDA</a>
                        <div class="drop">
                            <button type="button">TENTANG KAMI <i class="bi-chevron-down"></i></button>
                            <ul>
                                <li><a href="../tentang/tentang-kami.php">TENTANG KAMI</a></li>
                                <li><a href="../tentang/galeri.php">GALERI</a></li>
                            </ul>
                        </div>
                        <a href="../proyek/proyek.php">PROYEK</a>
                        <a class="aktif" href="bisnis.php">BISNIS KAMI</a>
                        <a href="../artikel/artikel.php">ARTIKEL</a>
                        <a href="../kontak/kontak.php">KONTAK</a>
                    </div>
                <!-- Nav End -->
            </div>
        </section>

        <!-- Jumbotron Start -->
        <section class="jb-proyek">
                <div class="jb-konten-proyek">
                    <h1>Halaman Bisnis</h1>
                </div>
            </section>
        <!-- Jumbotron End -->
    <!-- Header End -->

    <?php
        include "../../backstage/config/koneksi.php";
    
        // Contoh query untuk mendapatkan jumlah total data
        $queryTotalRows = "SELECT COUNT(*) as total_rows FROM articles";
        $resultTotalRows = mysqli_query($koneksi, $queryTotalRows);
        $rowTotalRows = mysqli_fetch_assoc($resultTotalRows);

        $totalRows = $rowTotalRows['total_rows'];

        $dataPerPage = 12; // Jumlah data per halaman
        $totalPages = ceil($totalRows / $dataPerPage); // Hitung jumlah halaman

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($currentPage - 1) * $dataPerPage;

        $queryData = "SELECT * FROM articles LIMIT $offset, $dataPerPage";
        $resultData = mysqli_query($koneksi, $queryData);
    ?>
    
    <!-- Konten Bisnis Start -->
        <section class="page">
            <!-- Konten Bisnis Start -->
                <!-- Card Start -->
                    <div class="artikel-konten">
                        <?php
                            while ($row = mysqli_fetch_assoc($resultData)) {
                        ?>
                        <div class="cards-artikel">
                            <!-- Cards Foto Start -->
                                <div class="cards-foto">
                                    <img height="350px" src="../../backstage/view/articles/images/<?php echo $row['images_article']; ?>" alt="" />
                                </div>
                            <!-- Cards Foto End -->
        
                            <!-- Cards Konten Start -->
                                <div class="cards-konten">
                                    <div class="cards-konten-title">
                                        <h1 class="title"><?php echo $row['title_article']; ?></h1>
                                    </div>
                                    <p class='isi-artikel'>
                                        <?php
                                            // Memotong isi_article menjadi maksimal 100 kata
                                            $isi_article = $row['isi_article'];
                                            $words = explode(" ", $isi_article);
                                            $trimmed_content = implode(" ", array_slice($words, 0, 5));
                                            echo $trimmed_content . (count($words) > 5 ? "..." : "");
                                        ?>
                                    </p>
                                    <div class="cards-btn">
                                        <a href="show_artikel.php?id=<?php echo $row['id']; ?>">Selengkapnya <i class="bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            <!-- Cards Konten End -->
                        </div>
                        <?php } ?>
                    </div>
                <!-- Card End -->

                <!-- Pagination Start -->
                    <div class="pagination">
                        <div class="wrap">
                        <?php
                            $now;
                            if ($currentPage > 1) {
                                $prevPage = $currentPage - 1;
                                echo "<a href='?page=$prevPage'><i class='bi-caret-left'></i> SEBELUMNYA</a>";
                            } else {
                                echo "<span><i class='bi-caret-left'></i> SEBELUMNYA</span>";
                            }
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a href='?page=$i'>$i</a>";
                            }

                            if ($currentPage < $totalPages) {
                                $nextPage = $currentPage + 1;
                                echo "<a href='?page=$nextPage'>SELANJUTNYA <i class='bi-caret-right'></i></a>";
                            } else {
                                echo "<span>SELANJUTNYA <i class='bi-caret-right'></i></span>";
                            }
                            ?>
                        </div>
                    </div>
                <!-- Pagination End -->
            <!-- Konten Bisnis End -->
        </section>
    <!-- Konten Bisnis End -->

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

    <script src="../../plugin/js/scr.js"></script>
</body>
</html>
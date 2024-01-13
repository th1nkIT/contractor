<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="/thinkit/plugin/css/App.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Artikel.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Bns.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Dashboard.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Footer.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Nv.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Pro.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/Proyek.css">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/Footer.css">

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
                <a href="/thinkit">logo</a>
            </div>
            <!-- Logo End -->

            <!-- Nav Start -->
            <div class="navbars-ex">
                <button type="button" id="hamburger-menu"><i class="bi-list"></i></button>
            </div>
            <div class="navbars-nav">
                <a href="/thinkit">BERANDA</a>
                <div class="drop">
                    <button type="button">TENTANG KAMI <i class="bi-chevron-down"></i></button>
                    <ul>
                        <li><a href="../tentang/tentang-kami.php">TENTANG KAMI</a></li>
                        <li><a href="../tentang/galeri.php">GALERI</a></li>
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

    <!-- Logika Paginition Start -->
    <?php
    include "../../backstage/config/koneksi.php";
    include "../../backstage/config/constants.php";

    $queryTotalRows = "SELECT COUNT(*) as total_rows FROM projects";
    $stmtTotalRows = $koneksi->prepare($queryTotalRows);
    $stmtTotalRows->execute();
    $resultTotalRows = $stmtTotalRows->get_result();
    $rowTotalRows = $resultTotalRows->fetch_assoc();

    $totalRows = $rowTotalRows['total_rows'];

    $dataPerPage = 10;
    $totalPages = ceil($totalRows / $dataPerPage);

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    $offset = ($currentPage - 1) * $dataPerPage;

    $queryData = "SELECT * FROM projects LEFT JOIN client ON projects.client_id = client.uuid LIMIT ?, ?";
    $stmtData = $koneksi->prepare($queryData);
    $stmtData->bind_param("ii", $offset, $dataPerPage);
    $stmtData->execute();
    $resultData = $stmtData->get_result();
    ?>
    <!-- Logika Paginition End -->

    <!-- Konten Proyek Start -->
    <section class="page">
        <!-- Button Proyek Start -->
        <div class="status">
            <button class="aktif" type="button" onclick="semua()">SEMUA STATUS</button>
            <button type="button" onclick="sudah()">SUDAH DIKERJAKAN</button>
            <button type="button" onclick="sedang()">SEDANG DIKERJAKAN</button>
            <button type="button" onclick="akan()">AKAN DIKERJAKAN</button>
        </div>
        <!-- Button Proyek End -->

        <!-- Konten Proyek Start -->
        <div class="konten-proyek">
            <?php
            while ($row = $resultData->fetch_assoc()) :
            ?>
                <div class="cards-proyek">
                    <!-- Img Cards Start -->
                    <div class="img-cards">
                        <img height="350px" src="/thinkit/backstage/view/projects/images/<?php echo $row['images_projects']; ?>" alt="" />
                    </div>
                    <!-- Img Cards End -->

                    <!-- Konten Cards Start -->
                    <div class="cards-main">
                        <h1 class="title"><?php echo $row['title_project']; ?></h1>
                        <p class="sts-done"><span><?php echo StatusProject($row['status_projects']); ?></span></p>
                        <p class="isi-artikel">
                            <?php
                            // Memotong isi_article menjadi maksimal 100 kata
                            $description_project = $row['description_project'];
                            $words = explode(" ", $description_project);
                            $trimmed_content = implode(" ", array_slice($words, 0, 5));
                            echo $trimmed_content . (count($words) > 5 ? "..." : "");
                            ?>
                        </p>
                        <div class="btn-cards">
                            <a href="/thinkit/proyek/<?php echo $row['slug']; ?>">Selengkapnya <i class="bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- Konten Cards End -->
                </div>
            <?php endwhile; ?>
        </div>

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

    <script src="/thinkit/plugin/js/scr.js"></script>
</body>

</html>
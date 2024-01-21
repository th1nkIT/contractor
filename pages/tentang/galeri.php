<?php
require '../../backstage/config/koneksi.php';
require '../../components/navbar.php';
require  '../../components/footer.php';
require  '../../components/info.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="plugin/css/App.css">
    <link rel="stylesheet" href="plugin/css/Artikel.css">
    <link rel="stylesheet" href="plugin/css/Bisnis.css">
    <link rel="stylesheet" href="plugin/css/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/Footer.css">
    <link rel="stylesheet" href="plugin/css/nv.css">
    <link rel="stylesheet" href="plugin/css/Pro.css">

    <!-- Custom fonts for this template-->
    <link href="../../backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo $_ENV['ROUTE']; ?>backstage/img/favicon/favicon.ico" sizes="16x16">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="plugin/css/responsive/Galeri.css">
    <link rel="stylesheet" href="plugin/css/responsive/navbar.css">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">

    <title>Halaman Galeri</title>
</head>

<body>
    <!-- Header Start -->
    <?php navbarComponent(); ?>

    <!-- Jumbotron Start -->
    <section class="jb-proyek">
        <div class="jb-konten-proyek">
            <h1>HALAMAN GALERI</h1>
        </div>
    </section>
    <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Logika Paginition Start -->
    <?php
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
    <!-- Logika Paginition End -->

    <!-- Konten Bisnis Start -->
    <section class="page">
        <!-- Konten Bisnis Start -->
        <!-- Card Start -->
        <div class="cards-bisnis">
            <div class="cards">
                <!-- Card Foto -->
                <div class="cards-foto">
                    <img src="../../plugin/img/danau.jpeg" alt="" />
                </div>
                <!-- Card Foto End -->

                <!-- Card Konten Start -->
                <div class="cards-konten">
                    <h1>Judul</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid perferendis provident odit, nihil illo eligendi possimus, dolorum minima pariatur nesciunt, obcaecati numquam rerum mollitia...</p>
                </div>
                <!-- Card Konten End -->
            </div>

            <div class="cards">
                <!-- Card Foto -->
                <div class="cards-foto">
                    <img src="../../plugin/img/danau.jpeg" alt="" />
                </div>
                <!-- Card Foto End -->

                <!-- Card Konten Start -->
                <div class="cards-konten">
                    <h1>Judul</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid perferendis provident odit, nihil illo eligendi possimus, dolorum minima pariatur nesciunt, obcaecati numquam rerum mollitia...</p>
                </div>
                <!-- Card Konten End -->
            </div>
        </div>
        <!-- Card End -->
        <!-- Konten Bisnis End -->

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
    </section>
    <!-- Konten Bisnis End -->

    <!-- Info Start -->
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="plugin/js/scr.js"></script>
</body>

</html>
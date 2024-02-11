<?php
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
    <link rel="stylesheet" href="plugin/css/apps.css">
    <link rel="stylesheet" href="plugin/css/Artikel.css">
    <link rel="stylesheet" href="plugin/css/Bisnis.css">
    <link rel="stylesheet" href="plugin/css/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/Footers.css">
    <link rel="stylesheet" href="plugin/css/Navbar.css">
    <link rel="stylesheet" href="plugin/css/Pro.css">

    <!-- Custom fonts for this template-->
    <link href="../../backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo $_ENV['ROUTE']; ?>backstage/img/favicon/favicon.ico" sizes="16x16">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="plugin/css/responsive/Bisnis.css">
    <link rel="stylesheet" href="plugin/css/responsive/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="plugin/css/responsive/Navbars.css">
    <link rel="stylesheet" href="plugin/css/responsive/View.css">

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
    <?php navbarComponent(); ?>

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

    $queryTotalRows = "SELECT COUNT(*) as total_rows FROM category";
    $stmtTotalRows = $koneksi->prepare($queryTotalRows);
    $stmtTotalRows->execute();
    $resultTotalRows = $stmtTotalRows->get_result();
    $rowTotalRows = $resultTotalRows->fetch_assoc();

    $totalRows = $rowTotalRows['total_rows'];

    $dataPerPage = 10;
    $totalPages = ceil($totalRows / $dataPerPage);

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    $offset = ($currentPage - 1) * $dataPerPage;

    $queryData = "SELECT * FROM category LIMIT ?, ?";
    $stmtData = $koneksi->prepare($queryData);
    $stmtData->bind_param("ii", $offset, $dataPerPage);
    $stmtData->execute();
    $resultData = $stmtData->get_result();
    ?>

    <!-- Konten Bisnis Start -->
    <section class="page">
        <!-- Konten Bisnis Start -->
        <!-- Card Start -->
        <div class="artikel-konten">
            <?php
            while ($row = $resultData->fetch_assoc()) :
            ?>
                <div class="cards-artikel">
                    <!-- Cards Foto Start -->
                    <div class="cards-foto">
                        <img height="350px" src="../../backstage/view/category/images/<?php echo $row['images_category']; ?>" alt="" />
                    </div>
                    <!-- Cards Foto End -->

                    <!-- Cards Konten Start -->
                    <div class="cards-konten">
                        <div class="cards-konten-title">
                            <h1 class="title"><?php echo $row['nama_category']; ?></h1>
                        </div>
                        <p class='isi-artikel'>
                            <?php
                            // Memotong isi_article menjadi maksimal 100 kata
                            $isi_article = $row['summary_category'];
                            $words = explode(" ", $isi_article);
                            $trimmed_content = implode(" ", array_slice($words, 0, 5));
                            echo $trimmed_content . (count($words) > 5 ? "..." : "");
                            ?>
                        </p>
                        <div class="cards-btn">
                            <a href="../../bisnis/<?php echo $row['slug']; ?>">Selengkapnya <i class="bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- Cards Konten End -->
                </div>
            <?php endwhile; ?>
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
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="plugin/js/scr.js"></script>
</body>

</html>
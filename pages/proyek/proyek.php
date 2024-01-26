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
    <link rel="stylesheet" href="plugin/css/App.css">
    <link rel="stylesheet" href="plugin/css/Artikel.css">
    <link rel="stylesheet" href="plugin/css/Bisnis.css">
    <link rel="stylesheet" href="plugin/css/Dashboards.css">
    <link rel="stylesheet" href="plugin/css/Footer.css">
    <link rel="stylesheet" href="plugin/css/nv.css">
    <link rel="stylesheet" href="plugin/css/Pro.css">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="plugin/css/responsive/Proyek.css">

    <!-- Custom fonts for this template-->
    <link href="../../backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo $_ENV['ROUTE']; ?>backstage/img/favicon/favicon.ico" sizes="16x16">

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
    <?php navbarComponent(); ?>

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
                        <img height="350px" src="../../backstage/view/projects/images/<?php echo $row['images_projects']; ?>" alt="" />
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
                            <a href="proyek/<?php echo $row['slug']; ?>">Selengkapnya <i class="bi-arrow-right"></i></a>
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
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="plugin/js/scr.js"></script>
</body>

</html>
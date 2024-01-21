<?php
include '../../backstage/config/koneksi.php';
include '../../backstage/config/constants.php';
require '../../components/navbar.php';
require  '../../components/footer.php';
require  '../../components/info.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : 0;

$stmt = $koneksi->prepare("SELECT * FROM category WHERE LOWER(slug) LIKE LOWER(?)");
$slugParam = "%" . $slug . "%";
$stmt->bind_param("s", $slugParam);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();


$stmtAllCategory = $koneksi->prepare("SELECT * FROM category");
$stmtAllCategory->execute();
$category = $stmtAllCategory->get_result();
$stmtAllCategory->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="/plugin/css/App.css">
    <link rel="stylesheet" href="/plugin/css/Artikel.css">
    <link rel="stylesheet" href="/plugin/css/Bisnis.css">
    <link rel="stylesheet" href="/plugin/css/Dashboard.css">
    <link rel="stylesheet" href="/plugin/css/Footer.css">
    <link rel="stylesheet" href="/plugin/css/nv.css">
    <link rel="stylesheet" href="/plugin/css/Pro.css">
    <link rel="stylesheet" href="/plugin/css/View.css">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="/plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="/plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="/plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="/plugin/css/responsive/View.css">

    <!-- Custom fonts for this template-->
    <link href="../../backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo $_ENV['ROUTE']; ?>backstage/img/favicon/favicon.ico" sizes="16x16">

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
            <h1>Halaman Tampil</h1>
        </div>
    </section>
    <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Konten Bisnis Start -->
    <section class="page">
        <!-- Konten Bisnis Start -->
        <!-- Title Bisnis Start -->
        <div class="judul">
            <h1><?php echo $row['nama_category']; ?></h1>
        </div>
        <!-- Title Bisnis End -->

        <!-- Content Show Start -->
        <div class="ct">
            <div class="ct-img">
                <img src="../../backstage/view/category/images/<?php echo $row['images_category']; ?>" alt="">
            </div>

            <div class="ct-main">
                <!-- Deskripsi Content Start -->
                <p><?php echo $row['deskripsi_category']; ?></p>
                <!-- Deskripsi Content End -->
            </div>
        </div>
        <!-- Content Show End -->

        <!-- Button Start -->
        <div class="ct-btn">
            <?php
            while ($categoryData = $category->fetch_assoc()) :
            ?>
                <a href="../../bisnis/<?php echo $categoryData['slug']; ?>"><?php echo $categoryData['nama_category']; ?></a>
            <?php endwhile ?>
        </div>
        <!-- Button End -->
        <!-- Konten Bisnis End -->
    </section>
    <!-- Konten Bisnis End -->

    <!-- Info Start -->
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="/plugin/js/scr.js"></script>
</body>

</html>
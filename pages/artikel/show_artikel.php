<?php
include '../../backstage/config/koneksi.php';
include '../../backstage/config/constants.php';
require '../../components/navbar.php';
require  '../../components/footer.php';
require  '../../components/info.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : 0;

$stmt = $koneksi->prepare("SELECT * FROM articles WHERE LOWER(slug) LIKE LOWER(?)");
$slugParam = "%" . $slug . "%";
$stmt->bind_param("s", $slugParam);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="/thinkit/plugin/css/App.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Artikel.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Bisnis.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Dashboard.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/footer.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/nv.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Pro.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/View.css">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/View.css">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">

    <title>Halaman Artikel Kami</title>
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

    <!-- Konten Artikel Start -->
    <section class="page">
        <!-- Konten Artikel Start -->
        <!-- Title Artikel Start -->
        <div class="judul">
            <h1><?php echo $row['title_article']; ?></h1>
        </div>
        <!-- Title Artikel End -->

        <!-- Content Show Start -->
        <div class="ct">
            <div class="ct-img">
                <img src="/thinkit/backstage/view/articles/images/<?php echo $row['images_article']; ?>" alt="<?php echo $row['title_article']; ?>">
            </div>

            <div class="ct-main">
                <h1>Admin | <?php echo $row['created_at']; ?></h1>

                <!-- Deskripsi Content Start -->
                <p><?php echo $row['isi_article']; ?></p>
                <!-- Deskripsi Content End -->
            </div>
        </div>
        <!-- Content Show End -->
        <!-- Konten Artikel End -->
    </section>
    <!-- Konten Artikel End -->

    <!-- Info Start -->
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="/thinkit/plugin/js/scr.js"></script>
</body>

</html>
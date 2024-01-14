<?php
include '../../backstage/config/koneksi.php';
include '../../backstage/config/constants.php';
require '../../components/navbar.php';
require  '../../components/footer.php';
require  '../../components/info.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : 0;

$stmt = $koneksi->prepare("SELECT * FROM projects LEFT JOIN client ON projects.client_id = client.uuid WHERE LOWER(slug) LIKE LOWER(?)");
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
    <link rel="stylesheet" href="/thinkit/plugin/css/artikel.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Bisnis.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Dashboard.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Footer.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/nv.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/Pro.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/view.css">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/Footer.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="/thinkit/plugin/css/responsive/View.css">

    <!-- Custom fonts for this template-->
    <link href="/thinkit/backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

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
            <h1>Halaman Tampil</h1>
        </div>
    </section>
    <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Konten Proyek Start -->
    <section class="page">
        <!-- Konten Proyek Start -->
        <!-- Title Proyek Start -->
        <div class="judul">
            <h1><?php echo $row['title_project']; ?></h1>
        </div>
        <!-- Title Proyek End -->

        <!-- Content Show Start -->
        <div class="ct">
            <div class="ct-img">
                <img src="/thinkit/backstage/view/projects/images/<?php echo $row['images_projects'] ?>" alt="<?php echo $row['title_project']; ?>" />
            </div>

            <div class="ct-main">
                <h1>Deskripsi</h1>

                <!-- Deskripsi Content Start -->
                <table>
                    <tr>
                        <th>Nama Klien</th>
                        <td class="titik">:</td>
                        <td><?php echo $row['client_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Perusahaan Klien</th>
                        <td class="titik">:</td>
                        <td><?php echo $row['client_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Proyek Dimulai</th>
                        <td class="titik">:</td>
                        <td><?php echo ProjectDate($row['tanggal_projects_start']) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Proyek Selesai</th>
                        <td class="titik">:</td>
                        <td><?php echo ProjectDate($row['tanggal_projects_end']) ?></td>
                    </tr>
                </table>
                <!-- Deskripsi Content End -->
            </div>
        </div>
        <!-- Content Show End -->
        <!-- Konten Proyek End -->
    </section>
    <!-- Konten Proyek End -->

    <!-- Info Start -->
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="/thinkit/plugin/js/scr.js"></script>
</body>

</html>
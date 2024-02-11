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
    <link rel="stylesheet" href="plugin/css/apps.css">
    <link rel="stylesheet" href="plugin/css/Artikel.css">
    <link rel="stylesheet" href="plugin/css/Bisnis.css">
    <link rel="stylesheet" href="plugin/css/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/Footers.css">
    <link rel="stylesheet" href="plugin/css/Navbar.css">
    <link rel="stylesheet" href="plugin/css/Pro.css">
    <link rel="stylesheet" href="plugin/css/ttg.css">

    <!-- Custom fonts for this template-->
    <link href="../../backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo $_ENV['ROUTE']; ?>backstage/img/favicon/favicon.ico" sizes="16x16">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="plugin/css/responsive/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="plugin/css/responsive/Navbars.css">
    <link rel="stylesheet" href="plugin/css/responsive/Tentang.css">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">

    <title>Halaman Tentang Kami</title>
</head>

<body>
    <!-- Header Start -->
    <?php navbarComponent(); ?>

    <!-- Jumbotron Start -->
    <section class="jb-proyek">
        <div class="jb-konten-proyek">
            <h1>HALAMAN TENTANG KAMI</h1>
        </div>
    </section>
    <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Konten Section Start -->
    <!-- Button Galeri Start -->
    <section class="btn-gallery">
        <a href="/galeri">GALERI <i class="bi-chevron-double-right"></i></a>
    </section>
    <!-- Button Galeri End -->

    <!-- Tentang Kami Section Start -->
    <section class="about">
        <div class="about-img">
            <img src="plugin/img/about.jpg" alt="">
        </div>

        <div class="about-main">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum iste atque sapiente reprehenderit, sequi quas pariatur unde doloribus enim harum delectus deserunt fugiat vel, minima dolores quam molestiae aperiam ullam voluptate tempore rerum saepe. Mollitia nulla accusantium impedit voluptas libero incidunt sunt quam vero voluptatem illo dolores ab ipsa quos blanditiis, maiores voluptatibus commodi dolore velit. Aperiam excepturi quisquam facilis iusto odio suscipit ratione libero assumenda fugit ea cupiditate, deleniti ipsam blanditiis aspernatur laboriosam quam dolore asperiores vero quas ipsa vitae eius? Recusandae, totam impedit. Consequatur accusamus recusandae veniam eaque voluptas officia dignissimos laudantium repellendus minus incidunt quasi, ex quis nisi necessitatibus vero suscipit tenetur reprehenderit similique odit quisquam fuga, assumenda magnam aut corporis. Sapiente perspiciatis doloribus incidunt voluptatum eos enim excepturi doloremque nobis asperiores necessitatibus quod nam, suscipit, ipsum tempora similique libero soluta repellat facilis ex repellendus? Dolor nulla aliquid hic dignissimos, natus quibusdam sequi voluptatem totam impedit dicta eveniet, tempora veritatis provident sunt numquam. Illo doloribus veniam cum saepe, excepturi ipsa nemo soluta sint alias tenetur natus quaerat voluptatum consequatur unde aliquam recusandae laborum ex, nam ad necessitatibus aperiam. Quam repellat porro dignissimos corporis pariatur assumenda atque dolores ipsum fugiat inventore, architecto ut voluptates optio velit rerum, quo corrupti consequuntur dolorem, praesentium laborum? Unde aut commodi deleniti voluptate magni voluptas asperiores iusto, quae tempora provident rerum praesentium vitae sint deserunt doloremque? Harum porro nihil excepturi ipsum molestiae vitae tempora, quidem odit dolores atque laborum ut iusto obcaecati quo tenetur laudantium veniam nesciunt repellendus quaerat sit doloribus eaque repudiandae eligendi! Impedit dolor dolore voluptatem provident doloremque, neque reiciendis necessitatibus quod est alias sit nemo repellat explicabo minus temporibus nobis nihil harum ipsa exercitationem asperiores! Quos amet soluta quam sint vitae excepturi odit ipsum asperiores itaque nulla enim a provident accusamus, porro laborum commodi illo nihil nisi quia. Corporis, accusantium.</p>
        </div>
    </section>
    <!-- Tentang Kami Section End -->

    <!-- Visi Misi Start -->
    <section class="vm">
        <div class="ct">
            <div class="main">
                <h1 class="visi">Visi</h1>
                <p>Menjadi perusahaan jasa konstruksi terdapat dalam kualitas di pasar nasional dan internasional.</p>
            </div>

            <div class="icon">
                <div class="logo">
                    <i class="bi-sun"></i>
                </div>
            </div>
        </div>

        <div class="ct">
            <div class="icon">
                <div class="logo">
                    <i class="bi-moon"></i>
                </div>
            </div>

            <div class="main">
                <h1 class="misi">Misi</h1>
                <ul>
                    <li>- Menciptakan lapangan pekerjaan bagi masyarakat</li>
                    <li>- Memiliki pemikiran luas yang diserahkan ke seluruh jajaran karyawan</li>
                    <li>- Menghasilkan tenaga kerja yang handal dan berkualitas</li>
                    <li>- Cepat merespon terhadap kebutuhan pasar</li>
                    <li>- Membuat keputusan dengan cepat</li>
                    <li>- Menerapkan sistem penghargaan dan apresiasi kerja</li>
                    <li>- Mendukung pengembangan karyawan</li>
                    <li>- Memelihara kesejahteraan dengan meminimalkan kecelakaan kerja</li>
                    <li>- Mengedepankan kepuasan pelanggan</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Visi Misi End -->

    <!-- Struktur Start -->
    <section class="page">
        <div class="judul">
            <h1>STRUKTUR ORGANISASI</h1>
        </div>

        <div class="str-img">
            <img src="plugin/img/struktur-organisasi.png" alt="Struktur Organisasi">
        </div>
    </section>
    <!-- Struktur End -->
    <!-- Konten Section End -->

    <!-- Info Start -->
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="plugin/js/scr.js"></script>
</body>

</html>
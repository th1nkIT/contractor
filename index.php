<?php
require 'backstage/config/koneksi.php';
require 'components/footer.php';
require 'components/info.php';
require 'components/navbar.php';

// Settings
$stmt_settings = $koneksi->prepare("SELECT * FROM settings");
$stmt_settings->execute();
$settings = $stmt_settings->get_result();
$stmt_settings->close();

// Article Terbaru
$stmt_articles = $koneksi->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 4");
$stmt_articles->execute();
$articles = $stmt_articles->get_result();
$stmt_articles->close();

// Client Terbaru
$stmt_clients = $koneksi->prepare("SELECT * FROM client ORDER BY id DESC");
$stmt_clients->execute();
$clients = $stmt_clients->get_result();
$stmt_clients->close();

// Bisnis Terbaru
$stmt_category = $koneksi->prepare("SELECT * FROM category ORDER BY id DESC");
$stmt_category->execute();
$categorys = $stmt_category->get_result();
$stmt_category->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom fonts for this template-->
    <link href="/thinkit/backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- My CSS -->
    <link rel="stylesheet" href="plugin/css/App.css">
    <link rel="stylesheet" href="plugin/css/Artikel.css">
    <link rel="stylesheet" href="plugin/css/Bisnis.css">
    <link rel="stylesheet" href="plugin/css/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/footer.css">
    <link rel="stylesheet" href="plugin/css/nv.css">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="plugin/css/responsive/navbar.css">
    <link rel="stylesheet" href="plugin/css/responsive/Dashboards.css">
    <link rel="stylesheet" href="plugin/css/responsive/footer.css">

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
    <?php navbarComponent(); ?>

    <!-- Jumbotron Start -->
    <section class="jb">
        <div class="jb-konten">
            <div class="jb-kiri">
                <button type="button" id="kiri" onclick="kiri()"><i class="bi-arrow-left-circle"></i></button>
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
                <button type="button" id="kanan" onclick="kanan()"><i class="bi-arrow-right-circle"></i></button>
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
                    <span><i class="bi-person-lines-fill"></i></span>
                    <div class="isi-alasan">
                        <h1>Kami Berpengalaman Lebih Dari 10 Tahun</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                    </div>
                </div>

                <div class="main-alasan">
                    <span><i class="bi-award-fill"></i></span>
                    <div class="isi-alasan">
                        <h1>Mempunyai Tim yang Solid & Berpengalaman</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                    </div>
                </div>

                <div class="main-alasan">
                    <span><i class="bi-bar-chart-line-fill"></i></span>
                    <div class="isi-alasan">
                        <h1>Berinovasi</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam ducimus velit veritatis odio id recusandae fugiat officia impedit nemo officiis!</p>
                    </div>
                </div>

                <div class="main-alasan">
                    <span><i class="bi-bar-chart-steps"></i></span>
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
    <div class="page">
        <!-- Title Bisnis Start -->
        <div class="judul">
            <h1>BISNIS KAMI</h1>
            <p>Berikut adalah bidang layanan yang kami kerjakan</p>
        </div>
        <!-- Title Bisnis End -->

        <!-- Card Start -->
        <div class="artikel-konten">
            <div class="wraps">
                <!-- Title Page Start -->
                <div class="title-page">
                    <div>
                        <h1>Bisnis</h1>
                        <a href="pages/bisnis/bisnis.php">Arsip <i class="bi-chevron-right"></i></a>
                    </div>
                </div>
                <!-- Title Page End -->

                <!-- Content Start -->
                <div class="content">
                    <?php while ($category = $categorys->fetch_assoc()) : ?>
                        <div class="cards-img">
                            <img height="350px" src="backstage/view/category/images/<?php echo $category['images_category'] ?>" alt="<?php echo $category['nama_category'] ?>" />
                        </div>

                        <div class="cards-content">
                            <h1 class="ttl"><?php echo $category['nama_category'] ?></h1>
                            <p class='isi-artikel'><?php echo $category['deskripsi_category'] ?></p>
                            <div class="cards-button">
                                <a href="#">Selengkapnya <i class="bi-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- Content End -->
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
                <img src="plugin/img/bingung.png" alt="">
            </div>
            <!-- Image Pertanyaan End -->

            <!-- Pertanyaan Start -->
            <div class="pertanyaan-konten">
                <!-- Pertanyaan -->
                <div class="question">
                    <div class="pertanyaannya">
                        <h1>Apa itu PT. Naviri Multi Konstruksi?</h1>
                        <button id="jawab" type='button'><i class="bi-three-dots"></i></button>
                    </div>

                    <div class="jawaban none">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste architecto eaque tempore voluptatibus exercitationem esse doloremque! Molestias alias at sapiente nobis maxime sed sequi cumque.</p>
                    </div>
                </div>
                <!-- Pertanyaan -->

                <!-- Pertanyaan -->
                <div class="question">
                    <div class="pertanyaannya">
                        <h1>Berpengalaman dan mencapai keberhasilan bidang apa?</h1>
                        <button id="jawab2" type='button'><i class="bi-three-dots"></i></button>
                    </div>

                    <div class="jawaban2 none">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi optio iste quidem quis quaerat. Laudantium ullam voluptatum vero ut! Perspiciatis ipsam voluptatibus repellendus nemo voluptate.</p>
                    </div>
                </div>
                <!-- Pertanyaan -->

                <!-- Pertanyaan -->
                <div class="question">
                    <div class="pertanyaannya">
                        <h1>Sudah berapa banyak konstruksi yang dibangun?</h1>
                        <button id="jawab3" type='button'><i class="bi-three-dots"></i></button>
                    </div>

                    <div class="jawaban3 none">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci soluta incidunt eaque, rerum odio porro accusamus quod! Temporibus, deserunt accusamus possimus mollitia ea eligendi quod?</p>
                    </div>
                </div>
                <!-- Pertanyaan -->

                <!-- Pertanyaan -->
                <div class="question">
                    <div class="pertanyaannya">
                        <h1>Peralatan apa yang digunakan?</h1>
                        <button id="jawab4" type='button'><i class="bi-three-dots"></i></button>
                    </div>

                    <div class="jawaban4 none">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus cumque minima, similique esse animi atque exercitationem ea delectus ipsa a, incidunt consectetur molestiae provident maiores.</p>
                    </div>
                </div>
                <!-- Pertanyaan -->

                <!-- Pertanyaan -->
                <div class="question">
                    <div class="pertanyaannya">
                        <h1>Apakah PT. Naviri Multi Konstruksi sudah bersertifikat internasional?</h1>
                        <button id="jawab5" type='button'><i class="bi-three-dots"></i></button>
                    </div>

                    <div class="jawaban5 none">
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
    <section class="page">
        <!-- Title Artikel Start -->
        <div class="judul">
            <h1>ARTIKEL TERBARU</h1>
            <p>Berisi berita informasi dan event yang ada di perusahaan kami</p>
        </div>
        <!-- Title Artikel End -->

        <!-- Konten Artikel Start -->
        <div class="artikel-konten">
            <div class="wraps">
                <!-- Title Page Start -->
                <div class="title-page">
                    <div>
                        <h1>Artikel</h1>
                        <a href="pages/artikel/artikel.php">Arsip <i class="bi-chevron-right"></i></a>
                    </div>
                </div>
                <!-- Title Page End -->

                <!-- Content Start -->
                <div class="cont">
                    <?php while ($article = $articles->fetch_assoc()) : ?>
                        <div class="content">
                            <div class="cards-img">
                                <img height="350px" src="backstage/view/articles/images/<?php echo $article['images_article']; ?>" alt="<?php echo $article['title_article']; ?>" />
                            </div>

                            <div class="cards-content">
                                <div class="cards-title">
                                    <h1>Admin</h1>
                                    <p class="date"><?php echo date('d-m-Y', strtotime($article['created_at'])); ?></p>
                                </div>
                                <h1 class="ttl"><?php echo $article['title_article']; ?></h1>
                                <p class='isi-artikel'>
                                    <?php
                                    // Memotong isi_article menjadi maksimal 100 kata
                                    $deskripsi_article = $article['deskripsi_article'];
                                    $words = explode(" ", $deskripsi_article);
                                    $trimmed_content = implode(" ", array_slice($words, 0, 5));
                                    echo $trimmed_content . (count($words) > 5 ? "..." : "");
                                    ?>
                                </p>
                                <div class="cards-button">
                                    <a href="#">Selengkapnya <i class="bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- Content End -->
            </div>
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
                <?php while ($client = $clients->fetch_assoc()) : ?>
                    <img src="backstage/view/client/images/<?php echo $client['client_images']; ?>" alt="<?php echo $client['client_name']; ?>" />
                <?php endwhile; ?>
            </div>
        </div>
        <!-- Konten Client End -->
    </section>
    <!-- Client Kami End -->

    <?php infoComponents(); ?>

    <?php footerComponent(); ?>

    <script src="/thinkit/plugin/js/scr.js"></script>
</body>

</html>
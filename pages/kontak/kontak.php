<?php
require '../../backstage/config/koneksi.php';
require '../../components/navbar.php';
require  '../../components/footer.php';
require  '../../components/info.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['send_email'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $_ENV['MAIL_PORT'];

    $mail->Username = $_ENV['MAIL_USERNAME'];
    $mail->Password = $_ENV['MAIL_PASSWORD'];

    $mail->setFrom($email, $name);
    $mail->addAddress($_ENV['MAIL_USERNAME'], "Yuri Borneo");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
}

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
    <link rel="stylesheet" href="plugin/css/Kontak.css">
    <link rel="stylesheet" href="plugin/css/Navbar.css">
    <link rel="stylesheet" href="plugin/css/Pro.css">

    <!-- Custom fonts for this template-->
    <link href="../../backstage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo $_ENV['ROUTE']; ?>backstage/img/favicon/favicon.ico" sizes="16x16">

    <!-- Query Media CSS -->
    <link rel="stylesheet" href="plugin/css/responsive/Dashboard.css">
    <link rel="stylesheet" href="plugin/css/responsive/footer.css">
    <link rel="stylesheet" href="plugin/css/responsive/Navbars.css">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,500;1,600;1,800&display=swap" rel="stylesheet">

    <title>Halaman Kontak</title>
</head>

<body>
    <!-- Header Start -->
    <?php navbarComponent(); ?>

    <!-- Jumbotron Start -->
    <section class="jb-proyek">
        <div class="jb-konten-proyek">
            <h1>KONTAK</h1>
        </div>
    </section>
    <!-- Jumbotron End -->
    <!-- Header End -->

    <!-- Content Kontak Start -->
    <section class="kontak">
        <!-- Title Proyek Start -->
        <div class="judul">
            <h1>HUBUNGI KAMI</h1>
        </div>
        <!-- Title Proyek End -->

        <!-- Kontak Start -->
        <div class="icon">
            <a href="#"><i class="bi-whatsapp"></i></a>
            <a href="#"><i class="bi-instagram"></i></a>
            <a href="#"><i class="bi-envelope"></i></a>
            <a href="#"><i class="bi-facebook"></i></a>
            <a href="#"><i class="bi-twitter-x"></i></a>
        </div>

        <div class="judul">
            <h1>Contact Form</h1>
        </div>

        <form method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="email">email</label>
            <input type="email" name="email" id="email" required>

            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required>

            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>
            <br>
            <button name="send_email">Send</button>
        </form>

        <div class="judul">
            <h1>MAPS LOKASI</h1>
        </div>

        <div class="kontak-maps">
            <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=bandung%20kota&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
        <!-- Kontak End -->
    </section>
    <!-- Content Kontak End -->

    <!-- Info Start -->
    <?php infoComponents(); ?>
    <!-- Info End -->

    <!-- Footer Start -->
    <?php footerComponent(); ?>
    <!-- Footer End -->

    <script src="plugin/js/scr.js"></script>
</body>

</html>
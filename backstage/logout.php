<?php
    if (!isset($_SESSION['administrator'])) {
        header('location:login.php');
        exit();
    }
    // Menjalankan session dan menghancurkan session.
    session_destroy();
    echo "<div class='alert alert-info'>Logout Berhasil</div>";
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
?>
<?php
$ambil = $koneksi->query("SELECT * FROM articles WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['images_article'];
if (file_exists("view/articles/images/$foto")) {
    unlink("view/articles/images/$foto");
}

$koneksi->query("DELETE FROM articles WHERE id='$_GET[id]'");
echo "<div class='alert alert-info'>Data Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=articles'>";
?>
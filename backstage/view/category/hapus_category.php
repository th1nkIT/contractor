<?php
$ambil = $koneksi->query("SELECT * FROM category WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['images_category'];
if (file_exists("assets/images/category/$foto")) {
    unlink("assets/images/category/$foto");
}

$koneksi->query("DELETE FROM category WHERE id='$_GET[id]'");
echo "<div class='alert alert-info'>Data Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=category'>";

?>
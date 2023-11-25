<?php
$ambil = $koneksi->query("SELECT * FROM projects WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['images_projects'];
if (file_exists("view/projects/images/$foto")) {
    unlink("view/projects/images/$foto");
}

$koneksi->query("DELETE FROM projects WHERE id='$_GET[id]'");
echo "<div class='alert alert-info'>Data Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=projects'>";
?>
<?php
$id_category = $_GET['id'];

 // Validasi ID
if (!isValidUuid($id_category)) {
    echo "<div class='alert alert-danger'>ID Category tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
    exit();
}

// Retrieve category data
$stmt = $koneksi->prepare("SELECT images_category FROM category WHERE uuid = ?");
$stmt->bind_param("i", $id_category);
$stmt->execute();
$stmt->bind_result($foto);
$stmt->fetch();
$stmt->close();

// Check if file exists before attempting to unlink
if ($foto && file_exists("assets/images/category/$foto")) {
    unlink("assets/images/category/$foto");
}

// Delete category data from the database
$stmt = $koneksi->prepare("DELETE FROM category WHERE uuid = ?");
$stmt->bind_param("i", $id_category);

if ($stmt->execute()) {
    echo "<div class='alert alert-info'>Data Terhapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=category'>";
} else {
    echo "<div class='alert alert-danger'>Gagal menghapus data kategori</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
}

$stmt->close();
?>
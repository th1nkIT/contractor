<?php
$id_user = $_GET['id'];

if (!isValidUuid($id_user)) {
    echo "<div class='alert alert-danger'>ID Project tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
    exit();
}

// Retrieve project data
$stmt = $koneksi->prepare("SELECT images_user FROM user WHERE uuid = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$stmt->bind_result($foto);
$stmt->fetch();
$stmt->close();

// Check if file exists before attempting to unlink
if ($foto && file_exists("view/profile/images/$foto")) {
    unlink("view/profile/images/$foto");
}

// Delete project data from the database
$stmt = $koneksi->prepare("DELETE FROM user WHERE uuid = ?");
$stmt->bind_param("i", $id_user);

if ($stmt->execute()) {
    echo "<div class='alert alert-info'>Data Terhapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=user'>";
} else {
    echo "<div class='alert alert-danger'>Gagal menghapus data proyek</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=user'>";
}

$stmt->close();

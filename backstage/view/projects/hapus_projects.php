<?php
$id_project = $_GET['id'];

// Retrieve project data
$stmt = $koneksi->prepare("SELECT images_projects FROM projects WHERE id = ?");
$stmt->bind_param("i", $id_project);
$stmt->execute();
$stmt->bind_result($foto);
$stmt->fetch();
$stmt->close();

// Check if file exists before attempting to unlink
if ($foto && file_exists("view/projects/images/$foto")) {
    unlink("view/projects/images/$foto");
}

// Delete project data from the database
$stmt = $koneksi->prepare("DELETE FROM projects WHERE id = ?");
$stmt->bind_param("i", $id_project);

if ($stmt->execute()) {
    echo "<div class='alert alert-info'>Data Terhapus</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=projects'>";
} else {
    echo "<div class='alert alert-danger'>Gagal menghapus data proyek</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=projects'>";
}

$stmt->close();
?>

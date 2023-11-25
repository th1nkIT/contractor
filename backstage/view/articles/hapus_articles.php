<?php
if (isset($_GET['id'])) {
    $id_article = $_GET['id'];

    // Ambil nama file gambar sebelum menghapus artikel
    $stmt = $koneksi->prepare("SELECT images_article FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id_article);
    $stmt->execute();
    $stmt->bind_result($foto);
    $stmt->fetch();
    $stmt->close();

    // Hapus gambar jika ada
    if ($foto && file_exists("view/articles/images/$foto")) {
        unlink("view/articles/images/$foto");
    }

    // Hapus artikel dari database
    $stmt = $koneksi->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id_article);

    if ($stmt->execute()) {
        echo "<div class='alert alert-info'>Data Terhapus</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=articles'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data artikel</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=articles'>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>ID Artikel tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=articles'>";
}
?>

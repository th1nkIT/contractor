<?php
if (isset($_GET['id'])) {
    $id_article = $_GET['id'];

    // Validasi ID
    if (!isValidUuid($id_article)) {
        showAlert("error", "ID Artikel tidak valid", "", "index.php?halaman=articles");
        exit();
    }

    // Ambil nama file gambar sebelum menghapus artikel
    $stmt = $koneksi->prepare("SELECT images_article FROM articles WHERE uuid = ?");
    $stmt->bind_param("s", $id_article);
    $stmt->execute();
    $stmt->bind_result($foto);
    $stmt->fetch();
    $stmt->close();

    // Hapus gambar jika ada
    if ($foto && file_exists("view/articles/images/$foto")) {
        unlink("view/articles/images/$foto");
    }

    // Hapus artikel dari database
    $stmt = $koneksi->prepare("DELETE FROM articles WHERE uuid = ?");
    $stmt->bind_param("s", $id_article);

    if ($stmt->execute()) {
        showAlert("success", "Berhasil menghapus data artikel", "", "index.php?halaman=articles");
        exit();
    } else {
        showAlert("error", "Gagal menghapus data artikel", "", "index.php?halaman=articles");
        exit();
    }

    $stmt->close();
} else {
    showAlert("error", "ID Artikel tidak ditemukan", "", "index.php?halaman=articles");
    exit();
}

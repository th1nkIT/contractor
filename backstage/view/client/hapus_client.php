<?php
if (isset($_GET['id'])) {
    $id_client = $_GET['id'];

    // Validasi ID
    if (!isValidUuid($id_client)) {
        echo "<div class='alert alert-danger'>ID Client tidak valid</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=client'>";
        exit();
    }

    // Ambil nama file gambar sebelum menghapus client
    $stmt = $koneksi->prepare("SELECT client_images FROM client WHERE uuid = ?");
    $stmt->bind_param("s", $id_client);
    $stmt->execute();
    $stmt->bind_result($foto);
    $stmt->fetch();
    $stmt->close();

    // Hapus gambar jika ada
    if ($foto && file_exists("view/client/images/$foto")) {
        unlink("view/client/images/$foto");
    }

    // Hapus client dari database
    $stmt = $koneksi->prepare("DELETE FROM client WHERE uuid = ?");
    $stmt->bind_param("s", $id_client);

    if ($stmt->execute()) {
        echo "<div class='alert alert-info'>Data Terhapus</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=client'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data client</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=client'>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>ID Client tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=client'>";
}

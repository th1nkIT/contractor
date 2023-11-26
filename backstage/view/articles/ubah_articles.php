<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Validasi ID
if (!is_numeric($id) || $id <= 0) {
    echo "<div class='alert alert-danger'>ID Artikel tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=articles'>";
    exit();
}

// Gunakan prepared statement untuk mengambil data artikel
$stmt = $koneksi->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Periksa apakah artikel ditemukan
if ($result->num_rows > 0) {
    $pecah = $result->fetch_assoc();
    // Lakukan operasi dengan data artikel yang ditemukan
} else {
    echo "<div class='alert alert-danger'>Artikel tidak ditemukan</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=articles'>";
    exit();
}
?>

<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">
                <h2>Edit Data Article</h2>
                </p>
                <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Title Article</label>
                        <input class="form-control" type="text" name="title_article" value="<?php echo $pecah['title_article']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Deskripsi Article</label>
                        <input class="form-control" type="text" name="deskripsi_article" value="<?php echo $pecah['deskripsi_article']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Isi Article</label>
                        <input class="form-control" type="text" name="isi_article" value="<?php echo $pecah['isi_article']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Article</label>
                            <input class="form-control" type="file" name="foto_article">
                            <img src="view/articles/images/<?php echo $pecah['images_article']; ?>" alt="<?php echo $pecah['title_article'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
</div>
<?php
if (isset($_POST['simpan'])) {
    $id_article = $_POST['id'];
    $nama_article = $_FILES['foto_article']['name'];
    $lokasi_article = $_FILES['foto_article']['tmp_name'];

    // Jika foto diubah
    if (!empty($lokasi_article)) {
        $allowed = array('jpeg', 'jpg', 'png');
        $ext = pathinfo($nama_article, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_article&id=$id_article'>";
            exit();
        }

        // Hapus foto lama
        $stmt = $koneksi->prepare("SELECT images_article FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id_article);
        $stmt->execute();
        $stmt->bind_result($foto_lama);
        $stmt->fetch();
        $stmt->close();

        if ($foto_lama && file_exists("view/articles/images/$foto_lama")) {
            unlink("view/articles/images/$foto_lama");
        }

        // Pindahkan foto baru dengan nama unik
        $timestamp = time();
        $nama_article = $timestamp . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($lokasi_article, "view/articles/images/$nama_article");

        // Update data artikel dengan foto baru
        $stmt = $koneksi->prepare("UPDATE articles SET title_article=?, deskripsi_article=?, isi_article=?, images_article=? WHERE id=?");
        $stmt->bind_param("ssssi", $_POST['title_article'], $_POST['deskripsi_article'], $_POST['isi_article'], $nama_article, $id_article);
    } else {
        // Update data artikel tanpa mengubah foto
        $stmt = $koneksi->prepare("UPDATE articles SET title_article=?, deskripsi_article=?, isi_article=? WHERE id=?");
        $stmt->bind_param("sssi", $_POST['title_article'], $_POST['deskripsi_article'], $_POST['isi_article'], $id_article);
    }

    if ($stmt->execute()) {
        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=articles'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data artikel</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_article&id=$id_article'>";
    }

    $stmt->close();
}
?>


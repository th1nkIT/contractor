<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Validasi ID
if (!isValidUuid($id)) {
    echo "<div class='alert alert-danger'>ID Category tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
    exit();
}

// Gunakan prepared statement untuk mengambil data kategori
$stmt = $koneksi->prepare("SELECT * FROM category WHERE uuid = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Periksa apakah kategori ditemukan
if ($result->num_rows > 0) {
    $pecah = $result->fetch_assoc();
    // Lakukan operasi dengan data kategori yang ditemukan
} else {
    echo "<div class='alert alert-danger'>Kategori tidak ditemukan</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
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
                <h2>Edit Data Category</h2>
                </p>
                <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Category</label>
                        <input class="form-control" type="text" name="nama_category" value="<?php echo $pecah['nama_category']; ?>" required>
                    </div>
                </div>
                <label for="example-text-input" class="form-control-label">Deskripsi Category</label>
                <textarea name="deskripsi_category" id="deskripsi_category">
                    <?php echo $pecah['deskripsi_category']; ?>
                </textarea>
                <label for="example-text-input" class="form-control-label">Summary Category</label>
                <textarea name="summary_category" id="summary_category">
                    <?php echo $pecah['summary_category']; ?>
                </textarea>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Category</label>
                            <input class="form-control" type="file" name="foto_category">
                            <img src="view/category/images/<?php echo $pecah['images_category']; ?>" alt="<?php echo $pecah['nama_category'] ?>">
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
    $id_category = $_GET['id'];
    $nama_category = $_POST['nama_category'];
    $deskripsi_category = $_POST['deskripsi_category'];
    $summary_category = $_POST['summary_category'];
    $foto_category = $_FILES['foto_category']['name'];
    $lokasi_category = $_FILES['foto_category']['tmp_name'];

    // Jika foto diubah
    if (!empty($lokasi_category)) {
        $allowed = array('jpeg', 'jpg', 'png');
        $ext = pathinfo($foto_category, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_category&id=$id_category'>";
            exit();
        }

        // Hapus foto lama
        $stmt = $koneksi->prepare("SELECT images_category FROM category WHERE uuid = ?");
        $stmt->bind_param("i", $id_category);
        $stmt->execute();
        $stmt->bind_result($foto_lama);
        $stmt->fetch();
        $stmt->close();

        if ($foto_lama && file_exists("view/category/images/$foto_lama")) {
            unlink("view/category/images/$foto_lama");
        }

        // Pindahkan foto baru dengan nama unik
        $timestamp = time();
        $foto_category = $timestamp . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($lokasi_category, "view/category/images/$foto_category");

        // Update data kategori dengan foto baru
        $stmt = $koneksi->prepare("UPDATE category SET nama_category=?, deskripsi_category=?, summary_category=?, images_category=? WHERE uuid=?");
        $stmt->bind_param("sssss", $nama_category, $deskripsi_category, $summary_category, $foto_category, $id_category);
    } else {
        // Update data kategori tanpa mengubah foto
        $stmt = $koneksi->prepare("UPDATE category SET nama_category=?, deskripsi_category=?, summary_category=? WHERE uuid=?");
        $stmt->bind_param("ssss", $nama_category, $deskripsi_category, $summary_category, $id_category);
    }

    if ($stmt->execute()) {
        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data kategori</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_category&id=$id_category'>";
    }

    $stmt->close();
}
?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Validasi ID
if (!isValidUuid($id)) {
    echo "<div class='alert alert-danger'>ID Client tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=client'>";
    exit();
}

// Gunakan prepared statement untuk mengambil data client
$stmt = $koneksi->prepare("SELECT * FROM client WHERE uuid = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Periksa apakah client ditemukan
if ($result->num_rows > 0) {
    $pecah = $result->fetch_assoc();
    // Lakukan operasi dengan data client yang ditemukan
} else {
    echo "<div class='alert alert-danger'>Client tidak ditemukan</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=client'>";
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
                            <h2>Edit Data Client</h2>
                            </p>
                            <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Name</label>
                                    <input class="form-control" type="text" name="client_name" value="<?php echo $pecah['client_name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Email</label>
                                    <input class="form-control" type="email" name="client_email" value="<?php echo $pecah['client_email']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Phone</label>
                                    <input class="form-control" type="text" name="client_phone" value="<?php echo $pecah['client_phone']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Address</label>
                                    <input class="form-control" type="text" name="client_address" value="<?php echo $pecah['client_address']; ?>" required>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Client Image</label>
                                        <input class="form-control" type="file" name="client_image">
                                        <img src="view/client/images/<?php echo $pecah['client_images']; ?>" alt="<?php echo $pecah['client_name'] ?>">
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
    $id_client = $_GET['id'];
    $nama_foto_client = $_FILES['client_image']['name'];
    $lokasi_foto_client = $_FILES['client_image']['tmp_name'];

    // Jika foto diubah
    if (!empty($lokasi_foto_client)) {
        $allowed = array('jpeg', 'jpg', 'png');
        $ext = pathinfo($nama_foto_client, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=update_client&id=$id_client'>";
            exit();
        }

        if (empty($_POST['client_name']) && empty($_POST['client_email']) && empty($_POST['client_phone']) && empty($_POST['client_address'])) {
            echo "<div class='alert alert-danger'>Data Client tidak boleh kosong</div>";
        }

        // Hapus foto lama
        $stmt = $koneksi->prepare("SELECT client_images FROM client WHERE uuid = ?");
        $stmt->bind_param("i", $id_client);
        $stmt->execute();
        $stmt->bind_result($foto_lama);
        $stmt->fetch();
        $stmt->close();

        if ($foto_lama && file_exists("view/client/images/$foto_lama")) {
            unlink("view/client/images/$foto_lama");
        }

        // Pindahkan foto baru dengan nama unik
        $timestamp = time();
        $nama_foto_client = $timestamp . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($lokasi_foto_client, "view/client/images/$nama_foto_client");

        // Update data client dengan foto baru
        $stmt = $koneksi->prepare("UPDATE client SET client_name=?, client_email=?, client_phone=?, client_address=?, client_images=? WHERE uuid=?");
        $stmt->bind_param("ssssss", $_POST['client_name'], $_POST['client_email'], $_POST['client_phone'], $_POST['client_address'], $nama_foto_client, $id_client);
    } else {
        // Update data client tanpa mengubah foto
        $stmt = $koneksi->prepare("UPDATE client SET client_name=?, client_email=?, client_phone=?, client_address=? WHERE uuid=?");
        $stmt->bind_param("sssss", $_POST['client_name'], $_POST['client_email'], $_POST['client_phone'], $_POST['client_address'], $id_client);
    }

    if ($stmt->execute()) {
        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=client'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data client</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=update_client&id=$id_client'>";
    }

    $stmt->close();
}
?>
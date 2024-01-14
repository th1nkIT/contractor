<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">
                            <h2>Tambah Data Category</h2>
                            </p>
                            <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Category</label>
                                    <input class="form-control" type="text" name="nama_category" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Deskripsi Category</label>
                                    <input class="form-control" type="text" name="deskripsi_category" required>
                                </div>
                            </div>
                            <label for="example-text-input" class="form-control-label">Deskripsi Category</label>
                            <textarea name="deskripsi_category" id="deskripsi_category">
                    Isi Deskripsi Category Anda di sini....
                </textarea>
                            <label for="example-text-input" class="form-control-label">Summary Category</label>
                            <textarea name="summary_category" id="summary_category">
                    Isi Summary Category Anda di sini....
                </textarea>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Foto Category</label>
                                        <input class="form-control" type="file" name="foto_category" required>
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
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['simpan'])) {
    // Check if file is not jpeg, jpg, or png
    $allowed = array('jpeg', 'jpg', 'png');
    $filename = $_FILES['foto_category']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        showAlert("error", "Foto harus berformat jpeg, jpg, atau png", "", "/thinkit/backstage/category/add");
        exit();
    }

    // Check if the file is uploaded
    if (empty($_FILES['foto_category']['name'])) {
        showAlert("error", "Foto tidak boleh kosong", "", "/thinkit/backstage/category/add");
        exit();
    }

    // Handle file upload
    $original_name = $_FILES['foto_category']['name'];
    $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    $timestamp = time();
    $nama = $timestamp . '_' . uniqid() . '.' . $ext;

    $lokasi = $_FILES['foto_category']['tmp_name'];
    $upload_directory = "view/category/images/";

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
        // Insert category data into the database
        $nama_category = $_POST['nama_category'];
        $deskripsi_category = $_POST['deskripsi_category'];
        $summary_category = $_POST['summary_category'];
        $guid = generateUuid();

        // make slug from utils
        $slug = createSlug($nama_category);

        $stmt = $koneksi->prepare("INSERT INTO category (uuid, slug, nama_category, deskripsi_category, summary_category, images_category) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $guid, $slug, $nama_category, $deskripsi_category, $summary_category, $nama);

        if ($stmt->execute()) {
            showAlert("success", "Data Tersimpan", "", "/thinkit/backstage/category");
            exit();
        } else {
            showAlert("error", "Gagal menyimpan data kategori", "", "/thinkit/backstage/category/add");
            exit();
        }

        $stmt->close();
    } else {
        showAlert("error", "Gagal mengupload file", "", "/thinkit/backstage/category/add");
        exit();
    }
}
?>
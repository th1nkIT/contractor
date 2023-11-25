<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">
                <h2>Tambah Data Article</h2>
                </p>
                <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Title Article</label>
                        <input class="form-control" type="text" name="title_article" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Deskripsi Article</label>
                        <input class="form-control" type="text" name="deskripsi_article" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Isi Article</label>
                        <input class="form-control" type="text" name="isi_article" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Article</label>
                            <input class="form-control" type="file" name="foto_article" required>
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
    $filename = $_FILES['foto_article']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_articles'>";
        exit();
    }

    // Check if the file is uploaded
    if (empty($_FILES['foto_article']['name'])) {
        echo "<div class='alert alert-danger'>Foto tidak boleh kosong</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_articles'>";
        exit();
    }

    // Handle file upload
    $nama = $_FILES['foto_article']['name'];
    $lokasi = $_FILES['foto_article']['tmp_name'];
    $upload_directory = "view/articles/images/";

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
        // Insert article data into the database
        $title_article = $_POST['title_article'];
        $deskripsi_article = $_POST['deskripsi_article'];
        $isi_article = $_POST['isi_article'];

        $stmt = $koneksi->prepare("INSERT INTO articles (title_article, deskripsi_article, isi_article, images_article) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title_article, $deskripsi_article, $isi_article, $nama);

        if ($stmt->execute()) {
            echo "<div class='alert alert-info'>Data Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=articles'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data artikel</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_articles'>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupload file</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_articles'>";
    }
}
?>

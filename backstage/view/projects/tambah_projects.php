<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">
                            <h2>Tambah Data Projects</h2>
                            </p>
                            <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Title Project</label>
                                    <input class="form-control" type="text" name="title_project" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Description Project</label>
                                    <input class="form-control" type="text" name="description_project" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client</label>
                                    <select name="nama_client" class="form-control" required>
                                        <option value="0">--Pilih Client--</option>
                                        <?php
                                        $query = "SELECT uuid, client_name FROM client";
                                        $stmt = $koneksi->prepare($query);
                                        $stmt->execute();
                                        $stmt->bind_result($uuid, $client_name);
                                        while ($stmt->fetch()) {
                                            echo "<option value='$uuid'>$client_name</option>";
                                        }
                                        $stmt->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Lokasi Projects</label>
                                    <input class="form-control" type="text" name="location_project" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Mulai Projects</label>
                                    <input class="form-control" type="date" name="date_start_project" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tanggal Berakhir Projects</label>
                                    <input class="form-control" type="date" name="date_end_project" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Status Project</label>
                                    <select name="status_project" class="form-control" required>
                                        <option value="0">--Pilih Status--</option>
                                        <option value="1">Active</option>
                                        <option value="2">Done</option>
                                        <option value="3">Soon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Foto Project</label>
                                        <input class="form-control" type="file" name="foto_project" required>
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
$tanggal = date('Y-m-d');

if (isset($_POST['simpan'])) {
    $status_project = $_POST['status_project'];
    $nama_client = $_POST['nama_client'];

    // Check if file is not jpeg, jpg, or png
    $allowed = array('jpeg', 'jpg', 'png');
    $filename = $_FILES['foto_project']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_projects'>";
        exit();
    }

    // Check if status_project is not empty
    if ($status_project === "0") {
        echo "<div class='alert alert-danger'>Status Project tidak boleh kosong</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_projects'>";
        exit();
    }

    // Check if nama_client is not empty
    if ($nama_client === "0") {
        echo "<div class='alert alert-danger'>Nama Client tidak boleh kosong</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_projects'>";
        exit();
    }

    // Check if the file is uploaded
    if (empty($_FILES['foto_project']['name'])) {
        echo "<div class='alert alert-danger'>Foto tidak boleh kosong</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_projects'>";
        exit();
    }

    // Handle file upload
    $original_name = $_FILES['foto_project']['name'];
    $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    $timestamp = time();
    $nama = $timestamp . '_' . uniqid() . '.' . $ext;

    $lokasi = $_FILES['foto_project']['tmp_name'];
    $upload_directory = "view/projects/images/";

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
        // Insert project data into the database
        $location_project = $_POST['location_project'];
        $date_start_project = $_POST['date_start_project'];
        $date_end_project = $_POST['date_end_project'];
        $title_project = $_POST['title_project'];
        $description_project = $_POST['description_project'];
        $guid = generateUuid();

        $slug = createSlug($title_project);

        $stmt = $koneksi->prepare("INSERT INTO projects (uuid, slug, client_id, lokasi_projects, tanggal_projects_start, tanggal_projects_end, images_projects, status_projects, title_project, description_project) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $guid, $slug, $nama_client, $location_project, $date_start_project, $date_end_project, $nama, $status_project, $title_project, $description_project);

        if ($stmt->execute()) {
            echo "<div class='alert alert-info'>Data Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=projects'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data proyek</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_projects'>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupload file</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=tambah_projects'>";
    }
}
?>
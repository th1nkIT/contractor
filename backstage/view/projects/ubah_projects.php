<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Validasi ID
if (!is_numeric($id) || $id <= 0) {
    echo "<div class='alert alert-danger'>ID Proyek tidak valid</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=projects'>";
    exit();
}

// Gunakan prepared statement untuk mengambil data proyek
$stmt = $koneksi->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Periksa apakah proyek ditemukan
if ($result->num_rows > 0) {
    $pecah = $result->fetch_assoc();
    // Lakukan operasi dengan data proyek yang ditemukan
} else {
    echo "<div class='alert alert-danger'>Proyek tidak ditemukan</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=projects'>";
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
                <h2>Ubah Data Projects</h2>
                </p>
                <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Client</label>
                        <input class="form-control" type="text" name="nama_client" value="<?php echo $pecah['nama_client']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Lokasi Projects</label>
                        <input class="form-control" type="text" name="location_project" value="<?php echo $pecah['lokasi_projects']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Mulai Projects</label>
                        <input class="form-control" type="date" name="date_start_project" value="<?php echo date('Y-m-d', strtotime($pecah['tanggal_start_projects'])); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Berakhir Projects</label>
                        <input class="form-control" type="date" name="date_end_project" value="<?php echo date('Y-m-d', strtotime($pecah['tanggal_end_projects'])); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="example-text-input" class="form-control-label">Status Project</label>
                    <select name="status_project" class="form-control" required>
                    <?php 
                        if($pecah['status_projects']=='1'){
                            echo "<option value='1' selected>Active</option>";
                            echo "<option value='2'>Done</option>";
                            echo "<option value='3'>Soon</option>";
                        } else if ($pecah['status_projects']=='2'){
                            echo "<option value='1'>Active</option>";
                            echo "<option value='2' selected>Done</option>";
                            echo "<option value='3'>Soon</option>";
                        } else if ($pecah['status_projects']=='3'){
                            echo "<option value='1'>Active</option>";
                            echo "<option value='2'>Done</option>";
                            echo "<option value='3' selected>Soon</option>";
                        } else {
                            echo "<option value='0'>--Pilih Status--</option>";
                            echo "<option value='1'>Active</option>";
                            echo "<option value='2'>Done</option>";
                            echo "<option value='3'>Soon</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Project</label>
                            <input class="form-control" type="file" name="foto_project" required>
                            <img src="view/projects/images/<?php echo $pecah['images_projects']; ?>" alt="<?php echo $pecah['nama_client'] ?>">
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
    $id_project = $_POST['id_project'];

    // Check if file is not jpeg, jpg, or png
    $allowed = array('jpeg', 'jpg', 'png');
    $filename = $_FILES['foto_project']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!empty($filename) && !in_array($ext, $allowed)) {
        echo "<div class='alert alert-danger'>Foto harus berformat jpeg, jpg, atau png</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_projects&id_project=$id_project'>";
        exit();
    }

    // Check if status_project is not empty
    if ($status_project === "0") {
        echo "<div class='alert alert-danger'>Status Project tidak boleh kosong</div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_projects&id_project=$id_project'>";
        exit();
    }

    // Handle file upload if a new file is provided
    if (!empty($filename)) {
        $original_name = $_FILES['foto_project']['name'];
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);
        $timestamp = time();
        $nama = $timestamp . '_' . uniqid() . '.' . $ext;
        
        $lokasi = $_FILES['foto_project']['tmp_name'];
        $upload_directory = "view/projects/images/";

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
            // Update project data in the database
            $nama_client = $_POST['nama_client'];
            $location_project = $_POST['location_project'];
            $date_start_project = $_POST['date_start_project'];
            $date_end_project = $_POST['date_end_project'];

            $stmt = $koneksi->prepare("UPDATE projects SET nama_client=?, lokasi_projects=?, tanggal_projects_start=?, tanggal_projects_end=?, images_projects=?, status_projects=? WHERE id_project=?");
            $stmt->bind_param("ssssssi", $nama_client, $location_project, $date_start_project, $date_end_project, $nama, $status_project, $id_project);

            if ($stmt->execute()) {
                echo "<div class='alert alert-info'>Data Tersimpan</div>";
                echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=projects'>";
            } else {
                echo "<div class='alert alert-danger'>Gagal menyimpan data proyek</div>";
                echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_projects&id_project=$id_project'>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Gagal mengupload file</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_projects&id_project=$id_project'>";
        }
    } else {
        // If no new file is provided, update other project data without changing the image
        $nama_client = $_POST['nama_client'];
        $location_project = $_POST['location_project'];
        $date_start_project = $_POST['date_start_project'];
        $date_end_project = $_POST['date_end_project'];

        $stmt = $koneksi->prepare("UPDATE projects SET nama_client=?, lokasi_projects=?, tanggal_projects_start=?, tanggal_projects_end=?, status_projects=? WHERE id_project=?");
        $stmt->bind_param("sssssi", $nama_client, $location_project, $date_start_project, $date_end_project, $status_project, $id_project);

        if ($stmt->execute()) {
            echo "<div class='alert alert-info'>Data Tersimpan</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=projects'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data proyek</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=ubah_projects&id_project=$id_project'>";
        }

        $stmt->close();
    }
}
?>

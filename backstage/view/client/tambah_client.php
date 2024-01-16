<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">
                            <h2>Tambah Data Client</h2>
                            </p>
                            <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Name</label>
                                    <input class="form-control" type="text" name="client_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Email</label>
                                    <input class="form-control" type="email" name="client_email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Phone</label>
                                    <input class="form-control" type="text" name="client_phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Client Address</label>
                                    <input class="form-control" type="text" name="client_address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Client Image</label>
                                        <input class="form-control" type="file" name="client_image" required>
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
    $filename = $_FILES['client_image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        $redirectPath = $_ENV['ROUTE'] . 'backstage/client/add';
        showAlert("error", "Foto harus berformat jpeg, jpg, atau png", "", $redirectPath);
        exit();
    }

    // Check if the file is uploaded
    if (empty($_FILES['client_image']['name'])) {
        $redirectPath = $_ENV['ROUTE'] . 'backstage/client/add';
        showAlert("error", "Foto tidak boleh kosong", "", $redirectPath);
        exit();
    }

    // Handle file upload
    $original_name = $_FILES['client_image']['name'];
    $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    $timestamp = time();
    $nama = $timestamp . '_' . uniqid() . '.' . $ext;

    $lokasi = $_FILES['client_image']['tmp_name'];
    $upload_directory = "view/client/images/";

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
        // Insert article data into the database
        $client_name = $_POST['client_name'];
        $client_email = $_POST['client_email'];
        $client_phone = $_POST['client_phone'];
        $client_address = $_POST['client_address'];

        if (!empty($client_name && $client_email && $client_phone && $client_address && $nama)) {

            // make guid from config/uuid.php
            $guid = generateUuid();

            $stmt = $koneksi->prepare("INSERT INTO client (uuid, client_name, client_email, client_phone, client_address, client_images) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $guid, $client_name, $client_email, $client_phone, $client_address, $nama);

            if ($stmt->execute()) {
                $redirectPath = $_ENV['ROUTE'] . 'backstage/client';
                showAlert("success", "Data tersimpan", "", $redirectPath);
                exit();
            } else {
                $redirectPath = $_ENV['ROUTE'] . 'backstage/client/add';
                showAlert("error", "Gagal menyimpan data client", "", $redirectPath);
                exit();
            }

            $stmt->close();
        } else {
            $redirectPath = $_ENV['ROUTE'] . 'backstage/client/add';
            showAlert("error", "Data client tidak boleh kosong", "",  $redirectPath);
            exit();
        }
    } else {
        $redirectPath = $_ENV['ROUTE'] . 'backstage/client/add';
        showAlert("error", "Gagal mengupload file", "",  $redirectPath);
        exit();
    }
}
?>
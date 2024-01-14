<?php
// Get Profile
$stmt = $koneksi->prepare("SELECT * FROM user WHERE uuid=?");
$stmt->bind_param("s", $session->uuid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="bg-profile-images-container">
                        <img class="bg-profile-images" src="view/profile/images/<?php echo $row['images_user']; ?>" alt="<?php echo $row['nama_lengkap']; ?>">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Profile Data</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="nama_lengkap" class="form-control form-control-user" id="exampleInputName" placeholder="Nama Lengkap Administrator" value="<?php echo $row['nama_lengkap']; ?>">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="role_backstage" class="form-control-profile" required>
                                    <option value="0" disabled>--Pilih Role--</option>
                                    <?php
                                    $role = $row['role'];
                                    if ($role == 1) {
                                        echo '<option value="1" ' . ($role == 1 ? 'selected' : '') . '>Administrator</option>';
                                        echo '<option value="2">User</option>';
                                    }
                                    if ($role == 2) {
                                        echo '<option value="2" selected>User</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control-profile" type="file" name="foto_profile">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input name="repeat_password" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button name="upate_account" class="btn btn-primary btn-user btn-block">
                                Update Account
                            </button>
                            <hr>
                        </form>
                        <?php
                        // Query Update
                        if (isset($_POST['upate_account'])) {
                            $namaLengkap = $_POST['nama_lengkap'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $repeatPassword = $_POST['repeat_password'];
                            $roleBackstage = $_POST['role_backstage'];

                            if ($roleBackstage == 0) {
                                showAlert("error", "Role tidak boleh kosong", "", "index.php?halaman=profile");
                                exit();
                            }

                            if ($row['email'] != $email) {
                                // Check if email already exists
                                $stmt = $koneksi->prepare("SELECT * FROM user WHERE email=?");
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    showAlert("error", "Email sudah digunakan", "", "index.php?halaman=profile");
                                    exit();
                                }
                            }

                            if ($password != "" || $repeatPassword != "") {
                                if ($password == "" || $repeatPassword == "") {
                                    showAlert("error", "Password tidak boleh kosong", "", "index.php?halaman=profile");
                                    exit();
                                }
                            }

                            if ($password != "" && $repeatPassword != "") {
                                // Check Password length
                                if (strlen($password) < 6) {
                                    showAlert("error", "Password minimal 6 karakter", "", "index.php?halaman=profile");
                                    exit();
                                }

                                // Check Password sama atau tidak
                                if ($password !== $repeatPassword) {
                                    showAlert("error", "Password tidak sama dengan Repeat Password", "", "index.php?halaman=profile");
                                    exit();
                                }

                                // Enkripsi Password dengan password_hash
                                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                            } else {
                                $hashedPassword = $row['password'];
                            }

                            // Check if file is not jpeg, jpg, or png
                            $allowed = array('jpeg', 'jpg', 'png');
                            $filename = $_FILES['foto_profile']['name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);

                            if (!empty($filename) && !in_array($ext, $allowed)) {
                                showAlert("error", "Foto harus berformat jpeg, jpg, atau png", "", "index.php?halaman=profile");
                                exit();
                            }

                            if (!empty($filename)) {
                                $original_name = $_FILES['foto_profile']['name'];
                                $ext = pathinfo($original_name, PATHINFO_EXTENSION);
                                $timestamp = time();
                                $nama = $timestamp . '_' . uniqid() . '.' . $ext;

                                $lokasi = $_FILES['foto_profile']['tmp_name'];
                                $upload_directory = "view/profile/images/";

                                if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
                                    // Hapus foto lama
                                    $stmt = $koneksi->prepare("SELECT images_user FROM user WHERE uuid = ?");
                                    $stmt->bind_param("i", $session->uuid);
                                    $stmt->execute();
                                    $stmt->bind_result($foto_lama);
                                    $stmt->fetch();
                                    $stmt->close();

                                    if ($foto_lama && file_exists("view/profile/images/$foto_lama")) {
                                        unlink("view/profile/images/$foto_lama");
                                    }

                                    $stmt = $koneksi->prepare("UPDATE user SET nama_lengkap=?, email=?, password=?, role=?, images_user=? WHERE uuid=?");
                                    $stmt->bind_param("sssiss", $namaLengkap, $email, $hashedPassword, $roleBackstage, $nama, $session->uuid);

                                    if ($stmt->execute()) {
                                        showAlert("success", "Update Profile Berhasil", "", "index.php");
                                        exit();
                                    } else {
                                        showAlert("error", "Update Profile Gagal", "", "index.php?halaman=profile");
                                        exit();
                                    }

                                    $stmt->close();
                                } else {
                                    showAlert("error", "Gagal mengupload file", "", "index.php?halaman=profile");
                                    exit();
                                }
                            } else {
                                // Update Data
                                $stmt = $koneksi->prepare("UPDATE user SET nama_lengkap=?, email=?, password=?, role=? WHERE uuid=?");
                                $stmt->bind_param("sssis", $namaLengkap, $email, $hashedPassword, $roleBackstage, $session->uuid);

                                if ($stmt->execute()) {
                                    showAlert("success", "Update Profile Berhasil", "", "index.php");
                                    exit();
                                } else {
                                    showAlert("error", "Update Profile Gagal", "", "index.php?halaman=profile");
                                    exit();
                                }

                                $stmt->close();
                                $koneksi->close();
                            }
                        }
                        ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
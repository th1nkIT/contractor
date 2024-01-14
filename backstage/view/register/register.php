<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="nama_lengkap" class="form-control form-control-user" id="exampleInputName" placeholder="Nama Lengkap Administrator" required>
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <select name="role_backstage" class="form-control-profile" required>
                                    <option value="0" disabled>--Pilih Role--</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control-profile" type="file" name="foto_profile" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input name="repeat_password" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                </div>
                            </div>
                            <button name="register" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <?php
                        if (isset($_POST['register'])) {
                            $namaLengkap = $_POST['nama_lengkap'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $repeatPassword = $_POST['repeat_password'];
                            $roleBackstage = $_POST['role_backstage'];

                            if ($roleBackstage == 0) {
                                showAlert("error", "Role tidak boleh kosong", "", "index.php?halaman=register");
                                exit();
                            }

                            // Check if email already exists
                            $stmt = $koneksi->prepare("SELECT * FROM user WHERE email=?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                showAlert("error", "Email sudah digunakan", "", "index.php?halaman=register");
                                exit();
                            }

                            // Check Password length
                            if (strlen($password) < 6) {
                                showAlert("error", "Password minimal 6 karakter", "", "index.php?halaman=register");
                                exit();
                            }

                            // Check Password sama atau tidak
                            if ($password !== $repeatPassword) {
                                showAlert("error", "Password tidak sama dengan Repeat Password", "", "index.php?halaman=register");
                                exit();
                            }

                            // Check if file is not jpeg, jpg, or png
                            $allowed = array('jpeg', 'jpg', 'png');
                            $filename = $_FILES['foto_profile']['name'];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION);

                            if (!in_array($ext, $allowed)) {
                                showAlert("error", "Foto harus berformat jpeg, jpg, atau png", "", "index.php?halaman=register");
                                exit();
                            }

                            // Check if the file is uploaded
                            if (empty($_FILES['foto_profile']['name'])) {
                                showAlert("error", "Foto tidak boleh kosong", "", "index.php?halaman=register");
                                exit();
                            }

                            // Handle file upload
                            $original_name = $_FILES['foto_profile']['name'];
                            $ext = pathinfo($original_name, PATHINFO_EXTENSION);
                            $timestamp = time();
                            $nama = $timestamp . '_' . uniqid() . '.' . $ext;

                            $lokasi = $_FILES['foto_profile']['tmp_name'];
                            $upload_directory = "view/profile/images/";

                            // Move the uploaded file to the destination directory
                            if (move_uploaded_file($lokasi, $upload_directory . $nama)) {
                                // make guid from config/uuid.php
                                $guid = generateUuid();

                                // Enkripsi Password dengan password_hash
                                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                // Generate UUID
                                $guid = generateUuid();

                                $stmt = $koneksi->prepare("INSERT INTO user (uuid, nama_lengkap, email, password, role, images_user) VALUES (?, ?, ?, ?, ?, ?)");
                                $stmt->bind_param("ssssis", $guid, $namaLengkap, $email, $hashedPassword, $roleBackstage, $nama);

                                if ($stmt->execute()) {
                                    showAlert("success", "Registrasi Berhasil", "", "index.php?halaman=user");
                                    exit();
                                } else {
                                    showAlert("error", "Registrasi Gagal", "", "index.php?halaman=register");
                                    exit();
                                }

                                $stmt->close();
                            } else {
                                showAlert("error", "Gagal mengupload file", "", "index.php?halaman=register");
                                exit();
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
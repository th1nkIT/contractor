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
                    <form class="user" method="POST">
                        <div class="form-group">
                            <input type="text" name="nama_lengkap" class="form-control form-control-user" id="exampleInputName"
                                placeholder="Nama Lengkap Administrator">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input name="repeat_password" type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <button name="register" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                        <hr>
                    </form>
                    <?php
                        if(isset($_POST['register'])){
                            $nama = $_POST['nama_lengkap'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $repeatPassword = $_POST['repeat_password'];

                            // Check if email already exists
                            $stmt = $koneksi->prepare("SELECT * FROM user WHERE email=?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if($result->num_rows > 0){
                                echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
                                echo "<script>location='index.php?halaman=register';</script>";
                            }

                            // Check Password length
                            if(strlen($password) < 6){
                                echo "<script>alert('Pendaftaran Gagal, Password Minimal 6 Karakter');</script>";
                                echo "<script>location='index.php?halaman=register';</script>";
                            }

                            // Check Password sama atau tidak
                            if($password !== $repeatPassword){
                                echo "<script>alert('Pendaftaran Gagal, Password Tidak Sama');</script>";
                                echo "<script>location='index.php?halaman=register';</script>";
                            }

                            // Enkripsi Password dengan password_hash
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                            $guid = generateUuid();

                            $stmt = $koneksi->prepare("INSERT INTO user (uuid, nama_lengkap, email, password) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("ssss", $guid, $nama, $email, $hashedPassword);

                            if($stmt->execute()){
                                echo "<div class='alert alert-info'>Register Berhasil</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            } else {
                                echo "<div class='alert alert-info'>Register Gagal</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=register'>";
                            }

                            $stmt->close();
                            $koneksi->close();
                        }
                        ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
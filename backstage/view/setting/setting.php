<?php
// Alamat
$stmtAlamat = $koneksi->prepare("SELECT * FROM settings WHERE title = 'Alamat'");
$stmtAlamat->execute();
$resultAlamat = $stmtAlamat->get_result();
$rowAlamat = $resultAlamat->fetch_assoc();

// Hubungi Kami
$stmtHubungi = $koneksi->prepare("SELECT * FROM settings WHERE title = 'Hubungi Kami'");
$stmtHubungi->execute();
$resultHubungi = $stmtHubungi->get_result();
$rowHubungi = $resultHubungi->fetch_assoc();

// Jam Kerja
$stmtJamKerja = $koneksi->prepare("SELECT * FROM settings WHERE title = 'Jam Kerja'");
$stmtJamKerja->execute();
$resultJamKerja = $stmtJamKerja->get_result();
$rowJamKerja = $resultJamKerja->fetch_assoc();
?>
<!-- Address -->
<div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Office Address</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Office Address</label>
                        <input class="form-control" type="text" name="alamat_kami" value="<?php echo htmlspecialchars($rowAlamat['keterangan']); ?>" required>
                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Address : <?php echo htmlspecialchars($rowAlamat['keterangan']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Font Awesome Icon</label>
                        <input class="form-control" type="text" name="fa_icon" value="<?php echo htmlspecialchars($rowAlamat['fa_icon']); ?>" required>
                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Icon <i class="<?php echo htmlspecialchars($rowAlamat['fa_icon']); ?>"></i> : <?php echo htmlspecialchars($rowAlamat['fa_icon']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <button class="btn btn-primary btn-sm ms-auto" name="simpan_alamat">Simpan Data</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_alamat'])) {
                $id = $rowAlamat['id'];
                $alamat = $_POST['alamat_kami'];
                $fa_icon = $_POST['fa_icon'];
                $stmtAlamatUpdate = $koneksi->prepare("UPDATE settings SET keterangan=?, fa_icon=? WHERE id=?");
                $stmtAlamatUpdate->bind_param("ssi", $alamat, $fa_icon, $id);
                $stmtAlamatUpdate->execute();
                echo "<div class='alert alert-info'>Data berhasil update</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=setting'>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Contact Office -->
<div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Office Contact</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Office Contact</label>
                        <input class="form-control" type="text" name="hubungi_kami" value="<?php echo htmlspecialchars($rowHubungi['keterangan']); ?>" required>
                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Contact : <?php echo htmlspecialchars($rowHubungi['keterangan']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Font Awesome Icon</label>
                        <input class="form-control" type="text" name="fa_icon" value="<?php echo htmlspecialchars($rowHubungi['fa_icon']); ?>" required>
                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Icon <i class="<?php echo htmlspecialchars($rowHubungi['fa_icon']); ?>"></i> : <?php echo htmlspecialchars($rowHubungi['fa_icon']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <button class="btn btn-primary btn-sm ms-auto" name="simpan_hubungi">Simpan Data</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_hubungi'])) {
                $id = $rowHubungi['id'];
                $hubungi = $_POST['hubungi_kami'];
                $faIcon = $_POST['fa_icon'];
                $stmtHubungiUpdate = $koneksi->prepare("UPDATE settings SET keterangan=?, fa_icon=? WHERE id=?");
                $stmtHubungiUpdate->bind_param("ssi", $hubungi, $faIcon, $id);
                $stmtHubungiUpdate->execute();
                echo "<div class='alert alert-info'>Data berhasil update</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=setting'>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Jam Kerja -->
<div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Work Hour Office</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Work Hour Office</label>
                        <input class="form-control" type="text" name="jam_kerja" value="<?php echo htmlspecialchars($rowJamKerja['keterangan']); ?>" required>
                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Work Hour : <?php echo htmlspecialchars($rowJamKerja['keterangan']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Font Awesome Icon</label>
                        <input class="form-control" type="text" name="fa_icon" value="<?php echo htmlspecialchars($rowJamKerja['fa_icon']); ?>" required>
                    </div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Icon <i class="<?php echo htmlspecialchars($rowJamKerja['fa_icon']); ?>"></i> : <?php echo htmlspecialchars($rowJamKerja['fa_icon']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <button class="btn btn-primary btn-sm ms-auto" name="simpan_jam">Simpan Data</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_jam'])) {
                $id = $rowJamKerja['id'];
                $jam_kerja = $_POST['jam_kerja'];
                $faIcon = $_POST['fa_icon'];
                $stmtJamKerjaUpdate = $koneksi->prepare("UPDATE settings SET keterangan=?, fa_icon=? WHERE id=?");
                $stmtJamKerjaUpdate->bind_param("ssi", $jam_kerja, $faIcon, $id);
                $stmtJamKerjaUpdate->execute();
                echo "<div class='alert alert-info'>Data berhasil update</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=setting'>";
            }
            ?>
        </div>
    </div>
</div>
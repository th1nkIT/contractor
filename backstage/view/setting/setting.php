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

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Current Address : <?php echo htmlspecialchars($rowAlamat['keterangan']); ?>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <form method="POST">
                            <input class="form-control" type="text" name="alamat_kami" value="<?php echo htmlspecialchars($rowAlamat['keterangan']); ?>" required>
                            <button class="btn btn-primary btn-sm ms-auto" name="simpan_alamat">Simpan Data</button>
                        </form>
                        <?php
                        if (isset($_POST['simpan_alamat'])) {
                            $id = $rowAlamat['id'];
                            $alamat = $_POST['alamat_kami'];
                            $stmtAlamatUpdate = $koneksi->prepare("UPDATE settings SET keterangan=? WHERE id=?");
                            $stmtAlamatUpdate->bind_param("si", $alamat, $id);
                            $stmtAlamatUpdate->execute();
                            echo "<script>alert('Data Alamat Berhasil Diubah');</script>";
                            echo "<script>location='index.php?halaman=setting';</script>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Current Phone : <?php echo htmlspecialchars($rowHubungi['keterangan']); ?>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <form method="POST">
                            <input class="form-control" type="text" name="hubungi_kami" value="<?php echo htmlspecialchars($rowHubungi['keterangan']); ?>" required>
                            <button class="btn btn-primary btn-sm ms-auto" name="simpan_hubungi">Simpan Data</button>
                        </form>
                        <?php
                        if (isset($_POST['simpan_hubungi'])) {
                            $id = $rowHubungi['id'];
                            $hubungi = $_POST['hubungi_kami'];
                            $stmtHubungiUpdate = $koneksi->prepare("UPDATE settings SET keterangan=? WHERE id=?");
                            $stmtHubungiUpdate->bind_param("si", $hubungi, $id);
                            $stmtHubungiUpdate->execute();
                            echo "<script>alert('Data Hubungi Berhasil Diubah');</script>";
                            echo "<script>location='index.php?halaman=setting';</script>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jam Kerja
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <form method="POST">
                                    <input class="form-control" type="text" name="jam_kerja" value="<?php echo htmlspecialchars($rowJamKerja['keterangan']); ?>" required>
                                    <button class="btn btn-primary btn-sm ms-auto" name="simpan_jam">Simpan Data</button>
                                </form>
                                <?php
                                if (isset($_POST['simpan_jam'])) {
                                    $id = $rowJamKerja['id'];
                                    $jam_kerja = $_POST['jam_kerja'];
                                    $stmtJamKerjaUpdate = $koneksi->prepare("UPDATE settings SET keterangan=? WHERE id=?");
                                    $stmtJamKerjaUpdate->bind_param("si", $jam_kerja, $id);
                                    $stmtJamKerjaUpdate->execute();
                                    echo "<script>alert('Data Jam Kerja Berhasil Diubah');</script>";
                                    echo "<script>location='index.php?halaman=setting';</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

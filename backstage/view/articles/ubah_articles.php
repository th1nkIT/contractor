<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM category WHERE id='$id'");
$pecah = $ambil->fetch_assoc();
?>
<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">
                <h2>Edit Data Category</h2>
                </p>
                <button class="btn btn-primary btn-sm ms-auto" name="simpan">Simpan Data</button>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama Category</label>
                        <input class="form-control" type="text" name="nama_category" value="<?php echo $pecah['nama_category']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Deskripsi Category</label>
                        <input class="form-control" type="text" name="deskripsi_category" value="<?php echo $pecah['deskripsi_category']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Summary Category</label>
                        <input class="form-control" type="text" name="summary_category" value="<?php echo $pecah['summary_category']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto Category</label>
                            <input class="form-control" type="file" name="foto_category">
                            <img src="assets/images/category/<?php echo $pecah['images_category']; ?>" alt="<?php echo $pecah['nama_category'] ?>">
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
if(isset($_POST['simpan'])){
    $nama = $_FILES['foto_category']['name'];
    $lokasi = $_FILES['foto_category']['tmp_name'];

    // Jika foto diubah
    if(!empty($lokasi)){
        $foto = $pecah['images_category'];
        unlink("assets/images/category/$foto");
        move_uploaded_file($lokasi, "assets/images/category/$nama");
        $koneksi->query("UPDATE category SET nama_category='$_POST[nama_category]', deskripsi_category='$_POST[deskripsi_category]', summary_category='$_POST[summary_category]', images_category='$nama' WHERE id='$id'");
    } else {
        $koneksi->query("UPDATE category SET nama_category='$_POST[nama_category]', deskripsi_category='$_POST[deskripsi_category]', summary_category='$_POST[summary_category]' WHERE id='$id'");
    }
    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='2;url=index.php?halaman=category'>";
}

?>

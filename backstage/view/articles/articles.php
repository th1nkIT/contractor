<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Article Page</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum justo ut nisi molestie tempus. Praesent ultricies nulla convallis dui efficitur, eu facilisis libero vestibulum. Proin dui quam, eleifend vitae mi et, laoreet viverra felis. Aliquam eu turpis non lacus fermentum aliquam sit amet eget eros. Maecenas vehicula, est sed porta suscipit, ipsum mauris aliquet ipsum, eu semper leo leo vel sapien. Nullam et venenatis enim. Nunc nibh nisl, maximus consectetur neque vitae, blandit bibendum metus.<a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Article Page</h6>
            <a href="index.php?halaman=tambah_articles" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title Article</th>
                            <th>Deskripsi Article</th>
                            <th>Isi Article</th>
                            <th>Images Article</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title Article</th>
                            <th>Deskripsi Article</th>
                            <th>Isi Article</th>
                            <th>Images Article</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $stmt = $koneksi->prepare("SELECT id, title_article, deskripsi_article, isi_article, images_article FROM articles");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
                        } else {
                            while ($pecah = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pecah['title_article']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['deskripsi_article']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['isi_article']) ?></td>
                                    <td><img src="view/articles/images/<?php echo htmlspecialchars($pecah['images_article']) ?>" alt="<?php echo htmlspecialchars($pecah['title_article']) ?>" width="100px" height="100px"></td>
                                    <td>
                                        <a href="index.php?halaman=update_articles&id=<?php echo $pecah['id'] ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        |
                                        <a href="index.php?halaman=delete_articles&id=<?php echo $pecah['id'] ?>" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        $stmt->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Projects Page</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum justo ut nisi molestie tempus. Praesent ultricies nulla convallis dui efficitur, eu facilisis libero vestibulum. Proin dui quam, eleifend vitae mi et, laoreet viverra felis. Aliquam eu turpis non lacus fermentum aliquam sit amet eget eros. Maecenas vehicula, est sed porta suscipit, ipsum mauris aliquet ipsum, eu semper leo leo vel sapien. Nullam et venenatis enim. Nunc nibh nisl, maximus consectetur neque vitae, blandit bibendum metus. <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Projects Page</h6>
            <a href="index.php?halaman=tambah_projects" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name Client</th>
                            <th>Lokasi Projects</th>
                            <th>Tanggal Projects Start - End</th>
                            <th>Images Projects</th>
                            <th>Status Projects</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name Client</th>
                            <th>Lokasi Projects</th>
                            <th>Tanggal Projects Start - End</th>
                            <th>Images Projects</th>
                            <th>Status Projects</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $stmt = $koneksi->prepare("SELECT id, nama_client, lokasi_projects, tanggal_projects_start, tanggal_projects_end, images_projects, status_projects FROM projects");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<tr><td colspan='6' align='center'>Data Kosong</td></tr>";
                        } else {
                            while ($pecah = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pecah['nama_client']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['lokasi_projects']) ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($pecah['tanggal_projects_start'])) ?> - <?php echo date('d-m-Y', strtotime($pecah['tanggal_projects_end'])) ?></td>
                                    <td><img src="view/projects/images/<?php echo htmlspecialchars($pecah['images_projects']) ?>" alt="<?php echo htmlspecialchars($pecah['nama_client']) ?>" width="100px" height="100px"></td>
                                    <td><?php echo htmlspecialchars($pecah['status_projects']) ?></td>
                                    <td>
                                        <a href="index.php?halaman=update_projects&id=<?php echo $pecah['id'] ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        |
                                        <a href="index.php?halaman=delete_projects&id=<?php echo $pecah['id'] ?>" class="btn btn-danger btn-icon-split">
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

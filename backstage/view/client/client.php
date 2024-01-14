<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Client Page</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Client Page</h6>
            <a href="index.php?halaman=tambah_client" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Client Phone</th>
                            <th>Client Address</th>
                            <th>Client Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Client Phone</th>
                            <th>Client Address</th>
                            <th>Client Images</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="clientTableBody">
                        <?php
                        $stmt = $koneksi->prepare("SELECT id, uuid, client_name, client_email, client_phone, client_address, client_images FROM client");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<tr><td colspan='6' align='center'>Data Kosong</td></tr>";
                        } else {
                            while ($pecah = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pecah['client_name']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['client_email']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['client_phone']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['client_address']) ?></td>
                                    <td><img src="view/client/images/<?php echo htmlspecialchars($pecah['client_images']) ?>" alt="<?php echo htmlspecialchars($pecah['title_article']) ?>" width="100px" height="100px"></td>
                                    <td>
                                        <a href="index.php?halaman=update_client&id=<?php echo $pecah['uuid'] ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        |
                                        <a href="#" class="btn btn-danger btn-icon-split delete-client-btn" data-id="<?php echo $pecah['uuid'] ?>">
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
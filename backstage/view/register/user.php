<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User Management</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
            <a href="index.php?halaman=tambah_user" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Profile Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Profile Picture</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $stmt = $koneksi->prepare("
                            SELECT 
                                *
                            FROM 
                                user
                            ORDER BY
                                id DESC
                        ");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<tr><td colspan='6' align='center'>Data Kosong</td></tr>";
                        } else {
                            while ($pecah = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pecah['nama_lengkap']); ?></td>
                                    <td><?php echo htmlspecialchars($pecah['email']); ?></td>
                                    <td><?php echo RoleBackstage($pecah['role']); ?></td>
                                    <td><img src="view/profile/images/<?php echo htmlspecialchars($pecah['images_user']) ?>" alt="<?php echo htmlspecialchars($pecah['nama_lengkap']) ?>" width="100px" height="100px"></td>
                                    <td>
                                        <a href="index.php?halaman=update_user&id=<?php echo $pecah['uuid'] ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        |
                                        <a href="index.php?halaman=delete_user&id=<?php echo $pecah['uuid'] ?>" class="btn btn-danger btn-icon-split">
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
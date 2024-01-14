<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Settings Page</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Setting</h6>
            <a href="/thinkit/backstage/category/add" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name Category</th>
                            <th>Description Category</th>
                            <th>Summary Category</th>
                            <th>Images Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name Category</th>
                            <th>Description Category</th>
                            <th>Summary Category</th>
                            <th>Images Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="categoryTableBody">
                        <?php
                        $stmt = $koneksi->prepare("SELECT id, uuid, nama_category, deskripsi_category, summary_category, images_category FROM category");
                        $stmt->execute();
                        $stmt->store_result();

                        if ($stmt->num_rows == 0) {
                            echo "<tr><td colspan='5' align='center'>Data Kosong</td></tr>";
                        } else {
                            $stmt->bind_result($id, $uuid, $nama_category, $deskripsi_category, $summary_category, $images_category);

                            while ($stmt->fetch()) {
                        ?>
                                <tr>
                                    <td><?php echo $nama_category ?></td>
                                    <td><?php echo $deskripsi_category ?></td>
                                    <td><?php echo $summary_category ?></td>
                                    <td><img src="/thinkit/backstage/view/category/images/<?php echo $images_category ?>" alt="<?php echo $nama_category ?>" width="100px" height="100px"></td>
                                    <td>
                                        <a href="/thinkit/backstage/category/<?php echo $uuid ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        |
                                        <a href="#" class="btn btn-danger btn-icon-split delete-category-btn" data-id="<?php echo $uuid; ?>">
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
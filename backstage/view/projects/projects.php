<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Projects Page</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Projects Page</h6>
            <a href="<?php echo $_ENV['ROUTE']; ?>backstage/project/add" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Project</th>
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
                            <th>Judul Project</th>
                            <th>Name Client</th>
                            <th>Lokasi Projects</th>
                            <th>Tanggal Projects Start - End</th>
                            <th>Images Projects</th>
                            <th>Status Projects</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="projectTableBody">
                        <?php
                        $stmt = $koneksi->prepare("
                            SELECT 
                                projects.id, projects.uuid, projects.client_id, projects.lokasi_projects, 
                                projects.tanggal_projects_start, projects.tanggal_projects_end, projects.images_projects, 
                                projects.status_projects,projects.title_project, client.client_name
                            FROM 
                                projects
                            LEFT JOIN
                                client
                            ON
                                projects.client_id = client.uuid
                            ORDER BY
                                projects.id DESC
                        ");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<tr><td colspan='7' align='center'>Data Kosong</td></tr>";
                        } else {
                            while ($pecah = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pecah['title_project']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['client_name']) ?></td>
                                    <td><?php echo htmlspecialchars($pecah['lokasi_projects']) ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($pecah['tanggal_projects_start'])) ?> - <?php echo date('d-m-Y', strtotime($pecah['tanggal_projects_end'])) ?></td>
                                    <td><img src="<?php echo $_ENV['ROUTE']; ?>backstage/view/projects/images/<?php echo htmlspecialchars($pecah['images_projects']) ?>" alt="<?php echo htmlspecialchars($pecah['nama_client']) ?>" width="100px" height="100px"></td>
                                    <td><?php echo htmlspecialchars(StatusProject($pecah['status_projects'])) ?></td>
                                    <td>
                                        <a href="<?php echo $_ENV['ROUTE']; ?>backstage/project/<?php echo $pecah['uuid'] ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        |
                                        <a href="#" class="btn btn-danger btn-icon-split delete-project-btn" data-id="<?php echo $pecah['uuid'] ?>">
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
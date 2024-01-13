<?php

function Migrate()
{
    MigrateAlterTableArticle();
    MigrateAlterTableCategory();
    MigrateAlterTableProject();
    MigrateClientNewTable();
    MigrateAlterTableProjectTable();
}

function MigrateAlterTableArticle()
{
    global $koneksi;

    $query = "ALTER TABLE articles ADD COLUMN slug VARCHAR(255) NOT NULL UNIQUE";

    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }
}

function MigrateAlterTableCategory()
{
    global $koneksi;

    $query = "ALTER TABLE category ADD COLUMN slug VARCHAR(255) NOT NULL UNIQUE";

    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }
}

function MigrateAlterTableProject()
{
    global $koneksi;

    $query = "ALTER TABLE projects ADD COLUMN slug VARCHAR(255) NOT NULL UNIQUE";

    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }
}

function MigrateClientNewTable()
{
    global $koneksi;

    $query = "CREATE TABLE IF NOT EXISTS client (
        id INT(11) UNSIGNED,
        uuid VARCHAR(255) NOT NULL,
        client_name VARCHAR(100) NOT NULL,
        client_email VARCHAR(50) NOT NULL,
        client_phone VARCHAR(15) NOT NULL,
        client_address VARCHAR(255) NOT NULL,
        client_images VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (uuid)
    )";

    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }
}

function MigrateAlterTableProjectTable()
{
    global $koneksi;

    // Pengecekan apakah kolom client_id sudah ada
    $checkQuery = "SHOW COLUMNS FROM projects LIKE 'client_id'";
    $checkStmt = $koneksi->prepare($checkQuery);

    if ($checkStmt) {
        $checkStmt->execute();
        $checkStmt->store_result();

        // Jika hasil query menunjukkan bahwa kolom belum ada
        if ($checkStmt->num_rows == 0) {
            // Query untuk menambahkan kolom dan foreign key
            $query =
                "ALTER TABLE projects
                ADD COLUMN client_id VARCHAR(255) NOT NULL,
                ADD FOREIGN KEY (client_id) REFERENCES client(uuid),
                ADD COLUMN title_project VARCHAR(50) NOT NULL,
                ADD COLUMN description_project VARCHAR(255) NOT NULL,
                DROP COLUMN nama_client";

            // Eksekusi query
            $stmt = $koneksi->prepare($query);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        // Tutup statement untuk pengecekan
        $checkStmt->close();
    }
}

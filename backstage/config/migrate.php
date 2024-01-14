<?php

function Migrate()
{
    MigrateAlterTableArticle();
    MigrateAlterTableCategory();
    MigrateAlterTableProject();
    MigrateClientNewTable();
    MigrateAlterTableProjectTable();
    MigrateAlterTableSetting();
    MigrateAlterTableUser();
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

    $checkQuery = "SHOW COLUMNS FROM projects LIKE 'client_id'";
    $checkStmt = $koneksi->prepare($checkQuery);

    if ($checkStmt) {
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows == 0) {
            $query =
                "ALTER TABLE projects
                ADD COLUMN client_id VARCHAR(255) NOT NULL,
                ADD FOREIGN KEY (client_id) REFERENCES client(uuid),
                ADD COLUMN title_project VARCHAR(50) NOT NULL,
                ADD COLUMN description_project VARCHAR(255) NOT NULL,
                DROP COLUMN nama_client";

            $stmt = $koneksi->prepare($query);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        $checkStmt->close();
    }
}

function MigrateAlterTableSetting()
{
    global $koneksi;

    // Pengecekan apakah kolom client_id sudah ada
    $checkQuery = "SHOW COLUMNS FROM settings LIKE 'fa_icon'";
    $checkStmt = $koneksi->prepare($checkQuery);

    if ($checkStmt) {
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows == 0) {
            $query =
                "ALTER TABLE settings
                ADD COLUMN fa_icon VARCHAR(50)";

            // Eksekusi query
            $stmt = $koneksi->prepare($query);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        $checkStmt->close();
    }
}

function MigrateAlterTableUser()
{
    global $koneksi;

    // Mengechek apakah sudah ada kolom images_user
    $checkQuery = "SHOW COLUMNS FROM user LIKE 'images_user'";
    $checkStmt = $koneksi->prepare($checkQuery);

    if ($checkStmt) {
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows == 0) {
            $query =
                "ALTER TABLE user
                ADD COLUMN images_user VARCHAR(255) NOT NULL,
                ADD COLUMN role int(1) NOT NULL DEFAULT 2";

            // Eksekusi query
            $stmt = $koneksi->prepare($query);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        $checkStmt->close();
    }
}

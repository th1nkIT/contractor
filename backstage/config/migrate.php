<?php

function Migrate()
{
    MigrateAddTableClient();
    MigrateAlterTableArticle();
    MigrateAlterTableCategory();
    MigrateAlterTableProject();
}

function MigrateAddTableClient()
{
    global $koneksi;

    $query = "CREATE TABLE IF NOT EXISTS client (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        uuid VARCHAR(255) NOT NULL,
        client_name VARCHAR(100) NOT NULL,
        client_email VARCHAR(50) NOT NULL,
        client_phone VARCHAR(15) NOT NULL,
        client_address VARCHAR(255) NOT NULL,
        client_images VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }
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

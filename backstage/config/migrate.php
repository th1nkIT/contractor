<?php

function Migrate()
{
    MigrateAddTableClient();
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

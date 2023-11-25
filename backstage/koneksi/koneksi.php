<?php
$koneksi = new mysqli("localhost", "root", "", "db_kontraktor");

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
} else {
    // echo "Connected successfully";
}

?>
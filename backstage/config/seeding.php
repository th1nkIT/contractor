<?php

use Ramsey\Uuid\Uuid;

function generateUuid()
{
    // Membuat UUID
    $uuid = Uuid::uuid4()->toString();

    return $uuid;
}

$emailSeed = $_ENV['EMAIL_SEED'];
$passwordSeed = $_ENV['PASSWORD_SEED'];
$namaLengkapSeed = $_ENV['NAMALENGKAP_SEED'];
$roleSeed = $_ENV['ROLE_SEED'];
$imagesSeed = $_ENV['IMAGES_SEED'];

$stmt = $koneksi->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $emailSeed);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $passwordHashSeed = password_hash($passwordSeed, PASSWORD_DEFAULT);
    $guid = generateUuid();

    $stmt = $koneksi->prepare("INSERT INTO user (uuid, email, password, nama_lengkap, role, images_user) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $guid, $emailSeed, $passwordHashSeed, $namaLengkapSeed, $roleSeed, $imagesSeed);
    $stmt->execute();

    // echo "Seeding user berhasil.";
} else {
    // echo "User dengan email admin@admin.com sudah ada, tidak perlu melakukan seeding.";
}

$stmt->close();

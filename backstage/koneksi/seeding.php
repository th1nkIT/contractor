<?php
$emailSeed = $_ENV['EMAIL_SEED'];
$passwordSeed = $_ENV['PASSWORD_SEED'];
$namaLengkapSeed = $_ENV['NAMALENGKAP_SEED'];

$stmt = $koneksi->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $emailSeed);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $passwordHashSeed = password_hash($passwordSeed, PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare("INSERT INTO user (email, password, nama_lengkap) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $emailSeed, $passwordHashSeed, $namaLengkapSeed);
    $stmt->execute();

    // echo "Seeding user berhasil.";
} else {
    // echo "User dengan email admin@admin.com sudah ada, tidak perlu melakukan seeding.";
}

$stmt->close();
?>
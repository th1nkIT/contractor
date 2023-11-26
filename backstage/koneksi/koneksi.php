<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
} else {
    // echo "Connected successfully";
}

$koneksi->set_charset("utf8");

function executeQuery($query, $params = array()) {
    global $koneksi;

    $stmt = $koneksi->prepare($query);

    if ($stmt === false) {
        die("Preparation failed: " . $koneksi->error);
    }

    if (!empty($params)) {
        $types = "";
        $values = array();

        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= "i"; 
            } elseif (is_double($param)) {
                $types .= "d"; 
            } elseif (is_string($param)) {
                $types .= "s"; 
            } else {
                $types .= "b";
            }

            $values[] = $param;
        }

        array_unshift($values, $types);
        call_user_func_array(array($stmt, 'bind_param'), $values);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    $stmt->close();

    return $result;
}
?>
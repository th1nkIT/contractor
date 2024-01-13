<?php

use Firebase\JWT\Key;

class Session
{
    public string $email;
    public string $uuid;
    public string $nama_lengkap;

    public function __construct(string $email, string $uuid, string $nama_lengkap)
    {
        $this->email = $email;
        $this->uuid = $uuid;
        $this->nama_lengkap = $nama_lengkap;
    }
}

class SessionManager
{
    public static string $SECRET_KEY = 'secret';

    public static function login(string $email, string $password): bool
    {
        global $koneksi;

        $query = "SELECT * FROM user WHERE email=?";
        $stmt = $koneksi->prepare($query);
        if (!$stmt) {
            die("Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $storedHashedPassword = $user['password'];
            $passwordMatches = password_verify($password, $storedHashedPassword);

            $payload = [
                "email" => $user['email'],
                "uuid" => $user['uuid'],
                "nama_lengkap" => $user['nama_lengkap']
            ];

            if ($passwordMatches) {
                $jwt = \Firebase\JWT\JWT::encode($payload, SessionManager::$SECRET_KEY, 'HS256');
                setcookie("X-T1T-SESSION", $jwt);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        $stmt->close();
    }

    public static function getCurrentSession(): Session
    {
        if (isset($_COOKIE['X-T1T-SESSION'])) {
            $jwt = $_COOKIE['X-T1T-SESSION'];

            try {
                $decoded = \Firebase\JWT\JWT::decode($jwt, new Key(SessionManager::$SECRET_KEY, 'HS256'));
                return new Session($decoded->email, $decoded->uuid, $decoded->nama_lengkap);
            } catch (\Firebase\JWT\SignatureInvalidException $e) {
                throw new Exception("Invalid token signature");
            } catch (\Exception $e) {
                throw new Exception("Error decoding token: " . $e->getMessage());
            }
        } else {
            throw new Exception("User is not logged in");
        }
    }
}

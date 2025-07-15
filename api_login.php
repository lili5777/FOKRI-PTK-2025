<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true"); // Penting untuk session/cookie cross-origin

// Mulai session
session_start();

// Handle OPTIONS request for CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fokri";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $email = $data['email'] ?? '';
    $inputPassword = $data['password'] ?? '';

    if (empty($email) || empty($inputPassword)) {
        echo json_encode(["status" => "error", "message" => "Email dan password harus diisi."]);
        exit();
    }

    // Cari user berdasarkan email
    $stmt = $conn->prepare("SELECT id, nama_lengkap, email, nim_npm, PTK, angkatan, divisi_fokri, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($inputPassword, $user['password'])) {
            // Login berhasil - simpan data user di session
            $_SESSION['user'] = [
                'user_id' => $user['id'],
                'nama_lengkap' => $user['nama_lengkap'],
                'email' => $user['email'],
                'nim_npm' => $user['nim_npm'],
                'PTK' => $user['PTK'],
                'angkatan' => $user['angkatan'],
                'divisi_fokri' => $user['divisi_fokri'],
                'logged_in' => true
            ];

            // Set cookie session (opsional)
            setcookie('PHPSESSID', session_id(), time() + 86400, "/", "", false, true); // Secure, HttpOnly

            // Response ke client
            unset($user['password']);
            echo json_encode([
                "status" => "success",
                "message" => "Login berhasil!",
                "user" => $user,
                "session_id" => session_id()
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Email atau password salah."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Email tidak terdaftar."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Metode request tidak diizinkan."]);
}

$conn->close();

<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Izinkan semua origin untuk sementara. Dalam produksi, batasi ke domain frontend Anda
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle OPTIONS request for CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Konfigurasi Database
$servername = "localhost";
$username = "root"; // Sesuaikan jika Anda punya username lain
$password = "";     // Sesuaikan jika Anda punya password
$dbname = "fokri";  // Pastikan ini sama dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal: " . $conn->connect_error]);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
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
        // Verifikasi password yang dimasukkan dengan hash di database
        if (password_verify($inputPassword, $user['password'])) {
            // Login berhasil
            // Hapus password dari objek user sebelum dikirim ke frontend (keamanan)
            unset($user['password']); 
            echo json_encode(["status" => "success", "message" => "Login berhasil!", "user" => $user]);
        } else {
            // Password salah
            echo json_encode(["status" => "error", "message" => "Email atau password salah, silakan coba lagi."]);
        }
    } else {
        // Email tidak ditemukan
        echo json_encode(["status" => "error", "message" => "Email atau password salah, silakan coba lagi."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Metode request tidak diizinkan."]);
}

$conn->close();
?>
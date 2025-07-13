<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Izinkan semua origin untuk sementara. Dalam produksi, batasi ke domain frontend Anda
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
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

switch ($method) {
    case 'POST':
        // Handle Registrasi Akun Baru
        $data = json_decode(file_get_contents("php://input"), true);

        $namaLengkap = $data['namaLengkap'] ?? '';
        $email = $data['email'] ?? '';
        $nimNPM = $data['nimNPM'] ?? '';
        $PTK = $data['PTK'] ?? '';
        $angkatan = $data['angkatan'] ?? '';
        $divisiFokri = $data['divisiFokri'] ?? '';
        $password = $data['password'] ?? '';

        // Validasi input sederhana (lebih detail ada di JS)
        if (empty($namaLengkap) || empty($email) || empty($nimNPM) || empty($PTK) || empty($angkatan) || empty(html_entity_decode($divisiFokri)) || empty($password)) {
            echo json_encode(["status" => "error", "message" => "Semua field harus diisi."]);
            exit();
        }

        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo json_encode(["status" => "error", "message" => "Email ini sudah terdaftar."]);
            $stmt->close();
            $conn->close();
            exit();
        }
        $stmt->close();

        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Masukkan data ke database
        $stmt = $conn->prepare("INSERT INTO users (nama_lengkap, email, nim_npm, PTK, angkatan, divisi_fokri, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $namaLengkap, $email, $nimNPM, $PTK, $angkatan, $divisiFokri, $hashedPassword);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Registrasi berhasil!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal melakukan registrasi: " . $stmt->error]);
        }
        $stmt->close();
        break;

    case 'GET':
        // Endpoint untuk mengambil data user (opsional, untuk debugging atau admin)
        // HATI-HATI: Jangan ekspos password di sini!
        $result = $conn->query("SELECT id, nama_lengkap, email, nim_npm, jurusan, angkatan, divisi_fokri FROM users");
        $users = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        echo json_encode(["status" => "success", "data" => $users]);
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Metode request tidak diizinkan."]);
        break;
}

$conn->close();
?>
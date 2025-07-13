<?php
// PASTIKAN TIDAK ADA SPASI, BARIS KOSONG, ATAU KARAKTER APAPUN SEBELUM BARIS INI.
// Simpan file ini sebagai UTF-8 tanpa BOM.

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Untuk production, ganti '*' dengan domain frontend Anda (contoh: 'http://localhost:3000')
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Tangani preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit(); // Hentikan eksekusi setelah preflight selesai
}

// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fokri"; // Pastikan nama database ini benar

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "message" => "Koneksi database gagal: " . $conn->connect_error]);
    exit(); // Penting: Hentikan eksekusi jika koneksi gagal
}

$method = $_SERVER['REQUEST_METHOD'];
$divisi = isset($_GET['divisi']) ? $_GET['divisi'] : null;
$id = isset($_GET['id']) ? (int)$_GET['id'] : null; 

switch ($method) {
    case 'GET':
        $sql = "SELECT id, judul, status, progres, tempat, tanggal, detail, divisi FROM program_kerja";
        $params = [];
        $types = "";

        if ($id !== null) { 
            $sql .= " WHERE id = ?";
            $params[] = $id;
            $types .= "i";
        } else if ($divisi !== null && $divisi !== 'Semua') { // 'Semua' adalah nilai khusus dari frontend
            $sql .= " WHERE divisi = ?";
            $params[] = $divisi;
            $types .= "s";
        }

        $stmt = $conn->prepare($sql);
        if ($stmt === false) { 
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal menyiapkan statement: " . $conn->error]);
            $conn->close();
            exit();
        }

        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();

        $programKerja = [];
        while ($row = $result->fetch_assoc()) {
            $programKerja[] = $row;
        }

        http_response_code(200); // OK
        echo json_encode(["success" => true, "programKerja" => $programKerja]);
        $stmt->close();
        $conn->close();
        exit(); 

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        
        $judul = $data['judul'] ?? '';
        $status = $data['status'] ?? '';
        $progres = (int)($data['progres'] ?? 0); // Pastikan ini angka
        $tempat = $data['tempat'] ?? '';
        $tanggal = $data['tanggal'] ?? '';
        $detail = $data['detail'] ?? '';
        $divisi_post = $data['divisi'] ?? '';

        if (empty($judul) || empty($status) || empty($divisi_post)) {
            http_response_code(400); // Bad Request
            echo json_encode(["success" => false, "message" => "Judul, status, dan divisi tidak boleh kosong."]);
            exit();
        }

        $sql = "INSERT INTO program_kerja (judul, status, progres, tempat, tanggal, detail, divisi) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal menyiapkan statement: " . $conn->error]);
            $conn->close();
            exit();
        }

        $stmt->bind_param("ssissss", $judul, $status, $progres, $tempat, $tanggal, $detail, $divisi_post);

        if ($stmt->execute()) {
            http_response_code(201); // Created
            echo json_encode(["success" => true, "message" => "Program kerja berhasil ditambahkan!", "id" => $stmt->insert_id]);
        } else {
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal menambahkan program kerja: " . $stmt->error]);
        }
        $stmt->close();
        exit();

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        
        $put_id = isset($data['id']) ? (int)$data['id'] : $id; 
        if ($put_id === null) {
            http_response_code(400); 
            echo json_encode(["success" => false, "message" => "ID tidak boleh kosong untuk update."]);
            exit();
        }

        $judul = $data['judul'] ?? '';
        $status = $data['status'] ?? '';
        $progres = (int)($data['progres'] ?? 0);
        $tempat = $data['tempat'] ?? '';
        $tanggal = $data['tanggal'] ?? '';
        $detail = $data['detail'] ?? '';
        $divisi_put = $data['divisi'] ?? '';

        if (empty($judul) || empty($status) || empty($divisi_put)) {
            http_response_code(400); 
            echo json_encode(["success" => false, "message" => "Judul, status, dan divisi tidak boleh kosong untuk update."]);
            exit();
        }

        $sql = "UPDATE program_kerja SET judul = ?, status = ?, progres = ?, tempat = ?, tanggal = ?, detail = ? WHERE id = ? AND divisi = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) { 
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal menyiapkan statement: " . $conn->error]);
            $conn->close();
            exit();
        }
        
        $stmt->bind_param("ssisssis", $judul, $status, $progres, $tempat, $tanggal, $detail, $put_id, $divisi_put);

        if ($stmt->execute()) {
            http_response_code(200); 
            echo json_encode(["success" => true, "message" => "Program kerja berhasil diperbarui!"]);
        } else {
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal memperbarui program kerja: " . $stmt->error]);
        }
        $stmt->close();
        exit(); 

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        
        $delete_id = isset($data['id']) ? (int)$data['id'] : $id; 
        if ($delete_id === null) {
            http_response_code(400); 
            echo json_encode(["success" => false, "message" => "ID tidak boleh kosong untuk delete."]);
            exit();
        }

        $divisi_delete = $data['divisi'] ?? ''; 

        if (empty($divisi_delete)) {
            http_response_code(400); 
            echo json_encode(["success" => false, "message" => "Divisi tidak boleh kosong untuk delete."]);
            exit();
        }

        $sql = "DELETE FROM program_kerja WHERE id = ? AND divisi = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) { 
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal menyiapkan statement: " . $conn->error]);
            $conn->close();
            exit();
        }

        $stmt->bind_param("is", $delete_id, $divisi_delete);

        if ($stmt->execute()) {
            http_response_code(200); 
            echo json_encode(["success" => true, "message" => "Program kerja berhasil dihapus!"]);
        } else {
            http_response_code(500); 
            echo json_encode(["success" => false, "message" => "Gagal menghapus program kerja: " . $stmt->error]);
        }
        $stmt->close();
        exit(); 

    default:
        http_response_code(405); 
        echo json_encode(["success" => false, "message" => "Metode request tidak diizinkan."]);
        exit(); 
}
// TIDAK ADA TAG PENUTUP
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Izinkan akses dari semua origin (untuk development, sebaiknya spesifikkan domain Anda di production)
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Tangani preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Konfigurasi Database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = "";     // Sesuaikan dengan password database Anda (kosong jika XAMPP default)
$dbname = "fokri";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Koneksi database gagal: " . $conn->connect_error]));
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Mengambil semua event timeline
        $sql = "SELECT id, judul AS title, deskripsi, tanggal AS start, lampiran FROM timeline";
        $result = $conn->query($sql);

        $events = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // FullCalendar event object requirement
                $event = [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'start' => $row['start'], // FullCalendar expects 'start' for date/time
                    'description' => $row['deskripsi'],
                    'url' => $row['lampiran'] ? $row['lampiran'] : null, // Jika ada lampiran, bisa jadi URL
                    'allDay' => true // Default ke allDay, bisa disesuaikan jika ada waktu spesifik
                ];
                $events[] = $event;
            }
        }
        echo json_encode(["success" => true, "events" => $events]);
        break;

    case 'POST':
        // Menambah event timeline baru
        $data = json_decode(file_get_contents("php://input"), true);

        $judul = $conn->real_escape_string($data['title']);
        $deskripsi = $conn->real_escape_string($data['description']);
        $tanggal = $conn->real_escape_string($data['start']);
        $lampiran = isset($data['url']) ? $conn->real_escape_string($data['url']) : null;

        $sql = "INSERT INTO timeline (judul, deskripsi, tanggal, lampiran) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $judul, $deskripsi, $tanggal, $lampiran);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Event berhasil ditambahkan!", "id" => $conn->insert_id]);
        } else {
            echo json_encode(["success" => false, "message" => "Gagal menambahkan event: " . $stmt->error]);
        }
        $stmt->close();
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $conn->real_escape_string($data['id']);
        $judul = $conn->real_escape_string($data['title']);
        $tanggal = $conn->real_escape_string($data['start']);
        $deskripsi = isset($data['description']) ? $conn->real_escape_string($data['description']) : null;
        $lampiran = isset($data['url']) ? $conn->real_escape_string($data['url']) : null;

        $sql = "UPDATE timeline SET judul = ?, tanggal = ?, deskripsi = ?, lampiran = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $judul, $tanggal, $deskripsi, $lampiran, $id); // Perbaikan di sini

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Event berhasil diperbarui!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Gagal memperbarui event: " . $stmt->error]);
        }
        $stmt->close();
        break;

    case 'DELETE':
        // Menghapus event timeline
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $conn->real_escape_string($data['id']);

        $sql = "DELETE FROM timeline WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Event berhasil dihapus!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Gagal menghapus event: " . $stmt->error]);
        }
        $stmt->close();
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(["success" => false, "message" => "Metode request tidak diizinkan."]);
        break;
}

$conn->close();
?>
<?php
header('Content-Type: application/json'); // Memberi tahu browser bahwa responsnya adalah JSON
header('Access-Control-Allow-Origin: *'); // Mengizinkan semua domain untuk mengakses (untuk pengembangan)
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS'); // Menambahkan PUT karena mungkin akan digunakan untuk update
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Header yang diizinkan

// Handle preflight OPTIONS request (penting untuk CORS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Konfigurasi Database
$servername = "localhost"; // Biasanya localhost jika PHP dan MySQL di server yang sama
$username = "root";       // Ganti dengan username database Anda
$password = "";           // Ganti dengan password database Anda (kosong jika tidak ada)
$dbname = "fokri";        // Nama database yang sudah Anda buat di phpMyAdmin

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Koneksi database gagal: " . $conn->connect_error]));
}

// Fungsi helper untuk mengirim respons JSON
function sendResponse($status_code, $success, $message, $data = []) {
    http_response_code($status_code);
    echo json_encode([
        "success" => $success,
        "message" => $message,
        "data" => $data
    ]);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $sql = "SELECT id, judul, isi, tanggal, gambar_url, dokumen_url, youtube_link FROM publikasi ORDER BY id DESC";
        $result = $conn->query($sql);

        $publikasi = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $publikasi[] = $row;
            }
        }
        sendResponse(200, true, "Data publikasi berhasil diambil.", $publikasi);
        break;

    case 'POST':
        $judul = $_POST['judul'] ?? '';
        $isi = $_POST['isi'] ?? '';
        $youtube_link = $_POST['youtube_link'] ?? NULL;
        $gambar_url = NULL;
        $dokumen_url = NULL;
        $tanggal = date('Y-m-d H:i:s'); // Tambahkan tanggal saat ini

        // Penanganan Upload Gambar
        if (isset($_FILES['gambar_publikasi']) && $_FILES['gambar_publikasi']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/gambar/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $gambarFileName = uniqid('img_') . '_' . basename($_FILES['gambar_publikasi']['name']);
            $gambarFilePath = $uploadDir . $gambarFileName;

            if (move_uploaded_file($_FILES['gambar_publikasi']['tmp_name'], $gambarFilePath)) {
                $gambar_url = $gambarFilePath;
            } else {
                sendResponse(500, false, 'Gagal mengunggah gambar.');
            }
        }

        // Penanganan Upload Dokumen
        if (isset($_FILES['dokumen_publikasi']) && $_FILES['dokumen_publikasi']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/dokumen/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $dokumenFileName = uniqid('doc_') . '_' . basename($_FILES['dokumen_publikasi']['name']);
            $dokumenFilePath = $uploadDir . $dokumenFileName;

            if (move_uploaded_file($_FILES['dokumen_publikasi']['tmp_name'], $dokumenFilePath)) {
                $dokumen_url = $dokumenFilePath;
            } else {
                sendResponse(500, false, 'Gagal mengunggah dokumen.');
            }
        }

        // Kueri SQL
        $sql = "INSERT INTO publikasi (judul, isi, tanggal, gambar_url, dokumen_url, youtube_link) 
            VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            sendResponse(500, false, 'Gagal menyiapkan statement: ' . $conn->error);
        }

        $stmt->bind_param("ssssss", $judul, $isi, $tanggal, $gambar_url, $dokumen_url, $youtube_link);

        if ($stmt->execute()) {
            sendResponse(201, true, 'Publikasi berhasil ditambahkan!', ['id' => $stmt->insert_id]);
        } else {
            sendResponse(500, false, 'Gagal menambahkan publikasi: ' . $stmt->error);
        }
        $stmt->close();
        break;

    case 'DELETE':
        // Menghapus publikasi berdasarkan ID
        $id = $_GET['id'] ?? null; // Ambil ID dari parameter query string

        if ($id) {

            $stmt_select = $conn->prepare("SELECT gambar_url, dokumen_url FROM publikasi WHERE id= ?");
            $stmt_select->bind_param("i", $id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
            $row = $result->fetch_assoc();
            $stmt_select->close();

            if ($row) {
                // Hapus gambar jika ada
                if (!empty($row['gambar_url']) && file_exists($row['gambar_url'])) {
                    unlink($row['gambar_url']);
                }
                // Hapus dokumen jika ada
                if (!empty($row['dokumen_url']) && file_exists($row['dokumen_url'])) {
                    unlink($row['dokumen_url']);
                }
            }

            // Menyesuaikan nama kolom di DELETE statement
            $sql = "DELETE FROM publikasi WHERE id= ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    sendResponse(200, true, 'Publikasi berhasil dihapus!');
                } else {
                    sendResponse(404, false, 'Publikasi tidak ditemukan.');
                }
            } else {
                sendResponse(500, false, 'Gagal menghapus publikasi: ' . $stmt->error);
            }
            $stmt->close();
        } else {
            sendResponse(400, false, 'ID publikasi tidak diberikan.');
        }
        break;

    // Tambahkan case 'PUT' jika Anda ingin fungsi update
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;
        $judul = $data['judul'] ?? '';
        $isi = $data['isi'] ?? '';
        $youtube_link = $data['youtube_link'] ?? NULL;

        if (!$id) {
            sendResponse(400, false, 'ID publikasi tidak diberikan untuk update.');
        }

        $sql = "UPDATE publikasi SET judul=?, isi=?, youtube_link=? WHERE id=?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            sendResponse(500, false, 'Gagal menyiapkan statement UPDATE: ' . $conn->error);
        }

        // Tipe parameter: sssi (4 string + 1 integer)
        $stmt->bind_param("sssi", $judul, $isi, $youtube_link, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                sendResponse(200, true, 'Publikasi berhasil diperbarui!');
            } else {
                sendResponse(200, true, 'Tidak ada perubahan pada publikasi atau publikasi tidak ditemukan.');
            }
        } else {
            sendResponse(500, false, 'Gagal memperbarui publikasi: ' . $stmt->error);
        }
        $stmt->close();
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(["success" => false, "message" => "Metode HTTP tidak diizinkan."]);
        break;
}

$conn->close();
?>
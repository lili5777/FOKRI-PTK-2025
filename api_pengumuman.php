<?php

header('Content-Type: application/json'); // Mengatur header untuk memberitahu klien bahwa respon adalah JSON
header('Access-Control-Allow-Origin: *'); // Mengizinkan permintaan dari domain mana saja (untuk pengembangan, sesuaikan di produksi)
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); // Mengizinkan metode HTTP yang relevan
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Mengizinkan header yang relevan

// --- Konfigurasi Database ---
$host = 'localhost'; // Host database, sesuai dengan "Server_127.0.0.1" di phpMyAdmin
$dbname = 'fokri'; // Nama database, sesuai dengan "fokri" di phpMyAdmin
$username = 'root'; // Username database Anda (biasanya 'root' untuk pengembangan lokal)
$password = ''; // Password database Anda (kosong jika tidak diatur untuk 'root' lokal)

// --- Membuat Koneksi Database ---
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['message' => 'Koneksi database gagal: ' . $conn->connect_error]);
    exit();
}

// --- Fungsi Helper untuk Respon JSON ---
function sendResponse($status, $message, $data = [])
{
    http_response_code($status);
    echo json_encode([
        'message' => $message,
        'data' => $data
    ]);
    exit();
}

// --- Logika API Berdasarkan Metode HTTP ---
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // --- Mengambil Semua Pengumuman atau Pengumuman Berdasarkan ID ---
        if (isset($_GET['id'])) {
            // Mengambil pengumuman berdasarkan ID
            $id = $conn->real_escape_string($_GET['id']);
            $sql = "SELECT id, judul, isi, lampiran, tanggal_publikasi FROM pengumuman WHERE id = ?"; // Kolom yang disarankan
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $pengumuman = $result->fetch_assoc();
                sendResponse(200, 'Pengumuman ditemukan', $pengumuman);
            } else {
                sendResponse(404, 'Pengumuman tidak ditemukan');
            }
            $stmt->close();
        } else {
            // Mengambil semua pengumuman
            $sql = "SELECT id, judul, isi, lampiran, tanggal_publikasi FROM pengumuman ORDER BY tanggal_publikasi DESC"; // Kolom yang disarankan
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $pengumuman_array = [];
                while ($row = $result->fetch_assoc()) {
                    $pengumuman_array[] = $row;
                }
                sendResponse(200, 'Daftar pengumuman berhasil diambil', $pengumuman_array);
            } else {
                sendResponse(200, 'Tidak ada pengumuman');
            }
        }
        break;

    case 'POST':
        // --- Menambah Pengumuman Baru ---
        $data = json_decode(file_get_contents("php://input"), true);

        $judul = $conn->real_escape_string($data['judul'] ?? ''); // Berdasarkan form input
        $isi_pengumuman = $conn->real_escape_string($data['isi'] ?? ''); // Berdasarkan form input
        $link_lampiran = $conn->real_escape_string($data['lampiran'] ?? ''); // Berdasarkan form input
        $tanggal_publikasi = date('Y-m-d H:i:s'); // Mengambil waktu server saat ini

        if (empty($judul) || empty($isi_pengumuman)) {
            sendResponse(400, 'Judul dan isi pengumuman tidak boleh kosong');
        }

        $sql = "INSERT INTO pengumuman (judul, isi, lampiran, tanggal_publikasi) VALUES (?, ?, ?, ?)"; // Kolom yang disarankan
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $judul, $isi_pengumuman, $link_lampiran, $tanggal_publikasi);

        if ($stmt->execute()) {
            sendResponse(201, 'Pengumuman berhasil ditambahkan', ['id' => $conn->insert_id]);
        } else {
            sendResponse(500, 'Gagal menambahkan pengumuman: ' . $stmt->error);
        }
        $stmt->close();
        break;

    case 'PUT':
        // --- Memperbarui Pengumuman yang Ada ---
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $conn->real_escape_string($data['id'] ?? '');
        $judul = $conn->real_escape_string($data['judul'] ?? '');
        $isi_pengumuman = $conn->real_escape_string($data['isi_pengumuman'] ?? '');
        $link_lampiran = $conn->real_escape_string($data['link_lampiran'] ?? '');

        if (empty($id) || empty($judul) || empty($isi_pengumuman)) {
            sendResponse(400, 'ID, Judul, dan isi pengumuman tidak boleh kosong untuk pembaruan');
        }

        $sql = "UPDATE pengumuman SET judul = ?, isi_pengumuman = ?, link_lampiran = ? WHERE id = ?"; // Kolom yang disarankan
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $judul, $isi_pengumuman, $link_lampiran, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                sendResponse(200, 'Pengumuman berhasil diperbarui');
            } else {
                sendResponse(404, 'Pengumuman tidak ditemukan atau tidak ada perubahan');
            }
        } else {
            sendResponse(500, 'Gagal memperbarui pengumuman: ' . $stmt->error);
        }
        $stmt->close();
        break;

    case 'DELETE':
        // --- Menghapus Pengumuman ---
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $conn->real_escape_string($data['id'] ?? $_GET['id'] ?? ''); // Bisa dari body JSON atau query param

        if (empty($id)) {
            sendResponse(400, 'ID pengumuman tidak boleh kosong untuk penghapusan');
        }

        $sql = "DELETE FROM pengumuman WHERE id = ?"; // Mengacu pada ID di tabel pengumuman
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                sendResponse(200, 'Pengumuman berhasil dihapus');
            } else {
                sendResponse(404, 'Pengumuman tidak ditemukan');
            }
        } else {
            sendResponse(500, 'Gagal menghapus pengumuman: ' . $stmt->error);
        }
        $stmt->close();
        break;

    case 'OPTIONS':
        // Ini adalah preflight request untuk CORS, cukup kirim header yang diizinkan
        sendResponse(200, 'Preflight OK');
        break;

    default:
        // Metode HTTP tidak diizinkan
        sendResponse(405, 'Metode tidak diizinkan');
        break;
}

// Menutup koneksi database
$conn->close();

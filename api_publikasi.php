<?php
// Disable error reporting to prevent HTML error output
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS, PATCH');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Credentials: true');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fokri";

// Create database connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");
} catch (Exception $e) {
    sendResponse(500, false, "Database connection error: " . $e->getMessage());
}

session_start();

// Helper function to send JSON response
function sendResponse($status_code, $success, $message, $data = [])
{
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
        if (isset($_GET['check-like'])) {
            $user_id = $_SESSION['user']['user_id'] ?? null;
            $publikasi_id = $_GET['id'] ?? null;

            if (!$user_id) {
                sendResponse(401, false, 'Not logged in');
            }

            if (!$publikasi_id) {
                sendResponse(400, false, 'Publication ID required');
            }

            try {
                $stmt = $conn->prepare("SELECT id FROM publikasi_likes WHERE id_publikasi = ? AND id_user = ?");
                $stmt->bind_param("ii", $publikasi_id, $user_id);
                $stmt->execute();
                $stmt->store_result();

                sendResponse(200, true, '', ['hasLiked' => $stmt->num_rows > 0]);
            } catch (Exception $e) {
                sendResponse(500, false, 'Error checking like status: ' . $e->getMessage());
            }
        } else {
            // Get all publications
            try {
                $sql = "SELECT id, judul, isi, tanggal, gambar_url, dokumen_url, youtube_link, view_count, like_count FROM publikasi ORDER BY id DESC";
                $result = $conn->query($sql);

                $publikasi = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $publikasi[] = $row;
                    }
                }
                sendResponse(200, true, "Data publikasi berhasil diambil.", $publikasi);
            } catch (Exception $e) {
                sendResponse(500, false, 'Error fetching publications: ' . $e->getMessage());
            }
        }
        break;

    case 'POST':
        try {
            $judul = $_POST['judul'] ?? '';
            $isi = $_POST['isi'] ?? '';
            $youtube_link = $_POST['youtube_link'] ?? NULL;
            $gambar_url = NULL;
            $dokumen_url = NULL;
            $tanggal = date('Y-m-d H:i:s');

            // Image upload handling
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

            // Document upload handling
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

            // SQL Query
            $sql = "INSERT INTO publikasi (judul, isi, tanggal, gambar_url, dokumen_url, youtube_link) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                throw new Exception('Failed to prepare statement: ' . $conn->error);
            }

            $stmt->bind_param("ssssss", $judul, $isi, $tanggal, $gambar_url, $dokumen_url, $youtube_link);

            if ($stmt->execute()) {
                sendResponse(201, true, 'Publikasi berhasil ditambahkan!', ['id' => $stmt->insert_id]);
            } else {
                throw new Exception('Failed to execute statement: ' . $stmt->error);
            }
        } catch (Exception $e) {
            sendResponse(500, false, 'Error creating publication: ' . $e->getMessage());
        }
        break;

    case 'DELETE':
        try {
            $id = $_GET['id'] ?? null;

            if (!$id) {
                sendResponse(400, false, 'ID publikasi tidak diberikan.');
            }

            // Get file paths before deletion
            $stmt_select = $conn->prepare("SELECT gambar_url, dokumen_url FROM publikasi WHERE id = ?");
            $stmt_select->bind_param("i", $id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                // Delete image file if exists
                if (!empty($row['gambar_url']) && file_exists($row['gambar_url'])) {
                    unlink($row['gambar_url']);
                }
                // Delete document file if exists
                if (!empty($row['dokumen_url']) && file_exists($row['dokumen_url'])) {
                    unlink($row['dokumen_url']);
                }
            }

            // Delete from database
            $sql = "DELETE FROM publikasi WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    sendResponse(200, true, 'Publikasi berhasil dihapus!');
                } else {
                    sendResponse(404, false, 'Publikasi tidak ditemukan.');
                }
            } else {
                throw new Exception('Failed to delete publication: ' . $stmt->error);
            }
        } catch (Exception $e) {
            sendResponse(500, false, 'Error deleting publication: ' . $e->getMessage());
        }
        break;

    case 'PUT':
        try {
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
                throw new Exception('Failed to prepare UPDATE statement: ' . $conn->error);
            }

            $stmt->bind_param("sssi", $judul, $isi, $youtube_link, $id);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    sendResponse(200, true, 'Publikasi berhasil diperbarui!');
                } else {
                    sendResponse(200, true, 'Tidak ada perubahan pada publikasi atau publikasi tidak ditemukan.');
                }
            } else {
                throw new Exception('Failed to update publication: ' . $stmt->error);
            }
        } catch (Exception $e) {
            sendResponse(500, false, 'Error updating publication: ' . $e->getMessage());
        }
        break;

    case 'PATCH':
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            $id = $data['id'] ?? null;
            $action = $data['action'] ?? null;

            if (!$id || !$action) {
                sendResponse(400, false, 'ID dan aksi diperlukan');
            }

            if ($action === 'view') {
                $sql = "UPDATE publikasi SET view_count = COALESCE(view_count, 0) + 1 WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    sendResponse(200, true, 'View count updated');
                } else {
                    throw new Exception('Failed to update view count: ' . $stmt->error);
                }
            } elseif ($action === 'like') {
                $user_id = $_SESSION['user']['user_id'] ?? null;

                if (!$user_id) {
                    sendResponse(401, false, 'Anda harus login untuk like');
                }

                // Start transaction
                $conn->begin_transaction();

                try {
                    // Check if already liked
                    $check = $conn->prepare("SELECT id FROM publikasi_likes WHERE id_publikasi = ? AND id_user = ?");
                    $check->bind_param("ii", $id, $user_id);
                    $check->execute();
                    $check->store_result();

                    if ($check->num_rows > 0) {
                        $conn->rollback();
                        sendResponse(400, false, 'Anda sudah like publikasi ini');
                    }

                    // Add like
                    $insert = $conn->prepare("INSERT INTO publikasi_likes (id_publikasi, id_user) VALUES (?, ?)");
                    $insert->bind_param("ii", $id, $user_id);

                    if (!$insert->execute()) {
                        throw new Exception('Failed to insert like: ' . $insert->error);
                    }

                    // Update counter
                    $update = $conn->prepare("UPDATE publikasi SET like_count = COALESCE(like_count, 0) + 1 WHERE id = ?");
                    $update->bind_param("i", $id);

                    if (!$update->execute()) {
                        throw new Exception('Failed to update like count: ' . $update->error);
                    }

                    $conn->commit();

                    // Get updated like count
                    $count = $conn->prepare("SELECT like_count FROM publikasi WHERE id = ?");
                    $count->bind_param("i", $id);
                    $count->execute();
                    $result = $count->get_result();
                    $like_count = $result->fetch_assoc()['like_count'] ?? 0;

                    sendResponse(200, true, 'Like berhasil', [
                        'like_count' => $like_count,
                        'has_liked' => true
                    ]);
                } catch (Exception $e) {
                    $conn->rollback();
                    throw $e;
                }
            } else {
                sendResponse(400, false, 'Aksi tidak valid');
            }
        } catch (Exception $e) {
            sendResponse(500, false, 'Error processing request: ' . $e->getMessage());
        }
        break;

    default:
        sendResponse(405, false, "Metode HTTP tidak diizinkan.");
        break;
}

$conn->close();

// endpoint: check_session.php
<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['logged_in']) {
    echo json_encode([
        "status" => "success",
        "user" => $_SESSION['user'],
        "session_active" => true
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Tidak ada session aktif",
        "session_active" => false
    ]);
}
?>
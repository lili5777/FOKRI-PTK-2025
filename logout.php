// logout-simple.php
<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials: true");
session_start();
session_destroy();
header("Location: index.html"); // Langsung redirect
exit();
?>
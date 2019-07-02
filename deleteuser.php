<?php
require_once("constants.php");
require_once("adminauth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('DELETE FROM Users WHERE Username LIKE BINARY ?');
$stmt->bind_param("s", $username);
$username = $_POST['user'];

if ($stmt->execute()){
    header("Location: adminpanel.php?message=Successfully%20deleted");
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('UPDATE Users SET Token=NULL WHERE Username=?');
$stmt->bind_param("s", $username);
$username = $_COOKIE['user'];

if (!$stmt->execute()) {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
    exit();
}

setcookie('token');
setcookie('user');
header('Location: index.php');
exit();
?>
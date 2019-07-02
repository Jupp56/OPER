<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (!$_COOKIE['user']){
    header("HTTP/1.1 401 Unauthorized");
    header("Location: index.php?message=Please%20log%20in%20first");
    exit();
}

$stmt = $mysqli->prepare('SELECT Token, IsAdmin FROM Users WHERE Username LIKE BINARY ?');
$stmt->bind_param("s", $username);
$username = $_COOKIE['user'];
$stmt->bind_result($token, $isAdmin);

if (!$stmt->execute()) {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
    exit();
}

$stmt->store_result();

if (!$stmt->fetch() || $stmt->num_rows < 1){
    header("HTTP/1.1 401 Unauthorized");
    header("Location: index.php?message=User%20does%20not%20exist");
    exit();
}

if ($token != $_COOKIE['token']){
    header("HTTP/1.1 401 Unauthorized");
    header("Location: index.php?message=Session%20expired");
    exit();
}

if (!$isAdmin){
    header('HTTP/1.0 403 Forbidden');
    exit();
}
?>
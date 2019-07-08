<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('INSERT INTO Courses (Name, CreatorId) VALUES (?, ?)');
$stmt->bind_param("si", $coursename, $userid);

$coursename = $_POST['CourseName'];
$userid = $_COOKIE['user'];

if ($stmt->execute()){
    header("Location: courses.php");
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
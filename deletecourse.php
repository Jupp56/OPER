<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('DELETE FROM Participants WHERE (Id=? AND CreatorId=?)');
$stmt->bind_param("ii", $id, $userid);
$id = $_GET['CourseId'];
$userid = $_COOKIE['user'];

if ($stmt->execute()){
    $count = $stmt->affected_rows;
    header("Location: main.php?message=Successfully%20deleted%20".$count.'%20entries.');
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
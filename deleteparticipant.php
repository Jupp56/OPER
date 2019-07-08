<?php
require_once("constants.php");
require_once("adminauth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('DELETE FROM Participants WHERE Id=?');
$stmt->bind_param("i", $id);
$id = $_GET['ParticipantId'];

if ($stmt->execute()){
    header("Location: participants.php?message=Successfully%20deleted");
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
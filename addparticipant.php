<?php
require_once("constants.php");
require_once("adminauth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('INSERT INTO Participants (FirstName, LastName, DateOfBirth) VALUES (?, ?, ?)');
$stmt->bind_param("sss", $firstname, $lastname, $dateofbirth);

$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$dateofbirth = $_POST['DateOfBirth'];

if ($stmt->execute()){
    header("Location: participants.php");
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
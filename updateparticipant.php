<?php
require_once("constants.php");
require_once("adminauth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$stmt = $mysqli->prepare("UPDATE Participants SET FirstName=?,LastName=?,DateOfBirth=? WHERE Id=?");
$stmt->bind_param("sssi", $firstname, $lastname, $dateofbirth, $id);
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$dateofbirth = $_POST['DateOfBirth'];
$id = $_POST['ParticipantId'];
if ($stmt->execute()){
    $count = $stmt->affected_rows;
    
    header('Location: adminpanel.php?message=Successfully%20updated%20'.$count.'%20entries.');
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?> 
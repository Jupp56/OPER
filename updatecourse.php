<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$stmt = $mysqli->prepare("UPDATE Course SET Name=? WHERE Id=?");
$stmt->bind_param("si", $coursename, $courseid);
$coursename = $_POST['CourseName'];
$courseid = $_POST['CourseId'];
if ($stmt->execute()){
    $count = $stmt->affected_rows;
    
    header('Location: courses.php?message=Successfully%20updated%20'.$count.'%20entries.');
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?> 
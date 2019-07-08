<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT Name, Id FROM Courses WHERE CreatorId=?');
$stmt->bind_param('i', $userid);
$userid = $_COOKIE['user'];
$stmt->bind_result($name, $id);

$users = array();

while ($stmt->fetch()){
    array_push($users, array("CourseName" => $name, "CourseId" => $id));
}
echo json_encode($users);
?>
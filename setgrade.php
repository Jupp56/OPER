<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('UPDATE CourseParticipants INNER JOIN Courses ON Courses.Id=CourseId SET Grade=? WHERE (CourseParticipants.Id=? AND CreatorId=?)');
$stmt->bind_param("diii", $grade, $relationid, $userid);

$grade = $_POST['Grade'];
$relationid = $_POST['RelationId'];
$userid = $_COOKIE['user'];

if ($stmt->execute()){
    header("Location: course.php?Id=".$courseid);
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
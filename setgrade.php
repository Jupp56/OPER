<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('UPDATE CourseParticipants SET Grade=? WHERE CourseId=? AND (SELECT CreatorId FROM Courses WHERE Id=?)=?');
$stmt->bind_param("diii", $grade, $courseid, $courseid, $userid);

$grade = $_POST['Grade'];
$courseid = $_POST['CourseId'];
$userid = $_COOKIE['user'];

if ($stmt->execute()){
    header("Location: course.php?Id=".$courseid);
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
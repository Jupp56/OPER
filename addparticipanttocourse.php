<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('INSERT INTO CourseParticipants (CourseId, ParticipantId) VALUES(IF((SELECT CreatorId FROM courses WHERE Id=?)=?, ?, -1), ?)');
$stmt->bind_param("iiii", $courseid, $userid, $courseid, $participantid);

$courseid = $_POST['CourseId'];
$userid = $_COOKIE['user'];
$participantid = $_POST['ParticipantId'];

if ($stmt->execute()){
    header("Location: course.php?Id=".$courseid);
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
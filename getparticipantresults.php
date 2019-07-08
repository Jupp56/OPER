<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT courses.Name AS CourseName, Grade FROM courseparticipants INNER JOIN courses ON courses.Id=courseparticipants.CourseId INNER JOIN participants ON participants.Id=courseparticipants.ParticipantId WHERE ParticipantId=?');
$stmt->bind_param("i", $_GET['ParticipantId']);
$stmt->bind_result($coursename, $grade);

$users = array();

while ($stmt->fetch()){
    $users[] = array(
        "CourseName" => $coursename,
        "Grade" => $grade
    );
}
echo json_encode($users);
?>
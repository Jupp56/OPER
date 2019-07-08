<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT Courses.Name, FirstName, LastName, DateOfBirth, CourseParticipants.Id FROM CourseParticipants INNER JOIN Participants ON Participants.Id=ParticipantId INNER JOIN Courses ON Courses.Id=CourseId WHERE CourseId=?');
$stmt->bind_param("i", $_GET['CourseId']);
$stmt->bind_result($coursename, $firstname, $lastname, $dateofbirth, $relationid);

$stmt->execute();

$users = array();

while ($stmt->fetch()){
    array_push($users, array(
        "CourseName" => $coursename,
        "FirstName" => $firstname,
        "LastName" => $lastname,
        "DateOfBirth" => $dateofbirth,
        "RelationId" => $relationid
    ));
}
echo json_encode($users);
?>
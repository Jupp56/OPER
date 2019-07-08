<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->query('SELECT courses.Name AS CourseName, Grade FROM courseparticipants INNER JOIN courses ON courses.Id=courseparticipants.CourseId INNER JOIN participants ON participants.Id=courseparticipants.ParticipantId WHERE ParticipantId=?');
$stmt->bind_param("i", $_GET['ParticipantId']);

$users = array();

while ($row = $stmt->fetch_assoc()){
    $users[] = $row;
}
echo json_encode($users);
?>
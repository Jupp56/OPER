<?php
require_once("constants.php");
require_once("auth.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare("SELECT CreatorId FROM Courses WHERE Id=?");
$stmt->bind_param("i", $_POST['CourseId']);
$stmt->bind_result($creatorid);

if ($stmt->execute()){
    $stmt->fetch();
    if ($creatorid != $_COOKIE['user']){
        header('HTTP/1.0 403 Forbidden');
        exit();
    }
    while ($stmt->fetch()){}
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
    exit();
}

$arr = json_decode($_POST['JsonData'], true);
$count = 0;
foreach ($arr as $row){
    $stmt = $mysqli->prepare('UPDATE CourseParticipants SET Grade=? WHERE Id=?');
    $stmt->bind_param('di', $row['Grade'], $row['RelationId']);

    if ($stmt->execute()){
        $count = $count + 1;
        while ($stmt->fetch()){}
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo $stmt->error;
        exit();
    }
}
header('Location: course.php?Id='.$courseid.'&message=Successfully%20updated '.$count.' entries.');
?> 
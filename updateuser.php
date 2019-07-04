<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare("UPDATE Users SET Username=?,FirstName=?,LastName=?,DateOfBirth=?,Mail=? WHERE Username=?");
$stmt->bind_param("ssssss", $username, $firstname, $lastname, $dateofbirth, $mail, $originalusername);

$username = $_POST['Username'];
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$dateofbirth = $_POST['DateOfBirth'];
$mail = $_POST['Mail'];
$originalusername = $_POST['OriginalUsername'];

if ($stmt->execute()){
    $count = $stmt->affected_rows;

    while ($stmt->fetch()){ };
    $stmt = $mysqli->prepare("UPDATE UserCourses SET Username=? WHERE Username=?");
    $stmt->bind_param("ss", $username, $originalusername);
    $stmt->execute();
    
    header('Location: adminpanel.php?message=Successfully%20updated%20'.$count.'%20entries.');
    exit();
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
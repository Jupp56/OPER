<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->query('SELECT * FROM Users');

$users = array();

if ($stmt->execute()){
    while ($row = $stmt->fetch_assoc()){
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
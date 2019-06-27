<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT Username FROM Users WHERE Username=?');

$stmt->bind_param("s", $username);
$username = $_POST['Username'];

if ($stmt->execute()){
    if ($stmt->fetch()){
        echo "Username taken";
        exit();
    }
    else {
        $stmt = $mysqli->prepare('INSERT INTO Users (Username, Hash, Salt) VALUES (?, ?, ?)');

        $stmt->bind_param("sss", $username, $hash, $salt);
        $salt = date("D M d, Y G:i");
        $hash = hash("sha256", $_POST['Password'].$salt);

        if ($stmt->execute()){
            echo "true";
        }
        else {
            header("HTTP/1.1 500 Internal Server Error");
            echo $stmt->error;
        }
    }
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
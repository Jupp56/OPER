<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT Hash, Salt FROM Users WHERE Username=?');

$stmt->bind_param("s", $username);
$stmt->bind_result($hash, $salt);

$username = $_POST['Username'];

if ($stmt->execute()){
    if (!$stmt->fetch()) {
		echo "User does not exist";
		exit();
	}
    $hashed = hash("sha256", $_POST['Password'].$salt);
    if ($hashed == $hash) echo "true";
    else echo "false";
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
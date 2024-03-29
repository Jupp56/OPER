<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT Hash, Salt, IsAdmin, Id FROM Users WHERE Username LIKE BINARY ?');

$stmt->bind_param("s", $username);
$stmt->bind_result($hash, $salt, $isAdmin, $userid);

$username = $_POST['Username'];

if ($stmt->execute()){
    if (!$stmt->fetch()) {
		echo "User does not exist";
		exit();
	}
	while ($stmt->fetch()){}
    $hashed = hash("sha256", $_POST['Password'].$salt);
    if ($hashed == $hash) {
        $token = bin2hex(random_bytes(64));
        $stmt = $mysqli->prepare('UPDATE Users SET Token=? WHERE Id=?');
        $stmt->bind_param("si", $token, $userid);
        if (!$stmt->execute()) {
            header("HTTP/1.1 500 Internal Server Error");
            echo $stmt->error;
        }
        setcookie("user", $userid);
        setcookie("token", $token);
        setcookie("username", $username);
        if ($isAdmin) header('Location: adminpanel.php');
        else header('Location: main.php');
        exit();
    }
    else {
        header('Location: index.php?message=Incorrect%20Password');
        exit();
    }
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
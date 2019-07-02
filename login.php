<?php
require_once("constants.php");

$mysqli = new mysqli(MYSQLI_IP, MYSQLI_USER, MYSQLI_PASS, MYSQLI_DB, MYSQLI_PORT);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare('SELECT Hash, Salt, IsAdmin FROM Users WHERE Username=?');

$stmt->bind_param("s", $username);
$stmt->bind_result($hash, $salt, $isAdmin);

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
		mysqli_report(MYSQLI_REPORT_ALL);
        $stmt = $mysqli->prepare('UPDATE Users SET Token=? WHERE Username=?');
        $stmt->bind_param("ss", $token, $username);
        if (!$stmt->execute()) {
            header("HTTP/1.1 500 Internal Server Error");
            echo $stmt->error;
        }
        header("Set-Cookie: user=$username");
		header("Set-Cookie: token=$token");
        if ($isAdmin) header('Location: adminpanel.php');
        else header('Location: main.php');
        exit();
    }
    else echo "false";
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo $stmt->error;
}
?>
<?php
include_once("../backends/connection-pdo.php");

if (!isset($_POST['email']) || !isset($_POST['password'])) {
	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';
	header('location: index.php');
	exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM admin WHERE email='$email'";
$query  = $pdoconn->prepare($sql);
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($res) != 0) {
    foreach ($res as $key) {
        $tmp_pass = $key['password'];
        $tmp_name = $key['name'];
        $tmp_id = $key['id'];
    }

    if (password_verify($password, $tmp_pass)) {
        session_start();
        $_SESSION['username'] = $tmp_name;
        $_SESSION['msg'] = "You have successfully Logged In!";
        header('location: dashboard.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Invalid Credentials!";
        header('location: index.php');
    }
} else {
    session_start();
    $_SESSION['msg'] = "Invalid Credentials!";
    header('location: index.php');
}

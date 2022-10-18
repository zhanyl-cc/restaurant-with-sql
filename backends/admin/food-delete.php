<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )){
        throw new Exception();
    } else {
        require_once('../connection-pdo.php' );
    }
} catch (Exception $e) {
	$_SESSION['msg'] = 'Some problem in the Server! Try after some time!';
	header('location: ../../admin/food-list.php');
	exit();
}

if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = 'Invalid ID!';
	header('location: ../../admin/food-list.php');
	exit();
} 

$id = $_REQUEST['id'];
$sql = "DELETE FROM food WHERE id = ?";
$query  = $pdoconn->prepare($sql);

if ($query->execute([$id])) {
    $_SESSION['msg'] = 'Food Deleted!';
    header('location: ../../admin/food-list.php');
} else {
    $_SESSION['msg'] = 'Some problem in the server! Please try again!';
    header('location: ../../admin/food-list.php');
}


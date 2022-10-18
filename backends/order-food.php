<?php
session_start();

try {
    if (!file_exists('connection-pdo.php' )){
        throw new Exception();
    } else {
        require_once('connection-pdo.php' );
    }
} catch (Exception $e) {
	$arr = [
	    'code' => 0,
        'msg'  => "There were some problem in the Server! Try after some time!"
    ];
	echo json_encode($arr);
	exit();
}
if (!isset($_SESSION['user']) || !isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "You must Log In First to Order Food!";
	header('location: ../foods.php');
	exit();
}
if (!isset($_REQUEST['id'])) {
	$_SESSION['msg'] = "Invalid food item! Please try again!";
	header('location: ../foods.php');
	exit();
}

date_default_timezone_set("Asia/Bishkek");
$food_id = $_REQUEST['id'];
$user_name = $_SESSION['user'];
$user_id = $_SESSION['user_id'];
$order_id = "RSTGF" . strval(mt_rand(100000, 999999));
$timest = date("Y-m-d H:i:s");
$sql = "INSERT INTO orders(order_id,user_id,food_id,user_name, timestamp) VALUES(?,?,?,?,?)";
$query  = $pdoconn->prepare($sql);

if ($query->execute([$order_id, $user_id, $food_id, $user_name, $timest])) {
	$_SESSION['msg'] = 'Order Placed! Your Order ID is : '.$order_id;
	header('location: ../foods.php');
} else {
	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';
	header('location: ../foods.php');
}
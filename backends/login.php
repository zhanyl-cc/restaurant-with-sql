<?php

try {
    if (!file_exists('connection-pdo.php' )){
        throw new Exception();
    } else {
        require_once('connection-pdo.php' );
    }
} catch (Exception $e) {
	$arr = [
	    'code'=> 0,
        'msg' => "Some problem in the Server! Try again!"
    ];
	echo json_encode($arr);
	exit();
}
if (!isset($_POST['email']) || !isset($_POST['password'])) {
	$arr = [
	    'code' => 0,
        'msg'  => "Invalid POST variables! Refresh the page!"
    ];
	echo json_encode($arr);
	exit();
}

$regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$regex_password = '/^[(A-Z)?(a-z)?(0-9)?!?@?#?-?_?%?]+$/';

if (!preg_match($regex_email, $_POST['email']) || !preg_match($regex_password, $_POST['password'])) {
	$arr = [
	    'code' => 0,
        'msg'  => "Whoa! Invalid Inputs!"
    ];
	echo json_encode($arr);
	exit();
} else {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE email=?";
	$query  = $pdoconn->prepare($sql);
	$query->execute([$email]);
	$arr_login=$query->fetchAll(PDO::FETCH_ASSOC);

	if (count($arr_login) != 0) {
		foreach ($arr_login as $key) {
			$tmp_pass = $key['password'];
			$tmp_name = $key['name'];
			$tmp_id = $key['id'];
		}
		if (password_verify($password, $tmp_pass)){
			session_start();
			$_SESSION['user'] = explode(" ", $tmp_name)[0];
			$_SESSION['user_id'] = $tmp_id;
			$arr = [
			    'code' => 1,
                'msg'  => "You are authenticated successfully!"
            ];
			echo json_encode($arr);
		} else {
			$arr = [
			    'code' => 0,
                'msg'  => "Invalid Password!"
            ];
			echo json_encode($arr);
			exit();
		}
	} else {
		$arr = [
		    'code' => 0,
            'msg'  => "No such Email ID found!"
        ];
		echo json_encode($arr);
		exit();
	}
}
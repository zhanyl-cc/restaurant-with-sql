<?php

try {
    if (!file_exists('../backends/connection-pdo.php' )){
        throw new Exception();
    } else {
        require_once('../backends/connection-pdo.php' );
    }
} catch (Exception $e) {
	$arr = [
	    'code' => 0,
        'msg'  => "Some problem in the Server! Try again!"
    ];
	echo json_encode($arr);
	exit();
}

if (!isset($_REQUEST['key'])) {
	$arr = [
	    'msg' => "User Data API",
        'dev' => "Yryskeldi Amanturov",
    ];
	echo json_encode($arr);
	exit();
} else {
	if (strcmp('yrys', $_REQUEST['key']) == 0) {
		$sql = "SELECT * FROM users;";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        $arr = $query->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($arr);
	} else {
		$arr = [
		    'code' => 0,
            'msg'  => "Invalid API Key!"
        ];
		echo json_encode($arr);
	}
	exit();
}
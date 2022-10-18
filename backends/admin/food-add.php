<?php
session_start();
try {
    if (!file_exists('../connection-pdo.php' )){
        throw new Exception();
    } else {
        require_once('../connection-pdo.php' );
    }
} catch (Exception $e) {
	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';
	header('location: ../../admin/food-list.php');
	exit();
}

if (!isset($_POST['name']) || !isset($_POST['desc'])) {
	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';
	header('location: ../../admin/food-list.php');
	exit();
}

$regex = '/^[(A-Z)?(a-z)?(0-9)]/';

if (!preg_match($regex, $_POST['name']) || !preg_match($regex, $_POST['desc'])) {
	$_SESSION['msg'] = 'Whoa! Invalid Inputs!';
	header('location: ../../admin/food-list.php');
	exit();
} else {
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$category = $_POST['category'];
	$filename = $_POST['filename'];

    $imagename = $_FILES['file']['name'];
    $imagetype = $_FILES['file']['type'];
    $imagetemp = $_FILES['file']['tmp_name'];
    $ext = pathinfo($imagename, PATHINFO_EXTENSION);

    $imagePath = "C://xampp/htdocs/Restaurant/images/foodimages/";

    if (is_uploaded_file($imagetemp)) {
        if (move_uploaded_file($imagetemp, $imagePath . $filename . '.' . $ext)){
            echo "Successfully uploaded your image.";
        } else {
            echo "Failed to move your image.";
        }
    } else {
        echo "Failed to upload your image.";
    }

	$sql = "INSERT INTO food(cat_id,fname,description,filename) VALUES(?,?,?,?)";
    $query  = $pdoconn->prepare($sql);

    if ($query->execute([$category, $name, $desc, $filename])){
    	$_SESSION['msg'] = 'Food Added!';
		header('location: ../../admin/food-list.php');
    } else {
    	$_SESSION['msg'] = 'Some problem in the server! Please try again!';
		header('location: ../../admin/food-list.php');
    }
}
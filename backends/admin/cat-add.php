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
	header('location: ../../admin/category-list.php');
	exit();
}
if (!isset($_POST['name']) || !isset($_POST['short_desc']) || !isset($_POST['long_desc'])) {
	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';
	header('location: ../../admin/category-list.php');
	exit();
}

$regex = '/^[(A-Z)?(a-z)?(0-9)?\-?\_?\.?\,?\s*]+$/';

if (
    !preg_match($regex, $_POST['name']) ||
    !preg_match($regex, $_POST['short_desc']) ||
    !preg_match($regex, $_POST['long_desc'])
){
	$_SESSION['msg'] = 'Invalid Inputs!';
	header('location: ../../admin/category-list.php');
	exit();
} else {
	$name = $_POST['name'];
	$short_desc = $_POST['short_desc'];
	$long_desc = $_POST['long_desc'];
    $filename = $_POST['filename'];

    $imagename = $_FILES['file']['name'];
    $imagetype = $_FILES['file']['type'];
    $imagetemp = $_FILES['file']['tmp_name'];
    $ext = pathinfo($imagename, PATHINFO_EXTENSION);

    $imagePath = "C://xampp/htdocs/Restaurant/images/catimages/";

    if (is_uploaded_file($imagetemp)) {
        if (move_uploaded_file($imagetemp, $imagePath . $filename . '.' . $ext)){
            echo "Successfully uploaded your image.";
        } else {
            echo "Failed to move your image.";
        }
    } else {
        echo "Failed to upload your image.";
    }
	$sql = "INSERT INTO categories(name,short_desc,long_desc,filename) VALUES(?,?,?,?)";
    $query  = $pdoconn->prepare($sql);

    if ($query->execute([$name, $short_desc, $long_desc, $filename])){
    	$_SESSION['msg'] = 'Category Added Successfully!';
		header('location: ../../admin/category-list.php');
    } else {
    	$_SESSION['msg'] = 'Some problem in the server! Please try again!';
		header('location: ../../admin/category-list.php');
    }
}
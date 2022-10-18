<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require('components/login-modal.php'); ?>
	<?php require('components/register-modal.php'); ?>
	<?php require('components/info-modal.php'); ?>
	<?php require('components/navbar.php'); ?>
	<?php require('components/carousel.php'); ?>
	<?php require('components/about-us.php'); ?>
	<?php require('components/description.php'); ?>
	<?php require('components/footer.php'); ?>
	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/loaders.js"></script>
    <script src="js/forms.js"></script>
</body>
</html>
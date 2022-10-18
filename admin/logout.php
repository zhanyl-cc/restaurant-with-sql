<?php
session_start();
session_destroy();
$_SESSION['msg'] = 'Logged out successfully!';
header('location: index.php');
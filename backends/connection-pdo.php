<?php
include('config.php');

try {
    $pdoconn = new PDO($dsn, $user, $password, array( PDO::ATTR_PERSISTENT => true ));
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    throw new Exception();
}




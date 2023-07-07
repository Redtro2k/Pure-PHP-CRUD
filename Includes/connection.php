<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "llacuna_db";

try{
    $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Connection failed: " + $e->getMessage());
}
?>
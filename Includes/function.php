<?php
require('connection.php');

function addUser($name, $phone, $gender, $civil_status){
    global $con;
    $sql = "INSERT INTO user (name, phone, gender, civil_status) VALUES (:name, :phone, :gender, :civil_status)";
    $statement = $con->prepare($sql);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':phone', $phone);
    $statement->bindParam(':gender', $gender);
    $statement->bindParam(':civil_status', $civil_status);

    $statement->execute();
}
function getAllUsers()
{
    global $con;
    $sql = "SELECT * FROM user";
    $statement = $con->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>
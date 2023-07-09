<?php
//controller
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
function getAllUsers(){
    global $con;
    $sql = "SELECT * FROM user";
    $statement = $con->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function deleteUserById($userid){
    global $con;
    $stmt = $con->prepare("DELETE FROM user WHERE id = :userid");
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
}
function edit($id){
    global $con;
    $stmt = $con->prepare("SELECT * FROM `user` WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?? null;
}
?>
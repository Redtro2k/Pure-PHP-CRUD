<?php
//controller
require('connection.php');
function store($name, $phone, $gender, $civil_status){
    global $con;
    $sql = "INSERT INTO user (name, phone, gender, civil_status) VALUES (:name, :phone, :gender, :civil_status)";
    $statement = $con->prepare($sql);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':phone', $phone);
    $statement->bindParam(':gender', $gender);
    $statement->bindParam(':civil_status', $civil_status);
    $statement->execute();
}
function update($arr, $id){
    global $con;
    try{
        $sql = "UPDATE user SET name=:name, phone=:phone, gender=:gender, civil_status=:civil_status WHERE id=:id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':name', $arr[0], PDO::PARAM_STR);
        $stmt->bindParam(':phone', $arr[1], PDO::PARAM_INT);
        $stmt->bindParam(':gender', $arr[2], PDO::PARAM_STR);
        $stmt->bindParam(':civil_status', $arr[3], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }catch(PDOExeption $e){
        echo "Update failed: " . $e->getMessage();
    }
}
function getAllUsers(){
    global $con;
    $sql = "SELECT * FROM user";
    $statement = $con->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function destroy($userid){
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
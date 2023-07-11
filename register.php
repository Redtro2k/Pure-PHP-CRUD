<?php 
session_start();
require('includes/function.php');
if(isset($_SESSION['id'])){
    header('Location: index.php');
}else{
    if(isset($_POST['register'])){
        $user = stripcslashes($_REQUEST['user']);
        $pass = stripcslashes($_REQUEST['pass']);
        register(array($user, $pass));
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="post">
        <input type="text" name="user">
        <br>
        <input type="password" name="pass">
        <br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
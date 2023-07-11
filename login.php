<?php 
session_start();
require('includes/function.php');
if(isset($_SESSION['id'])){
    header('Location: index.php');
}else{
    if(isset($_POST['login'])){
        $user = stripcslashes($_REQUEST['user']);
        $pass = stripcslashes($_REQUEST['pass']);
        $checkexisted = login(array($user, $pass));
        if($checkexisted){
            $_SESSION['id'] = $checkexisted['id'];
            header("Location: index.php");
        }else{
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>- <h3><a href="register.php">Register</a></h3>
    <form method="post">
        <input type="text" name="user">
        <br>
        <input type="password" name="pass">
        <br>
        <button type="submit" name="login">login</button>
    </form>
</body>
</html>
<?php
require_once ("header.php");
require_once("connection.php");

if(!empty($_POST)){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM users WHERE email='$email'AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $user=mysqli_fetch_assoc($result);
        $_SESSION['success']="Login successfully";
        header("location:index.php");
    }
    else{
        $_SESSION['error']="Login Failed";
        header('location:login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<blockquote>
    <h1>Login</h1>
    <form method="post" >
        Email:  <input type="email" name="email" required><br>
        <br>
        Password: <input type="text" name="password"required><br>
    <br>
        
        <button>Login</button>
    </form>
</blockquote>
</body>
</html>
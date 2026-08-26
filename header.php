<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .box{
        width:400px;
        display:flex;
        justify-content: space-evenly;
    }
</style>
<body>
    <div class="box">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="category.php"> Category</a>
    <a href="logout.php"> Log Out</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    </div>
    <hr>
    <?php if(isset($_SESSION['auth'])){?>
    <a>Welcome:<?php echo $_SESSION['auth']['name'];?></a>
    <a href="logout.php">Logout</a>
      <?php }else{?>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <?php 
    }  ?>
    </hr>
    <hr>
    <?php if(isset($_SESSION['success'])){
        ?>
        <h1><?php echo $_SESSION['success'];?></h1>
        <?php unset($_SESSION['success']);?>
        <?php
    }?>
    <?php if(isset($_SESSION['error'])){
        ?>
        <h1><?php echo $_SESSION['error'];?></h1>
        <?php unset($_SESSION['error']);?>
        <?php
    }?>

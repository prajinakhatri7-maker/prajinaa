<?php
require_once ("header.php");
require_once("connection.php");
$errors=[
    "name"=>"",
    "email"=>"",
    "password"=>"",
];
$olds=[
    "name"=>"",
    "email"=>"",
    "password"=>"",
];
if(!empty($_POST)){
//  if(empty($_POST['name'])){
//         $errors['name']="Name is required";
//     }
//     if(empty($_POST['email'])){
//         $errors['email']="Email is required";
//     }
//     if(empty($_POST['gender'])){
//         $errors['gender']="Gender is required";
//     }
foreach($_POST as $key=>$value){
    if(empty($value)){
       $errors[$key]="Please fill in $key field "; 
    }
    else{
        $olds[$key]=$value;
    }
}

}
if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $gender=$_POST['gender'];
    $sql="INSERT INTO users(name,email,password,gender)VALUES('$name','$email','$password','$gender')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Account create successfully";
        header("location:register.php");
    }
    else{
        $_SESSION['error']="Account Creation Failed";
        header('location:register.php');
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
    <h1>Create new account</h1>
    <form method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" value="<?php echo $olds['name']; ?>"><br>
        <?php echo $errors['name'];?><br>
        Email:  <input type="email" name="email" value="<?php echo $olds['email'];?>"><br>
        <?php echo $errors['email'];?><br>
        Password: <input type="text" name="password" value="<?php echo $olds['password'];?>"><br>
        <br>
        Gender: <select name="gender" required >
            <option value="">Select</option>
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="others">Others</option>
        </select>
        <br>
        <br>
<br>
        <button>Add Account</button>
    </form>
</blockquote>
</body>
</html>
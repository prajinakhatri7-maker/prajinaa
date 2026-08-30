<?php
require_once("header.php");
require_once("footer.php");
require_once("connection.php");
if(!empty($_POST)){
    $name=$_POST['name'];
    $sql="INSERT INTO category(name)VALUES('$name')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Category added successfully";
        header("location:manage-category.php");
    }
    else{
        $_SESSION['error']="Category addition failed";
        header('location:manage_category.php');
    }
}
$query="SELECT *FROM category";
$result=mysqli_query($conn,$query);
?>
<form action=""method="post">
    Category Name: <input type="text" name="name" required><br><br>
    <button>Add Category</button>
</form>
<hr>
<h1>Category List</h1>
<ul>
    <li>Category List</li>
    <?php foreach($result as $category){?>
    <li><?php echo $category['name'];?></li>
    <?php }?>
</ul>
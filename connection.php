<?php
$host="localhost";
$user="root";
$password="";
$dbname="rainbowecommerce";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    echo "Database not connected";
}
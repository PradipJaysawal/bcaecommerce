<?php
session_start();
if(isset($_POST['store']))
{
    $name = $_POST['name'];
    $priority = $_POST['priority'];

$qry = "INSERT INTO categories(name, priority) VALUES ('$name', '$priority')";

include '../includes/dbconnection.php';
$result=mysqli_query($conn,$qry);
if($result){
    $_SESSION['msg'] = "category added successfully";
    header('location: categories.php');
}else{
    echo "error adding category";
}
include '../includes/closeconnection.php';
}

//update......................................................

if(isset($_POST['update']))
{
    $id=$_POST['categoryid'];
    $name=$_POST['name'];
    $priority=$_POST['priority'];

    $qry="UPDATE categories SET name = '$name', priority=$priority WHERE id=$id";
    include '../includes/dbconnection.php';
$result=mysqli_query($conn,$qry);
if($result){
    $_SESSION['msg'] = "category updated successfully";
    header('location: categories.php');
}else{
    echo "error updating category";
}
include '../includes/closeconnection.php';
}

//delete..............................................................
if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $qry="DELETE FROM categories WHERE id=$id";

    include '../includes/dbconnection.php';
$result=mysqli_query($conn,$qry);
if($result){
    $_SESSION['msg'] = "category deleted successfully";
    header('location: categories.php');
}else{
    echo "error deleting category";
}
include '../includes/closeconnection.php';
}
?>
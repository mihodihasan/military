<?php
session_start();

if(!empty($_POST['troops'])||!empty($_POST['food'])||!empty($_POST['weapon'])||!empty($_POST['fuel'])||
    !empty($_POST['water'])){
    $sql="INSERT INTO `request`(`id`, `wapon`, `food`, `troops`, `water`, `fuel`) 
VALUES (NULL,'".$_POST['weapon']."','".$_POST['food']."','".$_POST['troops']."','".$_POST['water']."'
,'".$_POST['fuel']."')";
    include 'connection.php';
    $result=mysqli_query($con,$sql);
    if($result){
        header("Location: ../frontline/index.php?toast=t&status=Request Sent!");
    }else{
        echo 'failed';
    }
}



?>
<?php
$username="root";
$hostname="localhost";
$pass="";
$database="military_logistic";

$con=mysqli_connect($hostname,$username,$pass,$database);

if($con){
}else{
    echo "D";
}

?>
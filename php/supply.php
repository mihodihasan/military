<?php
session_start();

if(!empty($_POST['troops'])||!empty($_POST['food'])||!empty($_POST['weapon'])||!empty($_POST['fuel'])||
    !empty($_POST['water'])){
    include 'connection.php';
    $sql="SELECT * FROM storage WHERE type='0';";

    $result=mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($result);

    $sql="UPDATE `storage` SET `wapon`='".($row['wapon']-$_POST['weapon'])."',`food`='".
        ($row['food']-$_POST['food'])."',`troops`='".($row['troops']-$_POST['troops'])."',
`water`='".($row['water']-$_POST['water'])."',`fuel`='".($row['fuel']-$_POST['fuel'])."' WHERE type='0';";

    mysqli_query($con,$sql);

    $sql="SELECT * FROM storage WHERE type='1';";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $sql="UPDATE `storage` SET `wapon`='".($row['wapon']+$_POST['weapon'])."',`food`='".
        ($row['food']+$_POST['food'])."',`troops`='".($row['troops']+$_POST['troops'])."',
`water`='".($row['water']+$_POST['water'])."',`fuel`='".($row['fuel']+$_POST['fuel'])."' WHERE type='1';";

    mysqli_query($con,$sql);


}



?>
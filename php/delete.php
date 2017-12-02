<?php
session_start();
//if (isset($_SESSION)){
//    if ($_SESSION['email']!='admin@blood.com'){
//        header('Location: ../index.php');
//    }
//}else{
//    header('Location: ../index.php');
//}

if (!empty($_GET['id'])) {
    include 'connection.php';
    $id=$_GET['id'];
    $sql="SELECT * FROM storage WHERE type='0';";

    $result=mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($result);

    $sql="UPDATE `storage` SET `wapon`='".($row['wapon']+$_GET['weapon'])."',`food`='".
        ($row['food']+$_GET['food'])."',`troops`='".($row['troops']+$_GET['troops'])."',
`water`='".($row['water']+$_GET['water'])."',`fuel`='".($row['fuel']+$_GET['fuel'])."' WHERE type='1';";

    mysqli_query($con,$sql);
    $sql = "DELETE FROM request WHERE id='".$id."';";
    $result=mysqli_query($con,$sql);
    if ($result) {
        header('Location: ../view/index.php?toast=t&status=Request Supplied!');
    }else{
        header('Location: ../admin/index.php?toast=t&status=Error');
//        echo $sql;
    }
}
else{
    header('Location: ../admin/index.php?toast=t&status=Missing Information!');
//    echo $name.$email.$pass.$group.$address.$date;
}
?>
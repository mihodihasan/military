<?php
session_start();

        if(!empty($_POST['email'])){
            if(!empty($_POST['pass'])){
                $user_email=$_POST['email'];
                $user_pass=$_POST['pass'];
//                echo "<script>
//            openToast('Welcome');
//            </script>";
                include 'connection.php';
                $sql = "SELECT * FROM user WHERE email='" . $user_email ."' and password = '".$user_pass. "'";
                $result=mysqli_query($con,$sql);
//echo $user_email;
                if ($row= $result->fetch_assoc()) {
                    $_SESSION['is_login'] = true;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['user_id']=$row['id'];
                    $_SESSION['email']=$row['email'];

                    if($row['type']=='0'){
                        header('Location: ../basecamp/index.php?toast=t&status=Welcome!You Are Logged In');
                    }else{
                        header('Location: ../frontline/index.php?toast=t&status=Welcome!You Are Logged In');
                    }


                }else{
                    header('Location: ../index.php?toast=t&status=Login Failed!');
                }
            }
        }else{
            header('Location: ../index.php?toast=t&status=Not Filled Up Credentials');

        }
        ?>

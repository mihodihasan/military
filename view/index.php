<?php
session_start();
if(!$_SESSION['is_login']){
    header('Location: ../index.php?toast=t&status=You are not authorized.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Military Logistic Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/materialize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Military Logistic</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

            </ul>


            <ul class="nav navbar-nav navbar-right">

            </ul>
            <div id="myloginbtn" class="navbar-right">
                <form method="post" action="php/login.php" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="E-mail">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <ul class="list-group" id="side_ul">



            </ul>
        </div>
        <div class="col-sm-9 text-left">
            <!--actual content-->

            <h3>Requests</h3>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Troops</th>
                    <th>Food</th>
                    <th>Fuel</th>
                    <th>Weapon</th>
                    <th>Water</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>


                <?php
                include '../php/connection.php';
                $sql='SELECT * FROM request;';
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['troops'];?></td>
                    <td><?php echo $row['food'];?></td>
                    <td><?php echo $row['fuel'];?></td>
                    <td><?php echo $row['wapon'];?></td>
                    <td><?php echo $row['water'];?></td>
                    <td><a href="../php/delete.php?id=<?php echo $row['id'];?>&troops=<?php echo $row['troops'];?>&food=<?php echo $row['food'];?>&water=<?php echo $row['water'];?>&weapon=<?php echo $row['wapon'];?>&fuel=<?php echo $row['fuel'];?>">Supply</a></td>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br>
<footer class="navbar-fixed-bottom container-fluid text-center">
    <p>All rights Reserved To Company</p>
    <p>Copyrights &copy;2017</p>
</footer>

<!--login btn chng-->
<?php
if(!empty($_SESSION)){ ?>
    <script type='text/javascript'>
        document.getElementById('myloginbtn').innerHTML="<a href=\"../php/logout.php\" class=\"navbar-brand\">Logout,<?php echo $_SESSION['name'];?></a>";
    </script>
<?php }
?>
<!--        calling a toast -->
<?php
if(isset($_GET['toast'])){ ?>
    <script type="text/javascript">
        Materialize.toast('<?php echo $_GET['status']?>', 3000, 'rounded');

    </script>

<?php }
?>


<!--Add extra menu for admin-->
<?php
if (!empty($_SESSION)){
    if($_SESSION['is_login']){
        if($_SESSION['email']=='admin@blood.com'){ ?>
            <script>
                var li=document.createElement('li');
                li.classList.add('list-group-item');
                var anchor=document.createElement('a');
                anchor.href='./admin/index.php';
                anchor.innerHTML='Admin Panel';
                li.appendChild(anchor);
                document.getElementById('side_ul').appendChild(li);
                //                <li class="list-group-item"><a href="../ad">Home</a></li>
            </script>
        <?php }
    }
}
?>

<!--<script type="text/javascript" src="js/script.js"></script>-->



</body>
</html>

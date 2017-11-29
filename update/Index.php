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

                <li class="list-group-item"><a href="../view/index.php">View Requests</a></li>
                <li class="list-group-item"><a href="../view/index.php">Update Reinforcement</a></li>


            </ul>
        </div>
        <div class="col-sm-9 text-left">
            <!--actual content-->

            <form action="../php/Update.php" method="post">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email">Troops</label>
                        <input type="text" name="troops" class="form-control" id="email" placeholder="No. Of Troops">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pass">Weapon</label>
                        <input type="text" name="weapon" class="form-control" id="pass" placeholder="No. Of Weapon">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pass">Food</label>
                        <input type="text" name="food" class="form-control" id="pass" placeholder="Total Food">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Fuel</label>
                        <input type="text" name="fuel" class="form-control" id="email" placeholder="Fuel Tank">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pass">Water</label>
                        <input type="text" name="water" class="form-control" id="pass" placeholder="Amount Of Water Gallon">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary right" style="float: right;">Update</button>
            </form>


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



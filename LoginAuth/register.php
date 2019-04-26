<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Auth | Register</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include 'nav_bar.php';
session_start();
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
            if(isset($_SESSION['error'])){
                ?>
                <div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span><?php echo $_SESSION['error']?></div>
                <?php
            }
            unset($_SESSION['error']);
            if(isset($_SESSION['success'])){
                ?>
                <div class="alert alert-success"><span class="glyphicon glyphicon-alert"></span><?php echo $_SESSION['success']?></div>
                <?php
            }
            unset($_SESSION['success']);
            ?>
    <h1 class="text-center text-primary"> Login Auth</h1>
    <div class="text-danger text-center">Register</div>
    <form method="post" action="post_register.php">
        <div class="form-group">
            <span class="glyphicon glyphicon-user"></span>
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <span class="glyphicon glyphicon-envelope"></span>
            <label for="email" class="control-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <span class="glyphicon glyphicon-lock"></span>
            <label for="password" class="control-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <span class="glyphicon glyphicon-lock"></span>
            <label for="password_again" class="control-label"> Password Again</label>
            <input type="password" name="password_again" id="password_again" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary"> Sign Up</button>
        </div>

    </form>
            <span class="glyphicon glyphicon-ok"></span> Account already exist?<a href="login.php">Login</a>
        </div>
    </div>
</div>


<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>
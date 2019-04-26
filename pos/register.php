<?php session_start()?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | Register</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'nav_bar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <?php
            if (isset($_SESSION['err'])){
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err'] ?></div>
                <?php
            }
            unset($_SESSION['err']);
            ?>

            <div class="panel panel-primary">
                <div class="panel panel-heading">Register</div>
                <div class="panel-body">
                    <form method="post" action="post_register.php">
                        <div class="form-group">
                            <label for="name" class="control-label"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label"><span class="glyphicon glyphicon-envelope"></span> Email Address</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label"><span class="glyphicon glyphicon-lock"></span> Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_again" class="control-label"><span class="glyphicon glyphicon-lock"></span>Password Again</label>
                            <input type="password" name="password_again" id="password_again" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Signup</button>
                        </div>
                    </form>
                </div>
            </div>            <p>Already have an account?>><a href="login.php">Login</a> </p>
        </div>
    </div>
</div>

<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>
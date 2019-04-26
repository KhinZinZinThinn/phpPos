<?php
include 'user_config.php';

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_again=$_POST['password_again'];

$users=new User();
$users->register($name,$email,$password,$password_again);
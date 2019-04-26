<?php
include 'order_config.php';

$customer=$_POST['customer'];
$order=new Order();
$order->checkout($customer);
header("location: index.php");


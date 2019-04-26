<?php
include 'cat_config.php';
$cat_name=$_POST['cat_name'];

$category=new Category();
$category->insert($cat_name);




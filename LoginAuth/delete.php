<?php
include 'cat_config.php';
$book_name=$_GET['book_name'];
$book=new Category();
$book->delBooks($book_name);

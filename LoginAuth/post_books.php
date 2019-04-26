<?php
include 'cat_config.php';

$book_name=$_POST['book_name'];
$book_cover=$_FILES['book_cover'];
$book_file=$_FILES['book_file'];
$cat_id=$_POST['cat_id'];

$books=new Category();
$books->newBooks($book_name,$book_cover,$book_file,$cat_id);

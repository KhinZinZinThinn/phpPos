<?php
include "product_config.php";
$id=$_GET['id'];
$pd=new Products();
$pd->deleteProduct($id);
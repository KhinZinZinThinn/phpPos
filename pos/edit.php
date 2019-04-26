<?php
include 'auth.php';
$id=$_GET['id'];
include 'product_config.php';
$pds=new Products();
$pd=$pds->getProductById($id)->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | Edit Products</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'nav_bar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include 'side_bar.php'?>
        </div>

        <h4><a href="product.php"><span class="glyphicon glyphicon-backward"></span> Back</a> </h4>
        <div class="col-md-9">
            <?php
            if (isset($_SESSION['err'])){
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err'] ?></div>
                <?php
            }
            unset($_SESSION['err']);

            if (isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['info'] ?></div>
                <?php
            }
            unset($_SESSION['info']);
            ?>
            <div class="page-header"><h2>Edit Products (<?php echo $pd['p_name'] ?>)</h2></div>
            <div class="container">
                <form action="post_update_product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $pd['id']?>" name="id" id="id">

                    <div class="form-group">
                        <label for="name" class="control-label">Product Name</label>
                        <input type="text" value="<?php echo $pd['p_name'] ?>" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type="number" value="<?php echo $pd['price']?>" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="images" class="control-label">Image</label>
                        <input type="file" name="images" id="images" class="form-control" style="height: auto">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>
<?php
include 'auth.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-       width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | Products</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'nav_bar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include 'side_bar.php'?>
        </div>
        <div class="col-md-9">
            <?php include 'product_config.php'?>

            <div class="page-header"><h2>Products</h2></div>
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Create User</th>
                    <th>Created Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $product=new Products();
                $products=$product->getProducts();
                foreach ($products as $row):
                    ?>
                    <tr>
                        <td><img src="products/<?php echo $row['images']?>" style="width: 50px; height: 50px" class="img-circle"> </td>
                        <td><?php echo $row['p_name'] ?></td>
                        <td><?php echo $row['price']?> MMK</td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo date('d/M/Y, h:i A',strtotime($row['created_at'])) ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id'] ?>"> Edit</a></td>
                        <td><a href="get_delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr>
                    <?php
                endforeach;
                ?>

            </table>

        </div>
    </div>
</div>


<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>
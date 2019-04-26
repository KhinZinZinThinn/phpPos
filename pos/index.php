<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | Home</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'nav_bar.php' ?>
<div class="container">
    <div class="row">
        <form method="get" action="index.php" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input name='q' type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Products</div>
                <div class="panel-body">
                    <?php
                    include 'product_config.php';
                    $q=$_GET['q'];
                    $pds=new Products();
                    if($q){
                        $row=$pds->getSearch($q);
                    }else{
                        $row=$pds->getProducts();
                    }
                    foreach ($row as $rows){
                        ?>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="products/<?php echo $rows['images'] ?>" style="width: 100px; height: 80px" class="img-rounded">
                                <p class="text-center text-primary"><strong><?php echo $rows['p_name'] ?></strong></p>
                                <p class="text-center"><small><?php echo $rows['price'] ?>mmk</small></p>
                                <a href="add_to_cart.php?id=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="col-md-4">
           <div class="panel panel-primary">
               <div class="panel-heading "><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</div>
               <div class="panel-body">
                   <?php if(isset($_SESSION['cart'])){
                       ?>
                   <table class="table">
                       <tr>
                           <td>Name</td>
                           <td>Price</td>
                           <td>Qty</td>
                           <td>Amount</td>
                       </tr>
                       <?php
                       $totalAmount=0;
                       foreach ($_SESSION['cart'] as $id=>$qty){
                           $myOrder=$pds->getCart($id);
                           foreach ($myOrder as $order) {
                               $totalAmount+=$order['price']*$qty;
                               ?>
                               <tr>
                                   <td><?php echo $order['p_name'] ?></td>
                                   <td><?php echo $order['price']?></td>
                                   <td><?php echo $qty?></td>
                                   <td><?php echo $order['price']* $qty?></td>
                               </tr>
                               <?php
                           }
                       }
                       if ($totalAmount>0){
                           ?>
                           <tr>
                               <td colspan="3" class="text-center">Total Amount</td>
                               <td><?php echo $totalAmount ?></td>
                           </tr>
                           <?php
                       }
                       ?>
                   </table>
                   <a href="clear_cart.php" class="text-danger">&times; Cancel <br> <br></a>

                       <form method="post" action="post_checkout.php">
                           <div class="form-group">
                               <label for="customer" class="control-label">Customer Name</label>
                               <input type="text" name="customer" id="customer" class="form-control">
                           </div>
                           <div class="form-group">
                               <button type="submit" class="btn btn-primary">Check Out</button>
                           </div>
                       </form>
                       <?php
                   } else {
                       ?>
                       <div class="alert alert-danger">No Item on your Shopping Cart!!</div>
                       <?php
                   }?>
               </div>
           </div>
        </div>
    </div>
</div>


<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>
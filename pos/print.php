<?php
include 'order_config.php';
$id=$_GET['id'];
$order=new Order();
$row=$order->getOrderById($id)->fetch(PDO::FETCH_ASSOC);
?>

<?php
include 'auth.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | Print</title>
    <link href="boostrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <img src="apple.jpg" style="width: 100px" class="img-circle"> <h2 class="text-center" style="display: inline"> Fruit and Food Shop</h2>
            <p class="text-center"><strong> No.222 Main Road, Thaton</strong> </p>
            <p> Invoice ID: <?php echo $row['id'] ?></p>
            <p> Customer Name: <?php echo $row['customer'] ?></p>
            <?php
            $order_id=$row['id'];
            $order_item=$order->getOrder_item($order_id);
            $totalAmt=0;
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <?php
                foreach ($order_item as $od_item){
                    $totalAmt+=$od_item['price']*$od_item['qty'];
                    ?>
                    <tr>
                        <td><?php echo $od_item['item_name'] ?></td>
                        <td><?php echo $od_item['price'] ?></td>
                        <td><?php echo $od_item['qty'] ?></td>
                        <td><?php echo $od_item['price']* $od_item['qty'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="3" class="text-center"><strong>Total Amount</strong></td>
                    <td> <?php echo $totalAmt ?></td>
                </tr>
            </table>

<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>

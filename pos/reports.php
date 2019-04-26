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
    <title>POS | Reports</title>
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
            <?php
            include "order_config.php";
            $myOrder=new Order();
            $order=$myOrder->getOrders();
            foreach ($order as $od):
                ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                     Invoice ID : <?php echo $od['id'] ?> ,
                        Customer Name : <?php echo $od['customer'] ?> ,
                        Date :<?php echo date('d-M-y : h:i A ',strtotime($od['created_at'])) ?>
                    </div>
                    <div class="panel-body">
                        <?php
                        $order_id=$od['id'];
                        $order_item=$myOrder->getOrder_item($order_id);
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
                    </div>
                    <div class="panel-footer">
                        <a target="_blank" href="print.php?id=<?php echo $od['id'] ?>"><span class="glyphicon glyphicon-print"></span></a>
                    </div>
                </div>
                <?php
            endforeach;
            ?>

        </div>
    </div>
</div>


<script src="boostrap/js/jQuery.js"></script>
<script src="boostrap/js/bootstrap.js"></script>
</body>
</html>
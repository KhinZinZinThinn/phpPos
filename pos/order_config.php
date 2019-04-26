<?php
session_start();
include 'db_config.php';

class Order extends DB{
    public function checkout($customer){
        $sql="insert into myOrder (customer,created_at) values ('$customer',now())";
        $this->db->query($sql);

        $order_id=$this->db->lastInsertId();

        foreach ($_SESSION['cart'] as $id=>$qty) {
            $get_sql="select * from products where id in ($id)";
            $get_row=$this->db->query($get_sql);
            foreach ($get_row as $myRow) {
                $item_name=$myRow['p_name'];
                $price=$myRow['price'];
                $sql="insert into order_item (item_name, price, qty, order_id) values ('$item_name','$price','$qty','$order_id') ";
                $this->db->query($sql);
                unset($_SESSION['cart']);
                header("location: index.php");
            }

        }

    }

    public function getOrders(){
        $sql="select * from myOrder ORDER by id desc";
        return $this->db->query($sql);
    }

    public function getOrder_item($order_id){
        $sql="select * from order_item where order_id in ($order_id)";
        return $this->db->query($sql);
    }

    public function getOrderById($id){
        $sql="select * from myOrder where id='$id'";
        return $this->db->query($sql);
    }
}
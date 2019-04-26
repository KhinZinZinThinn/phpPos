<?php
session_start();
include 'db_config.php';

class Products extends DB{

    public function newProduct($name,$price,$images){
        $img_name=$images['name'];
        $img_tmp_name=$images['tmp_name'];
        if ($name){
            if ($price){
                if ($img_name){
                    $user_id=$_SESSION['user_id'];
                    $sql="insert into products (p_name, price, user_id, images, created_at) values ('$name','$price','$user_id','$img_name', now())";
                    $this->db->query($sql);
                    move_uploaded_file($img_tmp_name,"products/$img_name");
                    $_SESSION['info']="The product info are successfully inserted";
                    header("location: new-product.php");

                }else{
                    $_SESSION['err']="The image field is required";
                    header("location: new-product.php");
                }

            }else{
                $_SESSION['err']="The product price field is required";
                header("location: new-product.php");
            }

        }else{
            $_SESSION['err']="The product name field is required";
            header("location: new-product.php");
        }
    }

    public function getProducts(){
        $sql="select users.*, products.* from products left join users on users.id=products.user_id";
        return $this->db->query($sql);
    }

    public function getProductById($id){
       $sql="select * from products where id='$id'";
       return $this->db->query($sql);
    }

    public function updateProduct($id,$p_name,$price,$images){
        $img_name=$images['name'];
        $img_tmp_name=$images['tmp_name'];
        if ($img_name){
            $myData="select images from products where id='$id'";
            $row=$this->db->query($myData)->fetch(PDO::FETCH_ASSOC);
            $db_images=$row['images'];
            unlink("products/$db_images");
            $sql="update products set p_name='$p_name', price='$price', images='$img_name',user_id= where id='$id'";
            move_uploaded_file($img_tmp_name,"products/$img_name");
        }else{
            $sql="update products set p_name='$p_name', price='$price',created_at=now() where id='$id'";
        }
        $this->db->query($sql);
        header("location: product.php");


    }

    public function deleteProduct($id){
        $sql="select * from products where id='$id'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $img=$row['images'];
        unlink("products/$img");

        $del_sql="delete from products where id='$id'";
        $this->db->query($del_sql);
        header("location: product.php");

    }

    //search products on index page typing any letters
    public function getSearch($q){
        $sql="select * from products where p_name like '%$q%'";
        return $this->db->query($sql);
    }

    public function getCart($id){
        $sql="select * from products where id in ($id)";
        return $this->db->query($sql);
    }
}

<?php
Class MyPublic{
    public function __construct()
    {
        try{
            $this->db=new PDO('mysql:host=localhost; dbname=phpAuth', 'root','root');
        }catch (PDOException $e){
            die($e);
        }
    }

    public function getCategory(){
        $sql="select * from category ";
        return $this->db->query($sql);
    }

    public function getBook($cat_id){
        if ($cat_id){
            $sql="select * from books where cat_id='$cat_id' order by id desc";
        }else{
            $sql="select * from books order by id desc";
        }
        return $this->db->query($sql);
    }

    public function searchBooks($book_name){
        $sql="select * from books where book_name like '%$book_name%'";
        return $this->db->query($sql);
    }


}
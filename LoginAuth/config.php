<?php
session_start();
Class User{
    public function __construct()
    {
        try{
            $this->db=new PDO('mysql:host=localhost; dbname=phpAuth', 'root','root');

        }catch (PDOException $e){
            die("Connection fail to database");
        }
    }

    public function login($email,$password){
        if($email){
            $userEmail="select email,name, password from users where email='$email'";
            $db_email=$this->db->query($userEmail)->fetch(PDO::FETCH_ASSOC);
            if($password){
                $db_password=$db_email['password'];
                $enc_password=md5($password);
                if($db_password==$enc_password){
                    $_SESSION['login']=$db_email['name'];
                    header('location: dashboard.php');
                }else{
                    $_SESSION['error']="email and password do not match";
                    header('location: login.php');
                }
            }else{
                $_SESSION['error']="Password field is required";
                header('location: login.php');
            }

        }else{
            $_SESSION['error']="Email field is required";
            header('location: login.php');
        }


    }
    public function register($name,$email,$password,$password_again){
        //echo $name,$email,$password_again,$password;
        if($name){
            if($email){
                $user="select email from users where email='$email'";
                $db_email=$this->db->query($user)->fetch(PDO::FETCH_ASSOC);
                if(!$db_email){
                   if($password){
                       if($password_again){
                           if($password==$password_again){
                               $enc_password=md5($password);
                               $sql= "insert into users (name, email, password, created_at) values ('$name', '$email', '$enc_password', now())";
                               $this->db->query ($sql);
                               $_SESSION['success']="The user account have been created.";
                               header("location: register.php");

                           }
                           else{
                               $_SESSION['error']="Password and Password Again must match";
                               header("location: register.php");
                           }

                       }else{
                           $_SESSION['error']="Password again field is required";
                           header("location: register.php");
                       }

                   }else{
                       $_SESSION['error']="Password field is required";
                       header("location: register.php");
                   }
                }else{
                    $_SESSION['error']="Email address is already exist";
                    header("location: register.php");
                }

            }else{
                $_SESSION['error']="Email field is required";
                header('location:register.php');
            }

        }else{
            $_SESSION['error']="Name field is required";
            header('location:register.php');
        }


    }
}
<?php
include 'db_config.php';
session_start();

class User extends DB{

    public function register($name,$email,$password,$password_again){
        if($name){
            if($email){
                $sql_email="select email from users where email='$email'";
                $db_email=$this->db->query($sql_email)->fetch(PDO::FETCH_ASSOC);
                if (!$db_email){
                    if ($password){
                        if ($password_again){
                            if ($password==$password_again){
                                $enc_password=md5($password);
                                $insert="insert into users(name,email,password,created_at) values('$name','$email','$enc_password',now())";
                                $result=$this->db->query($insert);
                                if ($result){
                                    header("location: login.php");
                                }else{
                                    $_SESSION['err']="The user account sign up have been failed!";
                                    header("location: register.php");
                                }
                            }else{
                                $_SESSION['err']="Password and password again do not match";
                                header("location: register.php");
                            }
                        }  else{
                            $_SESSION['err']="Password again field is required";
                            header("location: register.php");
                        }
                    }else{
                        $_SESSION['err']="Password field is required";
                        header("location: register.php");
                    }
                } else{
                    $_SESSION['err']="This email is already registered!";
                    header("location: register.php");
                }
            }else{
                $_SESSION['err']="Email address field is required";
                header("location: register.php");
            }
        }else{
            $_SESSION['err']="Username field is required";
            header("location: register.php");
        }

    }

    public function login($email,$password){
        if ($email){
            $sql="select id, name, email, password from users where email='$email'";
            $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
            if ($row['email']){
                if ($password){
                    $enc_password=md5($password);
                    $db_password=$row['password'];
                    if ($enc_password==$db_password){
                        $_SESSION['login']=$row['name'];
                        $_SESSION['user_id']=$row['id'];
                        header("location:home.php");

                    }else{
                        $_SESSION['err']="Email and password do not match";
                        header("location: login.php");
                    }

                }else{
                    $_SESSION['err']="Password field is required";
                    header("location: login.php");
                }

            }else{
                $_SESSION['err']="The selected email is not found on server!!!";
                header("location: login.php");
            }

        }else{
            $_SESSION['err']="Email field is required";
            header("location: login.php");
        }

    }
}
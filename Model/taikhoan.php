<?php
    session_start();
    function dangnhap($username,$password){
        $error=array();
        $sql="SELECT * FROM `user` WHERE `username`='$username' and `password`='$password'";
        $taikhoan=pdo_query_one($sql);
        if($taikhoan!=false){
            $_SESSION['nameuser']=$taikhoan['name'];
            $_SESSION['iduser']=$taikhoan['id'];
            if($taikhoan['role']==1){   //Nếu là người dùng
                header("location: ../index.php");
                exit();
            }else if($taikhoan['role']==2){//Nếu là shipper
                header("location: ../index.php");
                exit();
            }else if($taikhoan['role']==3){//Nếu là kho
                header("location: ../index.php");
                exit();
            }else if($taikhoan['role']==4){//Nếu bị ban
                $error['block']="Tài khoản của bạn đã bị hạn chế!";
            }else{                          //Admin
                header("location: ../view/admin/index.php");
                exit();
            }
        }else{
            $error['errorAccount']="Sai tài khoản hoặc mật khẩu!";
        }
        return $error;
    }
    function dangxuat(){
        session_destroy();
        header("location: ../index.php");
    }
?>
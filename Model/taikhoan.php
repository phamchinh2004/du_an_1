<?php
    session_start();
    function dangnhap($username,$password){
        $error=array();
        $sql="SELECT * FROM `user` WHERE `username`='$username' and `password`='$password'";
        $taikhoan=pdo_query_one($sql);
        if($taikhoan!=false){
            $_SESSION['nameuser']=$taikhoan['name'];
            $_SESSION['iduser']=$taikhoan['id'];
            if($taikhoan['role']==1){
                header("location: index.php");
                exit();
            }else if($taikhoan['role']==2){
                header("location: index.php");
                exit();
            }else if($taikhoan['role']==3){
                header("location: index.php");
                exit();
            }else if($taikhoan['role']==4){
                $error['block']="Tài khoản của bạn đã bị hạn chế!";
            }else{
                header("location: view/admin/index.php");
                exit();
            }
        }else{
            $error['errorAccount']="Sai tài khoản hoặc mật khẩu!";
            header("location: view/login/login.php?act=login");
        }
        return $error;
    }
?>
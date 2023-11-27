<?php
    include "Model/pdo.php";
    include "Model/taikhoan.php";
    include "view/header.php";
    if(isset($_GET['act']) && ($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "login":
                include "View/login/login.php";
                break;
            case "sendLogin":
                if(isset($_POST['btnsubmit'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $thongbao=dangnhap($username,$password);
                    include "view/trangchu.php";
                }
                break;
        }
    }else{
        include "view/trangchu.php";
    }
    include "view/footer.php";
?>

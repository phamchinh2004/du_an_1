<?php
    include "model/pdo.php";
    include "model/taikhoan.php";
    include "view/header.php";
    if(isset($_GET['act']) && ($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                include "view/sanpham.php";
                break;
            case "user":
                include "view/user/user.php";
                break;
            case "doimk":
                include "view/user/doimk.php";
                break;
            case "updatetk":
                include "view/user/update.php";
                break;
            case "login":
                include "view/login/login.php";
                break;
            case "sendLogin":
                if(isset($_POST['btnsubmit'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $thongbao=dangnhap($username,$password);
                    if(!empty($thongbao)){
                        include "view/login/login.php";
                    }
                }
                break;
            case "dangxuat":
                dangxuat();
                break;
            default:
            include "view/trangchu.php";
            break;
        }
    }else{
        include "view/trangchu.php";
    }
    if(isset($_GET['act'])){
        if(($_GET['act']!="login") || ($_GET['act']=="") || ($_GET['act']!="sendLogin")){
            include "view/footer.php";
        }
    }else{
        include "view/footer.php";
    }
?>

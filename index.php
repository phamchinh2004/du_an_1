<?php
    include "Model/pdo.php";
    include "Model/taikhoan.php";
    include "view/header.php";
    if(isset($_GET['act']) && ($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "user":
                include "View/user/user.php";
                break;
            case "doimk":
                include "View/user/doimk.php";
                break;
            case "updatetk":
                include "View/user/update.php";
                break;
            case "login":
                include "View/login/login.php";
                break;
            case "sendLogin":
                if(isset($_POST['btnsubmit'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $thongbao=dangnhap($username,$password);
                    if(!empty($thongbao)){
                        include "View/login/login.php";
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

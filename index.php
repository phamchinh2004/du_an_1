<?php
include "model/pdo.php";
include "model/taikhoan.php";
include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
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
            if (isset($_POST['btnsubmit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                dangnhap($username, $password);
                if (isset($_SESSION['errorLogin'])) {
                    include "view/login/login.php";
                }
            }
            break;
        case "signUp":
            include "view/login/register.php";
            break;
        case "sendRegister":
            if (isset($_POST['btnsubmit'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $avatar = $_FILES['avatar']['name'];
                $avatar_tmp = $_FILES['avatar']['tmp_name'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $role = "";
                $target_dir = "public/image/";
                $target_file = $target_dir . basename($avatar);
                if (!empty($avatar)) {
                    if (move_uploaded_file($avatar_tmp, $target_file)) {
                        $ImgSusc = "Image Uploaed Successfully";
                    } else {
                        $ImgFail = "Image Upload Failed";
                    }
                }
                if (!isset($ImgFail)) {
                    $mess = addTkDone($name, $username, $password, $repassword, $avatar, $email, $tel, $address, $role);
                    if (empty($mess)) {
                        $_SESSION['addTkDone'] = "Tạo tài khoản thành công, bạn có thể đăng nhập ngay bây giờ!";
                        header("location: index.php?act=login");
                    } else {
                        include "view/login/register.php";
                    }
                } else {
                    $_SESSION['imgFail'] = $ImgFail;
                    include "view/login/register.php";
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
} else {
    include "view/trangchu.php";
}
if (isset($_GET['act'])) {
    if (($_GET['act'] != "login") || ($_GET['act'] == "") || ($_GET['act'] != "sendLogin")) {
        include "view/footer.php";
    }
} else {
    include "view/footer.php";
}

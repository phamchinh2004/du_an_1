<?php
include "model/pdo.php";
include "model/taikhoan.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangchu':
            if (isset($_GET['iddm']) && ($_GET['iddm'] != "")) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listdm = listDanhMuc();
            $listSpgg = listSpGG();
            $listSp = loadAllSpBanChay();
            $listSpHome = listSpHome($iddm);
            include 'view/trangchu.php';
            break;
        case 'listsptrangchu':
            if (isset($_GET['iddm']) && $_GET['iddm'] != "") {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listsp = loadAllSpUser($iddm);
            $listdm = listDanhMuc();
            include "view/sptrangchu.php";
            break;
        case "cart":
            if (isset($_SESSION['iduser'])) {
                $listSpCart = listCart($_SESSION['iduser']);
                include "view/cart.php";
            } else {
                $needLogin = "Bạn cần phải đăng nhập để xem giỏ hàng";
                include 'view/trangchu.php';
            }
            break;
        case "formthanhtoan":
            if (isset($_POST['btnOrder'])) {
                $idsp = $_POST['product_id'];
                $soluong = $_POST['quantity'];
                $selectSp = selectSp($idsp, $soluong);
                if (isset($_SESSION["errorSl"])) {
                    header("location:index.php?act=cart");
                } else {
                    include "view/formthanhtoan.php";
                }
            } else {
                include "view/formthanhtoan.php";
            }
            break;
        case "sanpham":
            if (isset($_GET['iddm']) && $_GET['iddm'] != "") {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listsp = loadAllSpUser($iddm);
            $listdm = listDanhMuc();
            include "view/sptrangchu.php";
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
            header("Location: index.php?act=trangchu");
            break;
    }
} else {
    header("Location: index.php?act=trangchu");
}
if (isset($_GET['act'])) {
    if (($_GET['act'] != "login") || ($_GET['act'] == "") || ($_GET['act'] != "sendLogin")) {
        include "view/footer.php";
    }
} else {
    include "view/footer.php";
}

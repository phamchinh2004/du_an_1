<?php
include "model/pdo.php";
include "model/taikhoan.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/donhang.php";
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
        case 'chitietsp':
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $idsp = $_GET['idsp'];
                $sanphamDetail = spDetail($idsp);
                include "view/chitietSp.php";
            } else {
                header("location: index.php?act=trangchu");
            }
            break;
        case "cart":
            if (isset($_SESSION['iduser'])) {
                $listSpCart = listCart($_SESSION['iduser']);
                include "view/cart.php";
            } else {
                header("location: index.php?act=login");
            }
            break;
        case "addtocart":
            if (isset($_SESSION['iduser'])) {
                if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                    $idsp = $_GET["idsp"];
                    addToCartDone($idsp);
                    header("location: index.php?act=cart");
                } else {
                    header("location: index.php?act=trangchu");
                }
            } else {
                header("location: index.php?act=login");
            }
            break;
        case "updateQuantity":
            if (isset($_POST['btnSoluong'])) {
                $idsp = $_POST['idsp'];
                $soluong = $_POST['soluong'];
                updateQuantity($idsp, $soluong);
                header('location:index.php?act=cart');
            } else {
                header('location:index.php?act=cart');
            }
            break;
        case "deleteSpCart":
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $idsp = $_GET["idsp"];
                deleteSpCart($idsp);
                $mess = "Xóa sản phẩm khỏi giỏ hàng thành công";
                header("location:index.php?act=cart&mess=" . $mess);
            }
            break;
        case "formthanhtoan":
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $idsp = $_GET["idsp"];
                $selectInforUser = selectInforUser();
                $selectSpOne=selectSpOne($idsp);
                $selectSp = selectSp($idsp);
                include "view/formthanhtoan.php";
            } else if (isset($_GET['ttAll'])) {
                $idsp = 0;
                $selectInforUser = selectInforUser();
                $selectSp = selectSp($idsp);
                include "view/formthanhtoan.php";
            } else {
                header('location:index.php?act=cart');
            }
            break;
        case "formthanhtoanOne":
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $idsp = $_GET["idsp"];
                $selectInforUser = selectInforUser();
                $selectSpOne=selectSpOne($idsp);
                include "view/formthanhtoan.php";
            }
            break;
        case "orderSpDone":
            if (isset($_POST['order_confirm'])) {
                //Biến cho thêm đơn hàng
                $sosp = $_POST['tongSoSp'];
                $totalAll = $_POST['tongtien'];
                $hoten = $_POST['txthoten'];
                $sdt = $_POST['txttel'];
                $diachi = $_POST['txtaddress'];
                $ghichu = $_POST['note'];
                //------------------------------
                if ($sosp == '1') {
                    //Biến cho thêm chi tiết đơn hàng
                    $idsp = $_POST['idsp'];
                    $slSpCart = $_POST['slSpCart'];
                    $tongTienSp = $_POST['tongTienSp'];
                    //--------------------------------

                    $result = datHangDone($sosp, $totalAll, $hoten, $sdt, $diachi, $ghichu);
                    if (!empty($result)) {
                        $idDonhang = $result['MAX(id)'];
                        addOrderDetail($slSpCart, $tongTienSp, $idsp, $idDonhang);
                        deleteSpCart($idsp);
                        $mess = "Đặt hàng thành công";
                        header("location:index.php?act=buySucc&mess=" . $mess ."&idOrder=".$idDonhang);
                    } else {
                        $mess = "Lấy id đơn hàng không thành công";
                        header("location:index.php?act=cart&mess=" . $mess);
                    }
                } else {
                    $result = datHangDone($sosp, $totalAll, $hoten, $sdt, $diachi, $ghichu);
                    if (!empty($result)) {
                        $idDonhang = $result['MAX(id)'];
                        $listSpCart = listCart($_SESSION['iduser']);
                        foreach ($listSpCart as $key => $value) {
                            extract($value);
                            $gia = $giaban - ($giaban * ($giamgia / 100));
                            $tongTienSp = $gia * $cart_soluong;
                            addOrderDetail($cart_soluong, $tongTienSp, $idsp, $idDonhang);
                            deleteSpCart($idsp);
                        }
                        $mess = "Đặt hàng thành công";
                        header("location:index.php?act=buySucc&mess=" . $mess);
                    } else {
                        $mess = "Lấy id đơn hàng không thành công";
                        header("location:index.php?act=cart&mess=" . $mess);
                    }
                }
            }
            break;
        case "buySucc":
            $echoOrderDone=echoDonHang();
            include "view/buysuccess.php";
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
        case "formrate":
            include "view/formrate.php";
            break;
        case "user":
            include "view/user/user.php";
            break;
        case "myorder":
            $trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : null;
            $oderUser=listOder($trangthai);
            // var_dump($oderUser);
            // var_dump($_SESSION['iduser']);
            // break;
            include "view/user/myorder.php";
            break;
        case "myOderDetail":
            if(isset($_GET["iddh"]) && $_GET[""] != "iddh") {
                $iddh=$_GET['iddh'];
                $listOrderDetail=loadOderDetail($iddh);
                include 'view/user/orderDetail.php';
            break;
        case "doimk":
            include "view/user/doimk.php";
            break;
        case "updatetk":
            include "view/user/update.php";
            break;
        case "quenmk":
            if ((isset($_POST['guiemail'])) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = check_email($email);
                if ((is_array($checkemail))) {
                    $thongbao = "Mật khẩu của bạn là: ".$checkemail['password'];
                }else{
                    $thongbao = "Email này không tồn tại trên hệ thống!";
                }
                
            }
            include "view/login/quenmk.php";
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

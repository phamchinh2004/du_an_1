<?php
if (!isset($_SESSION['nameuser'])) {
    header("../../index.php");
}
include "../../model/pdo.php";
include "../../model/donhang.php";
include "menu.php";
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case 'listdh':
            $keyw = null;
            $trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : 6;
            $listdh = listDonHang($keyw, $trangthai);
            include "list/list.php";
            break;
        case 'nhanDhShip':
            if (isset($_GET['iddh']) && $_GET['iddh']) {
                $iddh = $_GET['iddh'];
                nhanDonHangShip($iddh);
                $nhanSucc = "Nhận đơn hàng thành công";
                header('location:index.php?act=listdh&nhanSucc=' . $nhanSucc);
            }
            break;
        case 'huyDhShip':
            if (isset($_GET['iddh']) && $_GET['iddh']) {
                $iddh = $_GET['iddh'];
                huyDonHangShip($iddh);
                $nhanSucc = "Hủy đơn hàng thành công";
                header('location:index.php?act=listdh&huySucc=' . $nhanSucc);
            }
            break;
        case 'doneDh':
            if(isset($_GET['iddh']) && $_GET['iddh']) {
                $iddh = $_GET['iddh'];
                DoneDhShip($iddh);
                $nhanSucc = "Xác nhận thành công";
                header('location:index.php?act=listdh&huySucc=' . $nhanSucc);
            }
            break;
    }
} else {
    include "list/list.php";
}
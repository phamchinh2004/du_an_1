<?php
include "../../Model/pdo.php";
include "../../Model/tinhnang.php";
include "../../Model/danhmuc.php";
include "menu.php";
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case 'trangchu':
            include "main.php";
            break;
        case 'listsp':
            include "sanpham/list.php";
            break;
        case 'addsp':
            include "sanpham/add.php";
            break;
        case 'topsp':
            include "sanpham/topsp.php";
            break;
        case 'listdm':
            $listdm=listDanhMuc();
            include "danhmuc/list.php";
            break;
        case 'addDm':
            include "danhmuc/add.php";
            break;
            //Lấy danh sách các bản ghi tính năng và include trang hiển thị tính năng
        case 'listtn':
            $tinhnang = listtn();
            include "tinhnang/list.php";
            break;
            //Include trang thêm tính năng
        case 'addtn':
            include "tinhnang/add.php";
            break;
            //Sau khi điền thông tin thêm mới, kiểm tra nếu có bấm nút thêm mới thì thực hiện thêm mới tính năng, kiểm tra nếu giá trị trả về rỗng thì hiển thị
            //thông báo thành công ngược lại quay về trang thêm sản phẩm và kèm thêm thông báo lỗi được set trong model
        case 'addtnDone':
            if (isset($_POST['themmoi'])) {
                $nameTn = $_POST['tentn'];
                $mess = addTn($nameTn);
                if (empty($mess)) {
                    $thanhcong = "Thêm tính năng thành công";
                    $tinhnang = listtn();
                    include "tinhnang/list.php";
                } else {
                    include "tinhnang/add.php";
                }
            }
            break;
            //Hiển thị dữ liệu cũ của tính năng đã chọn để sửa và include trang sửa tính năng
        case 'suatn':
            if (isset($_GET['idtn']) && ($_GET['idtn'] != "")) {
                $tenTnOld = oldNameTn($_GET['idtn']);
                include "tinhnang/update.php";
            }
            break;
        case 'updateTnDone':
            if (isset($_POST['sua']) && ($_GET['idtn'] != "")) {
                $id = $_GET['idtn'];
                $nameTn = $_POST['tentn'];
                $mess = updateTn($id, $nameTn);
                if (empty($mess)) {
                    $thanhcong = "Sửa tính năng thành công";
                    $tinhnang = listtn();
                    include "tinhnang/list.php";
                } else {
                    $tenTnOld = oldNameTn($_GET['idtn']);
                    include "tinhnang/update.php";
                }
            }
            break;
        case 'listtnct':
            if (isset($_GET['idtn'])) {
                $tnParent = oldNameTn($_GET['idtn']);
                $listTnct = listTnct($_GET['idtn']);
                include "tinhnangchitiet/list.php";
            }
            break;
        case 'addtnct':
            if (isset($_GET['idtn']) && ($_GET['idtn'] != "")) {
                $tnParent = oldNameTn($_GET['idtn']);
                include "tinhnangchitiet/add.php";
            }
            break;
        case 'addtnctDone':
            if (isset($_POST['themmoi']) && ($_GET['idtn'] != "")) {
                $idtn = $_GET['idtn'];
                $nameValue = $_POST['tenvalue'];
                $mess = addTnCt($idtn, $nameValue);
                if (empty($mess)) {
                    $thanhcong = "Thêm mới giá trị thành công";
                    $tnParent = oldNameTn($_GET['idtn']);
                    $listTnct = listTnct($_GET['idtn']);
                    include "tinhnangchitiet/list.php";
                } else {
                    $tnParent = oldNameTn($_GET['idtn']);
                    include "tinhnangchitiet/add.php";
                }
            }
            break;
            //Lấy dữ liệu hiển thị + chuyển hướng trang
        case 'suatnct':
            if (isset($_GET['idtnct']) && ($_GET['idtnct'] != "")) {
                $tnParent = oldNameTn($_GET['idtn']);
                $idTnct = $_GET['idtnct'];
                $tenTnctOld = oldNameTnct($idTnct);
                include "tinhnangchitiet/update.php";
            }
            break;
        case 'updateTnctDone':
            if (isset($_POST['sua'])) {
                $idtnct = $_GET['idtnct'];
                $idtn=$_GET['idtn'];
                $value = $_POST['tenvalue'];
                $mess = updateTnct($idtnct, $value);
                if (empty($mess)) {
                    $thanhcong = "Sửa thành công";
                    $tnParent = oldNameTn($idtn);
                    $listTnct = listTnct($idtn);
                    include "tinhnangchitiet/list.php";
                } else {
                    $tnParent = oldNameTn($idtn);
                    $tenTnctOld = oldNameTnct($idtnct);
                    include "tinhnangchitiet/update.php";
                }
            }
            break;
    }
} else {
    include "main.php";
}

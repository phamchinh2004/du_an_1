<?php
include "../../Model/pdo.php";
include "../../Model/tinhnang.php";
include "../../Model/danhmuc.php";
include "../../Model/sanpham.php";
include "menu.php";
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case 'trangchu':
            include "main.php";
            break;
        case 'listsp':
            if (isset($_POST['listok'])) {
                $keyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $loadAllDm = listDanhMuc();
            $listSp = loadSp($keyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'addsp':
            $loadAllDm = listDanhMuc();
            include "sanpham/add.php";
            break;
        case 'loadTnct':
            if (isset($_POST['listok'])) {
                $idtn = $_POST['idtn'];
                $loadTnct = listTnct($idtn);
                include "sanpham/add.php";
            }
            break;
        case 'addSpDone':
            if (isset($_POST['themmoi'])) {
                $name = $_POST['tensp'];
                $gianhap = $_POST['gianhap'];
                $giaban = $_POST['giaban'];
                $soluong = $_POST['soluong'];
                $iddm=$_POST['iddm'];
                $execute = addSpDone($name, $gianhap, $giaban, $soluong, $iddm);
                if ($execute) {
                    $succ="Thêm sản phẩm thành công";
                    $loadAllDm = listDanhMuc();
                    include "sanpham/add.php";
                }else{
                    $failed="Thêm sản phẩm không thành công";
                    print_r($execute);
                    $loadAllDm = listDanhMuc();
                    include "sanpham/add.php";
                }
            }
            break;
        case 'topsp':
            include "sanpham/topsp.php";
            break;
        case 'listdm':
            $listdm = listDanhMuc();
            include "danhmuc/list.php";
            break;
        case 'addDm':
            include "danhmuc/add.php";
            break;
        case 'addDmDone':
            if (isset($_POST['themmoi'])) {
                $name = $_POST['tendm'];
                $file = $_FILES['img']['name'];
                $file_thay_the = $_FILES['img']['tmp_name'];
                $target_dir = "../../public/image/";
                $target_file = $target_dir . basename($file);
                if (move_uploaded_file($file_thay_the, $target_file)) {
                    $imgSuc = "Image upload successfully";
                } else {
                    $imgFail = "Image upload failed";
                }
                if (isset($imgFail)) {
                    echo $imgFail;
                    include "danhmuc/add.php";
                } else {
                    if (isset($imgSuc)) {
                        echo $imgSuc;
                    }
                    addDmDone($name, $file);
                    $listdm = listDanhMuc();
                    include "danhmuc/list.php";
                }
                break;
            }
        case 'suaDm':
            if (isset($_GET['iddm']) && ($_GET['iddm'] != "")) {
                $iddm = $_GET['iddm'];
                $odlDataDm = getOldDataDm($iddm);
                include "danhmuc/update.php";
            }
            break;
        case 'updateDmDone':
            if (isset($_POST['sua']) && ($_GET['iddm'] != "")) {
                $iddm = $_GET['iddm'];
                $name = $_POST['tendm'];
                $imgNew = $_FILES['imgNew']['name'];
                $imgNew_thay_the = $_FILES['imgNew']['tmp_name'];
                $target_dir = "../../public/image/";
                $target_file = $target_dir . basename($imgNew);
                if (move_uploaded_file($imgNew_thay_the, $target_file)) {
                    $imgSuc = "Image updated succsessfully";
                } else {
                    $imgFail = "Image update failed";
                }
                if (isset($imgFail)) {
                    echo $imgFail;
                    $odlDataDm = getOldDataDm($iddm);
                    include "danhmuc/update.php";
                } else if (isset($imgSuc)) {
                    // echo $imgSuc;
                    updateDmDone($iddm, $name, $imgNew);
                    $listdm = listDanhMuc();
                    include "danhmuc/list.php";
                }
            }
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
                $idtn = $_GET['idtn'];
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

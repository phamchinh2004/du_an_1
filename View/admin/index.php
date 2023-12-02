<?php
if (!isset($_SESSION['nameuser'])) {
    header("../../index.php");
}
include "../../model/pdo.php";
include "../../model/tinhnang.php";
include "../../model/danhmuc.php";
include "../../model/sanpham.php";
include "../../model/taikhoan.php";
include "menu.php";
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = ($_GET['act']);
    switch ($act) {
        case 'trangchu':
            include "main.php";
            break;
            //Hiển thị sản phẩm theo tìm kiếm và lọc (nếu không tìm kiếm và lọc sẽ hiển thị tất cả sp)
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
        case 'addTnSp':
            if (isset($_GET['idsp']) && ($_GET['idsp'] != "")) {
                $idsp = $_GET['idsp'];
                $loadAllTn = loadAllTn();
                include "sanpham/addTnSp.php";
            }
            break;
            //Kiểm tra đã click nút chưa nếu rồi tạo 1 biến gán id tính năng vào đó và gọi hàm lấy tính năng chi tiết của tính năng đó
        case 'loadTnct':
            if (isset($_POST['listok'])) {
                $loadAllTn = loadAllTn();
                $idsp = $_POST['idsp'];
                $idtn = $_POST['idtn'];
                $loadTnct = listTnct($idtn);
                include "sanpham/addTnSp.php";
            }
            break;
        case 'addTnSpDone':
            if (isset($_POST['themmoi']) && ($_POST['idtn'] != "") && ($_POST['idtnct'] != "") && ($_POST['idsp'] != "")) {
                $idsp = $_POST['idsp'];
                $idtn = $_POST['idtn'];
                $idtnct = $_POST['idtnct'];
                $mess = addTnSpDone($idsp, $idtn, $idtnct);
                if (empty($mess)) {
                    $thanhcong = "Feature added successfully";
                    $loadAllTn = loadAllTn();
                    $loadTnct = listTnct($idtn);
                    include "sanpham/addTnSp.php";
                } else {
                    $loadAllTn = loadAllTn();
                    $loadTnct = listTnct($idtn);
                    include "sanpham/addTnSp.php";
                }
            } else {
                $needSelect = "Cần chọn tính năng chi tiết";
                $idsp = $_POST['idsp'];
                $idtn = $_POST['idtn'];
                $loadAllTn = loadAllTn();
                $loadTnct = listTnct($idtn);
                include "sanpham/addTnSp.php";
            }
            break;
            //Tạo 1 biến lưu trữ tất cả các danh mục để vào trang thêm sản phẩm các danh mục sẽ được hiển thị và Include trang thêm sản phẩm
        case 'addsp':
            $loadAllDm = listDanhMuc();
            include "sanpham/add.php";
            break;
            //Kiểm tra đã click nút thêm mới chưa nếu rồi tạo các biến để lưu trữ những dữ liệu nhập vào và thực hiện sql thêm mới
        case 'addSpDone':
            if (isset($_POST['themmoi'])) {
                $name = $_POST['tensp'];
                $gianhap = $_POST['gianhap'];
                $giaban = $_POST['giaban'];
                $soluong = $_POST['soluong'];
                $iddm = $_POST['iddm'];
                addSpDone($name, $gianhap, $giaban, $soluong, $iddm);
                $succ = "Thêm sản phẩm thành công";
                $loadAllDm = listDanhMuc();
                include "sanpham/add.php";
            }
            break;
        case 'suaSp':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $OldDataSp = loadOldDataSp($_GET['idsp']);
                $loadAllDm = listDanhMuc();
                include "sanpham/update.php";
            }
            break;
        case 'updateSpDone':
            if (isset($_POST['update'])) {
                $iddm = $_POST['iddm'];
                $idsp = $_POST['idsp'];
                $name = $_POST['tensp'];
                $gianhap = $_POST['gianhap'];
                $giaban = $_POST['giaban'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                updateSpDone($idsp, $name, $gianhap, $giaban, $soluong, $mota, $iddm);
                $_SESSION['addSucc'] = "Cập nhật sản phẩm thành công";
                header("location: index.php?act=listsp");
            }
            break;
        case 'addImgSp':
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $OldDataSp = loadOldDataSp($_GET['idsp']);
                include "sanpham/addImg.php";
            }
            break;
        case 'addImgSpDone':
            if (isset($_POST['themmoi'])) {
                $idsp = $_POST['idsp'];
                $img = $_FILES['img']['name'];
                $img_thaythe = $_FILES['img']['tmp_name'];
                $target_dir = "../../public/image/";
                $target_file = $target_dir . basename($img);
                if (move_uploaded_file($img_thaythe, $target_file)) {
                    $messError = uploadImgSp($img, $idsp);
                    if (empty($messError)) {
                        $succFile = "Image uploaded successfully";
                    }
                } else {
                    $failFile = "Imgae upload failed";
                }
                $OldDataSp = loadOldDataSp($_POST['idsp']);
                include "sanpham/addImg.php";
            }
            break;
        case 'softDeleteSp':
            if (isset($_GET['idsp']) && ($_GET['idsp'] != "")) {
                softDeleteSp($_GET['idsp']);
                $deleteSoft = "Xóa mềm sản phẩm thành công";
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
            }
            break;
        case 'hardDeleteSp':
            if (isset($_GET['idsp']) && ($_GET['idsp'] != "")) {
                hardDeleteSp($_GET['idsp']);
                $deleteHard = "Xóa cứng sản phẩm thành công";
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
            }
            break;
        case 'topsp':
            $listSp = loadAllSpBanChay();
            include "sanpham/spBanChay.php";
            break;
        case 'addTopSp':
            if (isset($_POST['listok'])) {
                $keyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $loadAllDm = listDanhMuc();
            $listAddSpTop = listaddSpTop($keyw, $iddm);
            include "sanpham/addTopSp.php";
            break;
        case 'addSpTopDone':
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $idsp = $_GET['idsp'];
                $mess = addSpTop($idsp);
                if (!empty($mess)) {
                    include "sanpham/addTopSp.php";
                } else {
                    $_SESSION['thanhcong'] = "Thêm sản phẩm bán chạy thành công!";
                    header("location: index.php?act=addTopSp");
                }
            }
            break;
        case 'DeleteTopSp':
            if (isset($_GET['idsp']) && $_GET['idsp'] != "") {
                $idsp = $_GET['idsp'];
                DeleteTopSp($idsp);
                $listSp = loadAllSpBanChay();
                $_SESSION['deleteSucc'] = "Xóa sản phẩm thành công";
                include "sanpham/spBanChay.php";
            }
            break;
        case 'salesp':
            $listSpgg = listSpGG();
            include "sanpham/spSale.php";
            break;
        case 'addSpgg':
            if (isset($_POST['listok'])) {
                $keyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $loadAllDm = listDanhMuc();
            $listAddSpGG = listaddSpGG($keyw, $iddm);
            include "sanpham/addSpSale.php";
            break;
        case 'addSpSaleDone':
            if (isset($_POST['them']) && ($_POST['valueGiamgia'] != "")) {
                $idsp = $_POST['idsp'];
                $valueGiamgia = $_POST['valueGiamgia'];
                addSpSaleDone($idsp, $valueGiamgia);
                $tb = 'Thêm giảm giá sản phẩm thành công!';
                header('location: index.php?act=addSpgg&addSuc=' . $tb);
            } else {
                $tb = 'Thêm giảm giá sản phẩm không thành công, bạn cần bảo đảm đã nhập giá trị giảm giá!';
                header('location: index.php?act=addSpgg&addFail=' . $tb);
            }
            break;
        case 'DeleteSpSale':
            if (isset($_GET['idsp'])) {
                $idsp = $_GET['idsp'];
                DeleteSaleSp($idsp);
                $_SESSION['deleteSucc'] = "Xóa giảm giá thành công";
                $listSpgg = listSpGG();
                include "sanpham/spSale.php";
            }
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
                $loadAllDm = listDanhMuc();
                $tnParent = oldNameTn($_GET['idtn']);
                include "tinhnangchitiet/add.php";
            }
            break;
        case 'addtnctDone':
            if (isset($_POST['themmoi']) && ($_GET['idtn'] != "")) {
                $iddm = $_POST['iddm'];
                $idtn = $_GET['idtn'];
                $nameValue = $_POST['tenvalue'];
                $mess = addTnCt($idtn, $nameValue, $iddm);
                if (empty($mess)) {
                    $thanhcong = "Thêm mới giá trị thành công";
                    $tnParent = oldNameTn($_GET['idtn']);
                    $listTnct = listTnct($_GET['idtn']);
                    include "tinhnangchitiet/list.php";
                } else {
                    $loadAllDm = listDanhMuc();
                    $tnParent = oldNameTn($_GET['idtn']);
                    include "tinhnangchitiet/add.php";
                }
            }
            break;
            //Lấy dữ liệu hiển thị + chuyển hướng trang
        case 'suatnct':
            if (isset($_GET['idtnct']) && ($_GET['idtnct'] != "")) {
                $loadAllDm = listDanhMuc();
                $tnParent = oldNameTn($_GET['idtn']);
                $idTnct = $_GET['idtnct'];
                $tenTnctOld = oldNameTnct($idTnct);
                include "tinhnangchitiet/update.php";
            }
            break;
        case 'updateTnctDone':
            if (isset($_POST['sua'])) {
                $iddm = $_POST['iddm'];
                $idtnct = $_GET['idtnct'];
                $idtn = $_GET['idtn'];
                $value = $_POST['tenvalue'];
                $mess = updateTnct($idtnct, $value, $iddm);
                if (empty($mess)) {
                    $thanhcong = "Sửa thành công";
                    $tnParent = oldNameTn($idtn);
                    $listTnct = listTnct($idtn);
                    include "tinhnangchitiet/list.php";
                } else {
                    $loadAllDm = listDanhMuc();
                    $tnParent = oldNameTn($idtn);
                    $tenTnctOld = oldNameTnct($idtnct);
                    include "tinhnangchitiet/update.php";
                }
            }
            break;
        case 'listtk':
            $keyw = isset($_POST['keyw']) ? $_POST['keyw'] : "";
            $trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : null;
            $role = isset($_GET['role']) ? $_GET['role'] : null;
            $listtk = listTaiKhoan($keyw, $trangthai, $role);
            include "taikhoan/list.php";
            break;
        case 'addTk':
            include "taikhoan/add.php";
            break;
        case 'addTkDone':
            if (isset($_POST['themmoi'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $avatar = $_FILES['avatar']['name'];
                $avatar_tmp = $_FILES['avatar']['tmp_name'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                $target_dir = "../../public/image/";
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
                        $_SESSION['addTkDone'] = "Thêm tài khoản thành công";
                        header("location: index.php?act=listtk");
                    } else {
                        include "taikhoan/add.php";
                    }
                } else {
                    $_SESSION['imgFail'] = $ImgFail;
                    include "taikhoan/add.php";
                }
            }
            break;
        case 'suaTk':
            if (isset($_GET['idtk']) && ($_GET['idtk'] != "")) {
                $OldDataTk = loadOldDataTk($_GET['idtk']);
                include "taikhoan/updateTk.php";
            }
            break;
        case 'updateTkDone':
            if (isset($_POST['update'])) {
                $idtk = $_POST['idtk'];
                $name = $_POST['name'];
                $username = $_POST['username'];
                $usernameOld = $_POST['usernameOld'];
                $password = $_POST['password'];
                $oldAvatar = $_POST['oldAvatar'];
                $avatarNew = $_FILES['avatarNew']['name'];
                $avatarNew_tmp = $_FILES['avatarNew']['tmp_name'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                $target_dir = "../../public/image/";
                $target_file = $target_dir . basename($avatarNew);
                $target_file_old = $target_dir . basename($oldAvatar);
                if (move_uploaded_file($avatarNew_tmp, $target_file)) {
                    $ImgSusc = "Image Uploaed Successfully";
                } else {
                    $ImgFail = "Image Upload Failed";
                }
                //Kiểm tra nếu ảnh cũ đã có hoặc ảnh cũ chưa có nhưng đã tải ảnh mới lên hoặc ảnh cũ đã có và ảnh đã tải ảnh mới lên thì cho cập nhật tk
                if ($oldAvatar != "" || ($oldAvatar == "" && $avatarNew != "") || ($oldAvatar != "" && $avatarNew != "")) {
                    //Tạo biến mess để chứa giá trị trả về của hàm
                    $mess = updateTkDone($idtk, $name, $username, $usernameOld, $password, $avatarNew, $email, $tel, $address, $role);
                    if (empty($mess)) { //Kiểm tra biến $mess nếu rỗng có nghĩa là không có lỗi thì thực thi lệnh bên trong
                        if (!isset($ImgFail)) { //Kiểm tra nếu không tồn tại biến lưu trữ thông báo lỗi tải file có nghĩa là 
                            //đã up ảnh mới lên thành công và thực hiện gỡ ảnh cũ
                            unlink($target_file_old);
                        }
                        // cập nhật thành công và chuyển hướng đến trang list tài khoản
                        $_SESSION['update_success'] = "Cập nhật tài khoản thành công"; //tạo 1 biến session lưu trữ thông báo
                        header("location: index.php?act=listtk");
                    } else { //Ngược lại nếu biến mess có giá trị thì gỡ ảnh và ở lại trang update
                        if (is_file($target_file)) { //Kiểm tra xem tệp file ảnh có tồn tại ko, nếu có thì xóa
                            unlink($target_file);
                        }
                        $OldDataTk = loadOldDataTk($idtk);
                        include "taikhoan/updateTk.php";
                    }
                } else { //Trường hợp còn lại này là ảnh cũ chưa có và cũng chưa tải ảnh mới lên
                    $_SESSION['update_failed'] = "Bạn cần thêm ảnh đại diện";
                    $OldDataTk = loadOldDataTk($idtk);
                    include "taikhoan/updateTk.php";
                }
            }
            break;
        case 'banTk':
            if (isset($_GET['idtk']) && $_GET['idtk'] != "") {
                banTk($_GET['idtk']);
                $_SESSION['banSucc'] = "Hạn chế tài khoản thành công";
                header("location: index.php?act=listtk");
            }
            break;
        case 'xoaTk':
            if (isset($_GET['idtk']) && $_GET['idtk'] != "") {
                xoaTk($_GET['idtk']);
                $_SESSION['xoaSucc'] = "Xóa tài khoản thành công";
                header("location: index.php?act=listtk");
            }
            break;
    }
} else {
    include "main.php";
}

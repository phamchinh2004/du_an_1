<?php
session_start();
//Hiển thị danh sách tài khoản lọc theo tên và trạng thái tài khoản
function listTaiKhoan($keyw = "", $trangthai = null)
{
    $params = [];
    $sql = "SELECT *FROM `user`";
    if ($keyw != "") {
        $sql .= " WHERE `username` LIKE ?";
        $params[] = "%" . $keyw . "%";
    }
    if ($trangthai == 1) {
        $sql .= " WHERE `trangthai`=?";
        $params[] = "" . $trangthai . "";
    } else if ($trangthai == 2) {
        $sql .= " WHERE `trangthai`=?";
        $params[] = "" . $trangthai . "";
    }
    $run = pdo_query($sql, $params);
    return $run;
}
function loadOldDataTk($id)
{
    $sql = "SELECT * FROM `user` WHERE `id`=?";
    $run = pdo_query_one($sql, [$id]);
    return $run;
}
function updateTkDone($idtk, $name, $username, $password, $avatarNew, $email, $tel, $address, $role)
{
    //VALIDATE
    $check = true;
    $error = [];

    if (($name || $username || $password || $email || $tel || $address || $role) == "") {
        $check = false;
        array_push($error, "Cần nhập đầy đủ thông tin!");
    }
    //TRIỂN KHAI/ĐI THI SẼ DÙNG ĐẾN!
     else if (strlen($name) > 50) {
        $check = false;
        array_push($error, "Họ và tên phải nhỏ hơn hoặc bằng 50 ký tự!");
    } else if (strlen($name) < 3) {
        $check = false;
        array_push($error, "Họ và tên phải lớn hơn hoặc bằng 3 ký tự!");
    } if (strlen($username) > 100) {
        $check = false;
        array_push($error, "Tên đăng nhập phải nhỏ hơn hoặc bằng 100 ký tự!");
    } else if (strlen($username) < 3) {
        $check = false;
        array_push($error, "Tên đăng nhập phải lớn hơn hoặc bằng 3 ký tự!");
    } if (strlen($password) > 100) {
        $check = false;
        array_push($error, "Mật khẩu phải nhỏ hơn hoặc bằng 100 ký tự!");
    } else if (strlen($password) < 5) {
        $check = false;
        array_push($error, "Mật khẩu phải lớn hơn hoặc bằng 5 ký tự!");
    } else if (!preg_match('/[A-Z]/', $password)) {
        $check = false;
        array_push($error, "Mật khẩu phải chứa ít nhất một chữ cái viết hoa!");
    } else if (!preg_match('/[a-z]/', $password)) {
        $check = false;
        array_push($error, "Mật khẩu phải chứa ít nhất một chữ cái viết thường!");
    } else if (!preg_match('/\d/', $password)) {
        $check = false;
        array_push($error, "Mật khẩu phải chứa ít nhất một số!");
    } else if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $check = false;
        array_push($error, "Mật khẩu phải chứa ít nhất một ký tự đặc biệt!");
    } if (strlen($email) > 50) {
        $check = false;
        array_push($error, "Email phải nhỏ hơn hoặc bằng 50 ký tự!");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check = false;
        array_push($error, "Địa chỉ email không hợp lệ!");
    } if (strlen($tel) > 12) {
        $check = false;
        array_push($error, "Số điện thoại phải nhỏ hơn hoặc bằng 12 số!");
    } else if (!preg_match('/^[0-9]{10,12}$/', $tel)) {
        $check = false;
        array_push($error, "Số điện thoại không hợp lệ!");
    } if (strlen($address) > 200) {
        $check = false;
        array_push($error, "Địa chỉ phải nhỏ hơn hoặc bằng 200 ký tự!");
    } else if (strlen($address) < 15) {
        $check = false;
        array_push($error, "Địa chỉ phải lớn hơn hoặc bằng 15 ký tự!");
    } if ((int)$role < 0) {
        $check = false;
        array_push($error, "Vai trò phải là số dương!");
    }

    if ($check) {
        $params = [$name, $username, $password];
        $sql = "UPDATE `user` SET `name`=?,`username`=?,
                    `password`=?";
        if ($avatarNew != "") {
            $sql .= ",avatar=?";
            $params[] = $avatarNew;
        }
        $sql .= ",`email`=?,`tel`=?,
                `address`=?,`role`=?, `updateAt`=CURRENT_TIMESTAMP WHERE `id`=?";
        $params = array_merge($params, [$email, $tel, $address, $role, $idtk]);
        pdo_execute($sql, $params);
    } else {
        return $error;
    }
}
function dangnhap($username, $password)
{
    $sql = "SELECT * FROM `user` WHERE `username`=? and `password`=?";
    $taikhoan = pdo_query_one($sql, [$username, $password]);
    if ($taikhoan != false) {
        $_SESSION['nameuser'] = $taikhoan['name'];
        $_SESSION['iduser'] = $taikhoan['id'];
        if ($taikhoan['role'] == 1) {   //Nếu là người dùng
            header("location: index.php");
            exit();
        } else if ($taikhoan['role'] == 2) { //Nếu là shipper
            header("location: index.php");
            exit();
        } else if ($taikhoan['role'] == 3) { //Nếu là kho
            header("location: index.php");
            exit();
        } else if ($taikhoan['role'] == 4) { //Nếu bị ban
            $error['block'] = "Tài khoản của bạn đã bị hạn chế!";
        } else {                          //Admin
            header("location: view/admin/index.php");
            exit();
        }
    } else {
        $error['errorAccount'] = "Sai tài khoản hoặc mật khẩu!";
    }
    return $error;
}
function dangxuat()
{
    session_destroy();
    header("location: index.php");
}

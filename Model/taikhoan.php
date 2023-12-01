<?php
session_start();
//Hiển thị danh sách tài khoản lọc theo tên và trạng thái tài khoản
function listTaiKhoan($keyw = "", $trangthai = null, $role = null)
{
    $params = [];
    $sql = "SELECT * FROM `user` WHERE 1";
    if ($keyw != "") {
        $sql .= " AND `username` LIKE ?";
        $params[] = "%" . $keyw . "%";
    }
    if ($trangthai !== null) {
        $sql .= " AND `trangthai`=?";
        $params[] = $trangthai;
    }
    if ($role !== null) {
        $sql .= " AND `role`=?";
        $params[] = $role;
    }
    $run = pdo_query($sql, $params);
    return $run;
}
function addTkDone($name, $username, $password, $repassword, $avatar, $email, $tel, $address, $role)
{
    //VALIDATE
    $check = true;
    $error = [];

    if (($name || $username || $password || $repassword || $email || $tel || $address || $avatar) == "") {
        $check = false;
        array_push($error, "Cần nhập đầy đủ thông tin!");
    }
    if ($password != $repassword) {
        $check = false;
        array_push($error, "Mật khẩu không trùng khớp!");
    }
    $checkUsername = "SELECT `username` FROM `user` WHERE `username`=?";
    $runcheckUserName = pdo_query_one($checkUsername, [$username]);
    if (!empty($runcheckUserName)) {
        $check = false;
        array_push($error, "Tên đăng nhập đã tồn tại!");
    }
    //TRIỂN KHAI/ĐI THI SẼ DÙNG ĐẾN!
    // else if (strlen($name) > 50) {
    //     $check = false;
    //     array_push($error, "Họ và tên phải nhỏ hơn hoặc bằng 50 ký tự!");
    // } else if (strlen($name) < 3) {
    //     $check = false;
    //     array_push($error, "Họ và tên phải lớn hơn hoặc bằng 3 ký tự!");
    // }
    // if (strlen($username) > 100) {
    //     $check = false;
    //     array_push($error, "Tên đăng nhập phải nhỏ hơn hoặc bằng 100 ký tự!");
    // } else if (strlen($username) < 3) {
    //     $check = false;
    //     array_push($error, "Tên đăng nhập phải lớn hơn hoặc bằng 3 ký tự!");
    // }
    // if (strlen($password) > 100) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải nhỏ hơn hoặc bằng 100 ký tự!");
    // } else if (strlen($password) < 5) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải lớn hơn hoặc bằng 5 ký tự!");
    // }
    // if (!preg_match('/[A-Z]/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một chữ cái viết hoa!");
    // }
    // if (!preg_match('/[a-z]/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một chữ cái viết thường!");
    // }
    // if (!preg_match('/\d/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một số!");
    // }
    // if (!preg_match('/[^A-Za-z0-9]/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một ký tự đặc biệt!");
    // }
    // if (strlen($email) > 50) {
    //     $check = false;
    //     array_push($error, "Email phải nhỏ hơn hoặc bằng 50 ký tự!");
    // }
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $check = false;
    //     array_push($error, "Địa chỉ email không hợp lệ!");
    // }
    // if (!preg_match('/^[0-9]{10,12}$/', $tel)) {
    //     $check = false;
    //     array_push($error, "Số điện thoại không hợp lệ!");
    // }
    // if (strlen($address) > 200) {
    //     $check = false;
    //     array_push($error, "Địa chỉ phải nhỏ hơn hoặc bằng 200 ký tự!");
    // } else if (strlen($address) < 15) {
    //     $check = false;
    //     array_push($error, "Địa chỉ phải lớn hơn hoặc bằng 15 ký tự!");
    // }
    if (($role != "") && ((int)$role < 1)) {
        $check = false;
        array_push($error, "Vai trò phải là số dương và lớn hơn 0!");
    }
    if (($role != "") && ((int)$role > 4)) {
        $check = false;
        array_push($error, "Vai trò không hợp lệ!");
    }
    if ($check) {
        if ($role != "") {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`(`name`, `username`, `password`, `avatar`, `email`,`tel`, `address`, `role`) VALUES (?,?,?,?,?,?,?,?)";
            pdo_execute($sql, [$name, $username, $password, $avatar, $email, $tel, $address, $role]);
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`(`name`, `username`, `password`, `avatar`, `email`,`tel`, `address`) VALUES (?,?,?,?,?,?,?)";
            pdo_execute($sql, [$name, $username, $password, $avatar, $email, $tel, $address]);
        }
    } else {
        $_SESSION['error'] = $error;
        return $error;
    }
}
function loadOldDataTk($id)
{
    $sql = "SELECT * FROM `user` WHERE `id`=?";
    $run = pdo_query_one($sql, [$id]);
    return $run;
}
function updateTkDone($idtk, $name, $username, $usernameOld, $password, $avatarNew, $email, $tel, $address, $role)
{
    //VALIDATE
    $check = true;
    $error = [];

    if (($name || $username || $password || $email || $tel || $address || $avatarNew || $role) == "") {
        $check = false;
        array_push($error, "Cần nhập đầy đủ thông tin!");
    }
    if ($username != $usernameOld) {
        $checkUsername = "SELECT `username` FROM `user` WHERE `username`=?";
        $runcheckUserName = pdo_query_one($checkUsername, [$username]);
        if (!empty($runcheckUserName)) {
            $check = false;
            array_push($error, "Tên đăng nhập đã tồn tại!");
        }
    }

    //TRIỂN KHAI/ĐI THI SẼ DÙNG ĐẾN!
    // else if (strlen($name) > 50) {
    //     $check = false;
    //     array_push($error, "Họ và tên phải nhỏ hơn hoặc bằng 50 ký tự!");
    // } else if (strlen($name) < 3) {
    //     $check = false;
    //     array_push($error, "Họ và tên phải lớn hơn hoặc bằng 3 ký tự!");
    // }
    // if (strlen($username) > 100) {
    //     $check = false;
    //     array_push($error, "Tên đăng nhập phải nhỏ hơn hoặc bằng 100 ký tự!");
    // } else if (strlen($username) < 3) {
    //     $check = false;
    //     array_push($error, "Tên đăng nhập phải lớn hơn hoặc bằng 3 ký tự!");
    // }
    // if (strlen($password) > 100) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải nhỏ hơn hoặc bằng 100 ký tự!");
    // } else if (strlen($password) < 5) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải lớn hơn hoặc bằng 5 ký tự!");
    // }
    // if (!preg_match('/[A-Z]/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một chữ cái viết hoa!");
    // }
    // if (!preg_match('/[a-z]/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một chữ cái viết thường!");
    // }
    // if (!preg_match('/\d/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một số!");
    // }
    // if (!preg_match('/[^A-Za-z0-9]/', $password)) {
    //     $check = false;
    //     array_push($error, "Mật khẩu phải chứa ít nhất một ký tự đặc biệt!");
    // }
    // if (strlen($email) > 50) {
    //     $check = false;
    //     array_push($error, "Email phải nhỏ hơn hoặc bằng 50 ký tự!");
    // }
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $check = false;
    //     array_push($error, "Địa chỉ email không hợp lệ!");
    // }
    // if (!preg_match('/^[0-9]{10,12}$/', $tel)) {
    //     $check = false;
    //     array_push($error, "Số điện thoại không hợp lệ!");
    // }
    // if (strlen($address) > 200) {
    //     $check = false;
    //     array_push($error, "Địa chỉ phải nhỏ hơn hoặc bằng 200 ký tự!");
    // } else if (strlen($address) < 15) {
    //     $check = false;
    //     array_push($error, "Địa chỉ phải lớn hơn hoặc bằng 15 ký tự!");
    // }
    if (($role != "") && ((int)$role < 1)) {
        $check = false;
        array_push($error, "Vai trò phải là số dương và lớn hơn 0!");
    }
    if (($role != "") && ((int)$role > 4)) {
        $check = false;
        array_push($error, "Vai trò không hợp lệ!");
    }
    if ($check) {
        $password = password_hash($password, PASSWORD_DEFAULT);
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
        $_SESSION['error'] = $error;
        return $error;
    }
}
function dangnhap($username, $password)
{
    $error=[];
    $sql = "SELECT * FROM `user` WHERE `username`=?";
    $query_user_data = pdo_query_one($sql, [$username]);
    if(($query_user_data!==false) && (password_verify($password,$query_user_data['password']))){
        $_SESSION['nameuser'] = $query_user_data['name'];
        $_SESSION['iduser'] = $query_user_data['id'];
        switch($query_user_data['role']){
            case '1':
                header("location: index.php");
            break;
            case '2':
                header("location: index.php");
            break;
            case '3':
                header("location: index.php");
            break;
            case '4':
                header("location: view/admin/index.php");
            break;
        }
        if($query_user_data['trangthai']=2){
            array_push($error,"Tài khoản của bạn đã bị hạn chế!");
        }
    } else {
        array_push($error,"Tài khoản hoặc mật khẩu không chính xác!");
    }
    if(!empty($error)){
        $_SESSION['errorLogin']=$error;
    }
    return $error;
}
function banTk($idtk){
    $sql="UPDATE `user` SET `trangthai`=2 WHERE `id`=?";
    pdo_execute($sql,[$idtk]);
}
function xoaTk($idtk){
    $sql="DELETE FROM `user` WHERE `id`=?";
    pdo_execute($sql,[$idtk]);
}
function dangxuat()
{
    session_destroy();
    header("location: index.php");
}

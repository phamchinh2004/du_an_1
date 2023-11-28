<?php
// Lấy danh sách tất cả tính năng và tổng số giá trị của mỗi tính năng
function listtn()
{
    $sql = "SELECT tn.*,COUNT(tnct.id) as tongValue 
        FROM tinh_nang as tn
        LEFT JOIN tinh_nang_chi_tiet as tnct
        ON tnct.id_tinh_nang=tn.id
        GROUP BY tn.id";
    $tinhnang = pdo_query($sql);
    return $tinhnang;
}
// Thêm mới tính năng
function addTn($name)
{
    $check = "SELECT `name` FROM `tinh_nang` WHERE `name`='$name'";
    $kiemtra = pdo_query_one($check);
    if (empty($kiemtra)) {
        $sql = "INSERT INTO `tinh_nang` (`name`) value ('$name')";
        pdo_execute($sql);
    } else {
        $error = "Tên tính năng này đã tồn tại!";
    }
    if (isset($error)) {
        return $error;
    }
}
//Lấy thông tin tính năng để hiển thị thông tin cũ trước khi sửa
function oldNameTn($id)
{
    $sql = "SELECT * FROM `tinh_nang` WHERE `id`='$id'";
    $run = pdo_query_one($sql);
    return $run;
}
//Sửa tên tính năng
function updateTn($id, $name)
{
    $check = "SELECT `name` FROM `tinh_nang` WHERE `name`='$name'";
    $kiemtra = pdo_query_one($check);
    if (empty($kiemtra)) {
        $sql = "UPDATE `tinh_nang` SET `name`='$name' WHERE `id`='$id'";
        pdo_execute($sql);
    } else {
        $error = "Tên tính năng này đã tồn tại!";
    }
    if (isset($error)) {
        return $error;
    }
}
function listTnct($idtn)
{
    $sql = "SELECT * FROM `tinh_nang_chi_tiet` WHERE `id_tinh_nang`='$idtn'";
    $tnct = pdo_query($sql);
    return $tnct;
}

function addTnCt($idtn, $value)
{
    //Kiểm tra giá trị nhập vào đã tồn tại trong db chưa, nếu chưa tồn tại->thực hiện thêm mới giá trị ngược lại hiển thị thông báo lỗi
    $check = "SELECT `value` FROM `tinh_nang_chi_tiet` WHERE `value`='$value'";
    $kiemtra = pdo_query_one($check);
    if (empty($kiemtra)) {
        $sql = "INSERT INTO `tinh_nang_chi_tiet`(`id_tinh_nang`,`value`) VALUES ('$idtn','$value')";
        pdo_execute($sql);
    } else {
        $error = "Giá trị này đã tồn tại!";
    }
    if (isset($error)) {
        return $error;
    }
}
function oldNameTnct($id)
{
    $sql = "SELECT * FROM `tinh_nang_chi_tiet` WHERE `id`='$id'";
    $run = pdo_query_one($sql);
    return $run;
}
function updateTnct($id, $value)
{
    $check = "SELECT `value` FROM `tinh_nang_chi_tiet` WHERE `value`='$value'";
    $kiemtra = pdo_query_one($check);
    if (empty($kiemtra)) {
        $sql = "UPDATE `tinh_nang_chi_tiet` SET `value`='$value' WHERE `id`='$id'";
        pdo_execute($sql);
    } else {
        $error = "Giá trị này đã tồn tại!";
    }
    if (isset($error)) {
        return $error;
    }
}

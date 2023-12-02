<?php
function loadSp($keyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
        FROM `product` as sp 
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
        LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
        LEFT JOIN `image` as img ON img.id_product = sp.id 
        WHERE sp.trangthai=1";
    $params = [];
    if ($keyw != "") {
        $sql .= " AND sp.name LIKE ?";
        $params[] = "%" . $keyw . "%";
    }
    if ($iddm > 0) {
        $sql .= " AND sp.id_dm =?";
        $params[] = "" . $iddm . "";
    }
    $sql .= " GROUP BY sp.id";
    $sql .= " ORDER BY sp.id ASC";
    $run = pdo_query($sql, $params);
    return $run;
}
function loadAllSpBanChay()
{
    $sql = "SELECT topPro.*,sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
    FROM `product_chay_nhat` as topPro 
    LEFT JOIN `product`as sp ON sp.id=topPro.id_product
    LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
    LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
    LEFT JOIN `image` as img ON img.id_product = sp.id 
    WHERE sp.trangthai=1
    GROUP BY sp.id
    ORDER BY sp.id ASC";
    $run = pdo_query($sql);
    return $run;
}
function addSpTop($idsp)
{
    $check = "SELECT * FROM `product` WHERE `id`=?";
    $checkRun = pdo_query_one($check, [$idsp]);
    $check2 = "SELECT * FROM `product_chay_nhat` WHERE `id_product`=?";
    $checkRun2 = pdo_query_one($check2, [$idsp]);
    if (!empty($checkRun) && empty($checkRun2)) {
        $sql = "INSERT INTO `product_chay_nhat`(`id_product`) VALUE (?)";
        pdo_execute($sql, [$idsp]);
    } else if (!empty($checkRun2)) {
        $error = "Sản phẩm đã tồn tại trong danh sách sản phẩm bán chạy!";
        return $error;
    } else {
        $error = "Sản phẩm không tồn tại!";
        return $error;
    }
}
function DeleteTopSp($idsp)
{
    $sql = "DELETE FROM `product_chay_nhat` WHERE `id_product`=?";
    pdo_execute($sql, [$idsp]);
}
function DeleteSaleSp($idsp)
{
    $sql = "UPDATE `product` SET `giamgia`=0 WHERE `id`=?";
    pdo_execute($sql, [$idsp]);
}
function addSpDone($name, $gianhap, $giaban, $soluong, $iddm)
{
    $sql = "INSERT INTO `product`(`name`,`gianhap`,`giaban`,`soluong`,`id_dm`) values (?,?,?,?,?)";
    pdo_execute($sql, [$name, $gianhap, $giaban, $soluong, $iddm]);
}
function loadOldDataSp($id)
{
    $sql = "SELECT sp.*,dm.id as iddanhmuc,dm.name as tendanhmuc 
        FROM `product` as sp 
        LEFT JOIN `danhmuc` as dm ON dm.id=sp.id_dm
        WHERE sp.id=?";
    $run = pdo_query_one($sql, [$id]);
    return $run;
}
function updateSpDone($idsp, $name, $gianhap, $giaban, $soluong, $mota, $iddm)
{
    $sql = "UPDATE `product` SET `name`=?,`gianhap`=?,`giaban`=?,`soluong`=?,`mota`=?,`id_dm`=? WHERE `id`=?";
    pdo_execute($sql, [$name, $gianhap, $giaban, $soluong, $mota, $iddm, $idsp]);
}
function uploadImgSp($link, $idsp)
{
    $check = "SELECT * FROM `image` WHERE `link`='$link' and `id_product`=?";
    $run = pdo_query_one($check, [$idsp]);
    if (empty($run)) {
        $sql = "INSERT INTO `image`(`link`,`id_product`) VALUES (?,?)";
        pdo_execute($sql, [$link, $idsp]);
    } else {
        $error = "Đường dẫn này đã tồn tại";
        return $error;
    }
}
function addTnSpDone($idtn, $idtnct, $idsp)
{
    $check = "SELECT * FROM `sp_tnct` WHERE `id_tn`=? and `id_tnct`=? and `id_product`=?";
    $run = pdo_query_one($check, [$idtn, $idtnct, $idsp]);
    if (empty($run)) {
        $sql = "INSERT INTO `sp_tnct`(`id_tn`,`id_tnct`,`id_product`) VALUES (?,?,?)";
        pdo_execute($sql, [$idtn, $idtnct, $idsp]);
    } else {
        $error = "Giá trị đã tồn tại";
        return $error;
    }
}
function softDeleteSp($idsp)
{
    $sql = "UPDATE `product` SET `trangthai`=0 WHERE `id`=?";
    pdo_execute($sql, [$idsp]);
}
function hardDeleteSp($idsp)
{
    $check = "SELECT * FROM `image` WHERE `id_product`=?";
    $run = pdo_query_one($check, [$idsp]);
    if (!empty($run)) {
        $deleteImg = "DELETE FROM `image` WHERE `id_product`=?";
        pdo_execute($deleteImg, [$idsp]);
    }
    $sql = "DELETE FROM `product` WHERE `id`=?";
    pdo_execute($sql, [$idsp]);
}

function listSpGG()
{
    $sql = "SELECT topPro.*,sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
    FROM `product_chay_nhat` as topPro 
    LEFT JOIN `product`as sp ON sp.id=topPro.id_product
    LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
    LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
    LEFT JOIN `image` as img ON img.id_product = sp.id 
    WHERE sp.giamgia!=0
    GROUP BY sp.id
    ORDER BY sp.id ASC";
    $run = pdo_query($sql);
    return $run;
}
function listaddSpGG($keyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
        FROM `product` as sp 
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
        LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
        LEFT JOIN `image` as img ON img.id_product = sp.id 
        WHERE sp.trangthai=1 and sp.giamgia=0";
    $params = [];
    if ($keyw != "") {
        $sql .= " AND sp.name LIKE ?";
        $params[] = "%" . $keyw . "%";
    }
    if ($iddm > 0) {
        $sql .= " AND sp.id_dm =?";
        $params[] = "" . $iddm . "";
    }
    $sql .= " GROUP BY sp.id";
    $sql .= " ORDER BY sp.id ASC";
    $run = pdo_query($sql, $params);
    return $run;
}
function addSpSaleDone($idsp, $giamgia)
{
    $sql = "UPDATE `product` SET `giamgia`=? WHERE `id`=?";
    pdo_execute($sql, [$giamgia, $idsp]);
}
function listaddSpTop($keyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
        FROM `product` as sp 
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
        LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
        LEFT JOIN `image` as img ON img.id_product = sp.id 
        LEFT JOIN `product_chay_nhat` as sptop ON sptop.id_product=sp.id
        WHERE sp.trangthai=1 and sptop.id_product IS NULL";
    $params = [];
    if ($keyw != "") {
        $sql .= " AND sp.name LIKE ?";
        $params[] = "%" . $keyw . "%";
    }
    if ($iddm > 0) {
        $sql .= " AND sp.id_dm =?";
        $params[] = "" . $iddm . "";
    }
    $sql .= " GROUP BY sp.id";
    $sql .= " ORDER BY sp.id ASC";
    $run = pdo_query($sql, $params);
    return $run;
}

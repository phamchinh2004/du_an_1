<?php
function listDonHang($key = null, $trangthai = null)
{
    $params = [];
    $sql = "SELECT * FROM `donhang` WHERE 1";
    if ($key != null) {
        $sql .= " AND `id`=?";
        $params[] = $key;
    }
    if ($trangthai != null) {
        $sql .= " AND `id_trang_thai`=?";
        $params[] = $trangthai;
    }
    $run = pdo_query($sql, $params);
    return $run;
}
function listSpVoted()
{
    $sql="SELECT sp.* FROM `product` as sp
    LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product=sp.id
    WHERE ctdh.trangThaiVote=2";
    $run = pdo_query($sql);
    return $run;
}
function listOder($trangthai = 0)
{
    $params = [];
    $sql = "SELECT *,donhang.id as iddh,user.id_role
     FROM `donhang` 
     LEFT JOIN `user` ON user.id=donhang.id_user
     WHERE user.id_role=1 AND `id_user`=?";
    $params[] = $_SESSION['iduser'];
    if ($trangthai != null) {
        $sql .= " AND `id_trang_thai`=?";
        $params[] = $trangthai;
    } else {
        $sql .= " AND `id_trang_thai`=?";
        $params[] = 1;
    }
    $sql.=" ORDER BY donhang.id desc";
    $run = pdo_query($sql, $params);
    return $run;
}
function chiTietDonHang($iddh)
{
    $sql = "SELECT ctdh.*,sp.name as namesp FROM `chi_tiet_don_hang`as ctdh 
        LEFT JOIN `product` as sp ON sp.id=ctdh.id_product
        WHERE `id_don_hang`=?
        GROUP BY `id`";
    $run = pdo_query($sql, [$iddh]);
    return $run;
}
function nhanDonHang($iddh)
{
    $sql = "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
    pdo_execute($sql, [6, $iddh]);
}
function nhanDonHangShip($iddh)
{
    $sql = "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
    pdo_execute($sql, [2, $iddh]);
}

function huyDonHang($iddh)
{
    $sql = "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
    pdo_execute($sql, [4, $iddh]);
}
function huyDonHangShip($iddh)
{
    $sql = "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
    pdo_execute($sql, [1, $iddh]);
}
function topUser()
{
    $sql = "SELECT user.id,user.name,user.tel,COUNT(DISTINCT donhang.id) as 'tongDonHang',COUNT(DISTINCT dhct.id)'tongSoSanPham' 
        FROM `user` 
        LEFT JOIN `donhang` ON donhang.id_user=user.id 
        LEFT JOIN `chi_tiet_don_hang` as dhct ON dhct.id_don_hang=donhang.id 
        GROUP BY user.id 
        ORDER BY `tongDonHang` DESC;";
    $run = pdo_query($sql);
    return $run;
}
function DoneDhShip($id)
{
    $sql = "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
    pdo_execute($sql, [3, $id]);
}
function echoDonHang()
{
    $sql = "SELECT *,donhang.id,ctdh.*,ctdh.so_luong as soluongct,sp.name as spname FROM `donhang`
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_don_hang=donhang.id
        LEFT JOIN `product` as sp ON sp.id=ctdh.id_product
        WHERE donhang.id=(SELECT MAX(id) FROM donhang);";
    $run = pdo_query($sql);
    return $run;
}
function loadOderDetail($iddh)
{
    $sql = "SELECT *,ct.id as iddhct,ct.so_luong as slct,donhang.id_trang_thai as trangThaiDh 
    FROM `chi_tiet_don_hang` as ct
    LEFT JOIN `product` as sp ON sp.id=ct.id_product
    LEFT JOIN `donhang` ON donhang.id=ct.id_don_hang
    WHERE `id_don_hang`=?";
    $run = pdo_query($sql, [$iddh]);
    return $run;
}
function loadVote($iddhct)
{
    $sql = "SELECT ctdh.id as idctdh,sp.id as idsp,sp.name AS namesp, image.link AS img
    FROM `chi_tiet_don_hang` AS ctdh
    LEFT JOIN `product` AS sp ON sp.id = ctdh.id_product
    LEFT JOIN `image` ON image.id_product = sp.id
    WHERE ctdh.id=?";
    $run = pdo_query($sql, [$iddhct]);
    return $run;
}
function loadStar()
{
    $sql = "SELECT * FROM `vote_star` WHERE 1";
    $run = pdo_query($sql);
    return $run;
}
function voteDone($content, $soSao, $iddhct)
{
    $sql = "INSERT INTO `danh_gia`(`content`,`id_star`,`id_order_detail`,`id_user`) VALUES (?,?,?,?)";
    pdo_execute($sql, [$content, $soSao, $iddhct, $_SESSION['iduser']]);
}
function setTrangThai($idctdh)
{
    $sql = 'UPDATE "chi_tiet_don_hang" SET `trangThaiVote`=? WHERE `id`=?';
    pdo_execute($sql, [2, $idctdh]);
}

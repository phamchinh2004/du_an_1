<?php
function loadSp($keyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
        FROM `product` as sp 
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
        LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
        LEFT JOIN `image` as img ON img.id_product = sp.id 
        WHERE sp.trangthai=1";
    if ($keyw != "") {
        $sql .= " AND sp.name LIKE '%" . $keyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND sp.id_dm ='" . $iddm . "'";
    }
    $sql .= " GROUP BY sp.id";
    $sql .= " ORDER BY sp.id ASC";
    $run = pdo_query($sql);
    return $run;
}
function loadAllSpBanChay(){
    $sql="SELECT topPro.*,sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
    FROM `product_chay_nhat` as topPro 
    LEFT JOIN `product`as sp ON sp.id=topPro.id_product
    LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
    LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
    LEFT JOIN `image` as img ON img.id_product = sp.id 
    WHERE sp.trangthai=1
    GROUP BY sp.id
    ORDER BY sp.id ASC";
    $run=pdo_query($sql);
    return $run;
}
function addSpTop($idsp){
    $check="SELECT * FROM `product` WHERE `id`='$idsp'";
    $checkRun=pdo_query_one($check);
    $check2="SELECT * FROM `product_chay_nhat` WHERE `id_product`='$idsp'";
    $checkRun2=pdo_query_one($check2);
    if(!empty($checkRun)&& empty($checkRun2)){
        $sql="INSERT INTO `product_chay_nhat`(`id_product`) VALUE ('$idsp')";
        pdo_execute($sql);
    }else if(!empty($checkRun2)){
        $error="Sản phẩm đã tồn tại trong danh sách sản phẩm bán chạy!";
        return $error;
    }else{
        $error="Sản phẩm không tồn tại!";
        return $error;
    }
}
function DeleteTopSp($idsp){
    $sql="DELETE FROM `product_chay_nhat` WHERE `id_product`='$idsp'";
    pdo_execute($sql);
}
function addSpDone($name, $gianhap, $giaban, $soluong, $iddm)
{
    $sql = "INSERT INTO `product`(`name`,`gianhap`,`giaban`,`soluong`,`id_dm`) values ('$name','$gianhap','$giaban','$soluong','$iddm')";
    pdo_execute($sql);
}
function loadOldDataSp($id)
{
    $sql = "SELECT sp.*,dm.id as iddanhmuc,dm.name as tendanhmuc 
        FROM `product` as sp 
        LEFT JOIN `danhmuc` as dm ON dm.id=sp.id_dm
        WHERE sp.id=$id";
    $run = pdo_query_one($sql);
    return $run;
}
function updateSpDone($idsp, $name, $gianhap, $giaban, $soluong, $mota)
{
    $sql = "UPDATE `product` SET `name`='$name',`gianhap`='$gianhap',`giaban`='$giaban',`soluong`='$soluong',`mota`='$mota' WHERE `id`='$idsp'";
    pdo_execute($sql);
}
function uploadImgSp($link,$idsp){
    $check="SELECT * FROM `image` WHERE `link`='$link' and `id_product`='$idsp'";
    $run=pdo_query_one($check);
    if(empty($run)){
        $sql="INSERT INTO `image`(`link`,`id_product`) VALUES ('$link','$idsp')";
        pdo_execute($sql);
    }else{
        $error="Đường dẫn này đã tồn tại";
        return $error;
    }
}
function addTnSpDone($idtn,$idtnct,$idsp){
    $check="SELECT * FROM `sp_tnct` WHERE `id_tn`='$idtn' and `id_tnct`='$idtnct' and `id_product`='$idsp'";
    $run=pdo_query_one($check);
    if(empty($run)){
        $sql="INSERT INTO `sp_tnct`(`id_tn`,`id_tnct`,`id_product`) VALUES ('$idtn','$idtnct','$idsp')";
        pdo_execute($sql);
    }else{
        $error="Giá trị đã tồn tại";
        return $error;
    }
}
function softDeleteSp($idsp){
    $sql="UPDATE `product` SET `trangthai`=0 WHERE `id`='$idsp'";
    pdo_execute($sql);
}
function hardDeleteSp($idsp){
    $check="SELECT * FROM `image` WHERE `id_product`='$idsp'";
    $run=pdo_query_one($check);
    if(!empty($run)){
        $deleteImg="DELETE FROM `image` WHERE `id_product`='$idsp'";
        pdo_execute($deleteImg);
    }
    $sql="DELETE FROM `product` WHERE `id`='$idsp'";
    pdo_execute($sql);
}
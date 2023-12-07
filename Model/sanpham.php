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
function loadAllSpUser($iddm = 0)
{
    $params = [];
    $sql = "SELECT sp.*,img.link as hinhanh FROM `product` as sp
    LEFT JOIN `image` as img ON img.id_product = sp.id 
     WHERE sp.trangthai=1";
    if ($iddm > 0) {
        $sql .= " AND sp.id_dm =?";
        $params[] = "" . $iddm . "";
    }
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
// //Xóa cứng ()
// function hardDeleteSp($idsp)
// {
//     $check = "SELECT * FROM `image` WHERE `id_product`=?";
//     $run = pdo_query_one($check, [$idsp]);
//     if (!empty($run)) {
//         $deleteImg = "DELETE FROM `image` WHERE `id_product`=?";
//         pdo_execute($deleteImg, [$idsp]);
//     }
//     $sql = "DELETE FROM `product` WHERE `id`=?";
//     pdo_execute($sql, [$idsp]);
// }

//Lấy danh sách sản phẩm sale
function listSpGG()
{
    $sql = "SELECT topPro.*, sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
    FROM `product_chay_nhat` as topPro 
    RIGHT JOIN `product`as sp ON sp.id=topPro.id_product
    LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
    LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
    LEFT JOIN `image` as img ON img.id_product = sp.id 
    WHERE sp.giamgia!=0
    GROUP BY sp.id
    ORDER BY sp.id ASC;";
    $run = pdo_query($sql);
    return $run;
}
//Lấy danh sách những sản phẩm chưa được thêm vào danh sách sản phẩm sale
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
//Thêm sản phẩm sale
function addSpSaleDone($idsp, $giamgia)
{
    $sql = "UPDATE `product` SET `giamgia`=? WHERE `id`=?";
    pdo_execute($sql, [$giamgia, $idsp]);
}
//Lấy danh sách sản phẩm bán chạy
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
//Lấy danh sách sản phẩm đang hoạt động hiển thị lên trang chủ
function listSpHome($keyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, img.link as hinhanh 
    FROM `product` as sp
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
    $run = pdo_query($sql, $params);
    return $run;
}
//Lấy chi tiết tiết sản phẩm để hiển thị lên trang chi tiết sản phẩm
function spDetail($idsp)
{
    $sql = "SELECT *,img.* FROM `product` as sp
    LEFT JOIN `image` as img ON img.id_product=sp.id
    WHERE sp.id=?";
    $run = pdo_query_one($sql, [$idsp]);
    return $run;
}
//Hiển thị danh sách sản phẩm lên giỏ hàng
function listCart($id)
{
    $sql = "SELECT cart.*,sp.*,sp.id as idsp,image.link as hinhanh, cart.soluong as cart_soluong FROM `cart` 
    RIGHT JOIN `product` as sp ON sp.id=cart.id_product
    LEFT JOIN `image` ON image.id_product=sp.id
    WHERE `id_user`=?
    GROUP BY cart.id";
    $run = pdo_query($sql, [$id]);
    return $run;
}

//Thêm sản phẩm vào giỏ hàng
//Kiểm tra nếu sản phẩm chưa thêm vào giỏ hàng thì đặt mặc định là 1
//Ngược lại nếu sản phẩm đã có trong giỏ hàng thì đặt số lượng cộng thêm 1
function addToCartDone($idsp)
{
    $check = "SELECT * FROM `cart` WHERE `id_product`=? and `id_user`=?";
    $runCheck = pdo_query_one($check, [$idsp, $_SESSION['iduser']]);
    if (empty($runCheck)) {
        $sql = 'INSERT INTO `cart` (`soluong`,`id_user`,`id_product`) VALUES (?,?,?)';
        pdo_execute($sql, [1, $_SESSION['iduser'], $idsp]);
    } else {
        $sql = 'UPDATE `cart` SET `soluong`=`soluong`+? WHERE `id_user`=? and `id_product`=?';
        pdo_execute($sql, [1, $_SESSION['iduser'], $idsp]);
    }
}
//Cập nhật số lượng sản phẩm trong giỏ hàng: số lượng mới= số lượng người dùng nhập vào
function updateQuantity($idsp, $soluong)
{
    $sql = "UPDATE `cart` SET `soluong`=? WHERE `id_product`=? and `id_user`=? ";
    pdo_execute($sql, [$soluong, $idsp, $_SESSION['iduser']]);
}
//Lấy thông tin của sản phẩm được người dùng chọn trong giỏ hàng để hiển thị lên trang thanh toán
function selectSp($idsp = 0)
{
    $params = [];
    $sql = "SELECT sp.id as idsp,sp.name,sp.giaban,sp.giamgia,cart.*,cart.soluong as cart_soluong FROM `cart`
    LEFT JOIN `product` as sp ON cart.id_product=sp.id WHERE";
    if ($idsp != 0) {
        $sql .= " `id_product`=? and";
        $params[] = $idsp;
    }
    $sql .= " `id_user`=?";
    $params[] = $_SESSION['iduser'];
    $run = pdo_query($sql, $params);
    return $run;
}
function selectSpOne($idsp = 0){
    $sql="SELECT * FROM `product` WHERE `id` = ?";
    $run=pdo_query_one($sql, [$idsp]);
    return $run;
}
//Thêm số lượng sản phẩm và thông tin đặt hàng vào bảng đơn hàng
function datHangDone($sosp, $_totalAll, $hoten, $sdt, $diachi, $ghichu)
{
    $sql = "INSERT INTO `donhang`(`so_luong`, `tong_tien`, 
        `name_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nhan_hang`
        , `ghi_chu`, `id_user`) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql, [$sosp, $_totalAll, $hoten, $sdt, $diachi, $ghichu, $_SESSION['iduser']]);
    $selectIdOder = "SELECT MAX(id) FROM `donhang`";
    $run = pdo_query_one($selectIdOder);
    return $run;
}
//Thêm thông tin chi tiết của sản phẩm vào chi tiết đơn hàng
function addOrderDetail($slSpCart, $tongTienSp, $idsp, $idDonhang)
{
    $sql = 'INSERT INTO `chi_tiet_don_hang` (`so_luong`,`tongtien`, `id_product`,`id_don_hang` ) VALUES (?,?,?,?)';
    pdo_execute($sql, [$slSpCart, $tongTienSp, $idsp, $idDonhang]);
}
//Xóa sản phẩm trong giỏ hàng sau khi mua thành công
function deleteSpCart($idsp)
{
    $sql = 'DELETE FROM `cart` WHERE `id_product`=? and `id_user`=?';
    pdo_execute($sql, [$idsp, $_SESSION['iduser']]);
}
function listOderChoXacNhan($trangthai=0){

}
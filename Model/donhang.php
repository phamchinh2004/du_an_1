<?php
    function listDonHang($key=null,$trangthai=null){
        $params=[];
        $sql="SELECT * FROM `donhang` WHERE 1";
        if($key!=null){
            $sql.= " AND `id`=?";
            $params[]=$key;
        }
        if($trangthai!=null){
            $sql.= " AND `id_trang_thai`=?";
            $params[]=$trangthai;
        }
        $run=pdo_query($sql, $params);
        return $run;
    }
    function chiTietDonHang($iddh){
        $sql= "SELECT ctdh.*,sp.name as namesp FROM `chi_tiet_don_hang`as ctdh 
        LEFT JOIN `product` as sp ON sp.id=ctdh.id_product
        WHERE `id_don_hang`=?
        GROUP BY `id`";
        $run=pdo_query($sql, [$iddh]);
        return $run;
    }
    function nhanDonHang($iddh){
        $sql= "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
        pdo_execute($sql, [6,$iddh]);
    }
    function nhanDonHangShip($iddh){
        $sql= "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
        pdo_execute($sql, [2,$iddh]);
    }
    
    function huyDonHang($iddh){
        $sql= "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
        pdo_execute($sql, [4,$iddh]);
    }
    function huyDonHangShip($iddh){
        $sql= "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
        pdo_execute($sql, [1,$iddh]);
    }
    function topUser(){
        $sql= "SELECT user.id,user.name,user.tel,COUNT(donhang.id) as 'tongDonHang',COUNT(dhct.id)'tongSoSanPham' 
        FROM `user` 
        LEFT JOIN `donhang` ON donhang.id_user=user.id 
        LEFT JOIN `chi_tiet_don_hang` as dhct ON dhct.id_don_hang=donhang.id 
        GROUP BY user.id 
        ORDER BY `tongDonHang` DESC;";
        $run=pdo_query($sql);
        return $run;
    }
    function DoneDhShip($id){
        $sql= "UPDATE `donhang` SET `id_trang_thai`=? WHERE `id`=?";
        pdo_execute($sql, [3,$id]);
    }
?>
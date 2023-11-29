<?php
    function loadSp($keyw = "", $iddm = 0){
        $sql="SELECT sp.*, COUNT(ctdh.id) as luotmua, COUNT(dg.id) as luotvote, img.link as hinhanh 
        FROM `product` as sp 
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id_product = sp.id 
        LEFT JOIN `danh_gia` as dg ON dg.id_order_detail = ctdh.id 
        LEFT JOIN `image` as img ON img.id_product = sp.id 
        WHERE sp.trangthai=1";
        if($keyw!=""){
            $sql.=" AND sp.name LIKE '%" . $keyw . "%'";
        }
        if($iddm>0){
            $sql.=" AND sp.id_dm ='" . $iddm . "'";
        }
        $sql.=" GROUP BY sp.id";
        $sql.=" ORDER BY sp.id ASC";
        $run=pdo_query($sql);
        return $run;
    }
    function addSpDone($name, $gianhap, $giaban, $soluong,$iddm){
        $sql="INSERT INTO `product`(`name`,`gianhap`,`giaban`,`soluong`,`id_dm`) values ('$name','$gianhap','$giaban','$soluong','$iddm')";
        pdo_execute($sql);
    }
?>
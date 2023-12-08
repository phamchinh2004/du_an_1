<?php
    function loadAllVoteDetail($idsp){
        $sql="SELECT danh_gia.*,sp.name as namesp,user.name as nameuser
        FROM `danh_gia`
        LEFT JOIN `chi_tiet_don_hang` as ctdh ON ctdh.id=danh_gia.id_order_detail
        LEFT JOIN `user` ON user.id=danh_gia.id_user
        LEFT JOIN `product` as sp ON sp.id=ctdh.id_product
        WHERE sp.id=?";
        $run=pdo_query($sql,[$idsp]);
        return $run;
    }
    function deleteVoteSp($iddg){
        $sql= "DELETE FROM `danh_gia` WHERE `id`=?";
        pdo_execute($sql,[$iddg]); 
    }
?>
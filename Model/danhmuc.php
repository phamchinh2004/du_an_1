<?php
    function listDanhMuc(){
        $sql="SELECT * FROM `danhmuc`";
        $run=pdo_query($sql);
        return $run;
    }
?>
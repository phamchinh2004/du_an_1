<?php
    function listDanhMuc(){
        $sql="SELECT * FROM `danhmuc`";
        $run=pdo_query($sql);
        return $run;
    }
    function addDmDone($name,$hinh){
        $sql="INSERT INTO `danhmuc`(`name`,`img`) values (?,?)";
        pdo_execute($sql,[$name,$hinh]);
    }
    function getOldDataDm($iddm){
        $sql="SELECT * FROM `danhmuc` WHERE `id`=?";
        $run=pdo_query_one($sql,[$iddm]);
        return $run;
    }
    function updateDmDone($iddm,$name,$img){
        $params=[$name];
        $sql="UPDATE `danhmuc` SET `name`=?";
        if($img!=""){
            $sql.=",`img`=?";
            $params[]=$img;
        }
        $sql.=" WHERE `id`=?";
        $params[]=$iddm;
        pdo_execute($sql,$params);
    }
?>
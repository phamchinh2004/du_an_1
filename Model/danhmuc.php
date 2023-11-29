<?php
    function listDanhMuc(){
        $sql="SELECT * FROM `danhmuc`";
        $run=pdo_query($sql);
        return $run;
    }
    function addDmDone($name,$hinh){
        $sql="INSERT INTO `danhmuc`(`name`,`img`) values ('$name','$hinh')";
        pdo_execute($sql);
    }
    function getOldDataDm($iddm){
        $sql="SELECT * FROM `danhmuc` WHERE `id`='$iddm'";
        $run=pdo_query_one($sql);
        return $run;
    }
    function updateDmDone($iddm,$name,$img){
        if($img!=""){
            $sql="UPDATE `danhmuc` SET `name`='$name',`img`='$img' WHERE `id`='$iddm'";
        }else{
            $sql="UPDATE `danhmuc` SET `name`='$name' WHERE `id`='$iddm'";
        }
        pdo_execute($sql);
    }
?>
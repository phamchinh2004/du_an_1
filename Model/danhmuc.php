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
?>
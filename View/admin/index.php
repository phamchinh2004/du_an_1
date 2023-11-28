<?php
include "../../Model/pdo.php";
include "../../Model/tinhnang.php";
include "menu.php";
if(isset($_GET['act'])&& ($_GET['act'])!=""){
    $act=($_GET['act']);
    switch($act){
        case 'trangchu':
            include "main.php";
            break;
        case 'listsp':
            include "sanpham/list.php";
            break;
        case 'addsp':
            include "sanpham/add.php";
            break;
        case 'topsp':
            include "sanpham/topsp.php";
            break;
        case 'listdm':
            include "danhmuc/list.php";
            break;
        case 'listtn':
            $tinhnang=listtn();
            include "tinhnang/list.php";
            break;
        case 'addtn':
            include "tinhnang/add.php";
            break;
        case 'addtnDone':
            if(isset($_POST['themmoi'])){
                $nameTn=$_POST['tentn'];
                $mess=addTn($nameTn);
                if(empty($mess)){
                    $thanhcong="Thêm tính năng thành công";
                    $tinhnang=listtn();
                    include "tinhnang/list.php";
                }else{
                    include "tinhnang/add.php";
                }
            }
            break;
        case 'suatn':
            if(isset($_GET['idtn']) && ($_GET['idtn']!="")){
                $tenTnOld=oldNameTn($_GET['idtn']);
                include "tinhnang/update.php";
            }
            break;
        case 'updateTnDone':
            if(isset($_POST['sua']) && ($_GET['idtn']!="")){
                $id=$_GET['idtn'];
                $nameTn=$_POST['tentn'];
                $mess=updateTn($id,$nameTn);
                if(empty($mess)){
                    $thanhcong="Sửa tính năng thành công";
                    $tinhnang=listtn();
                    include "tinhnang/list.php";
                }else{
                    $tenTnOld=oldNameTn($_GET['idtn']);
                    include "tinhnang/update.php";
                }
            }
    }
}else{
    include "main.php";
}
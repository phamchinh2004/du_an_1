<?php
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
        case 'topsp':
            include "sanpham/topsp.php";
            break;
        case 'listdm':
            include "danhmuc/list.php";
            break;
    }
}else{
    include "main.php";
}
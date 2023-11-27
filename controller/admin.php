<?php
include "../View/admin/menu.php";
if(isset($_GET['act'])&& ($_GET['act'])!=""){
    $act=($_GET['act']);
    switch($act){
        case 'trangchu':
            include "../View/admin/main.php";
            break;
        case 'listsp':
            include "../View/admin/sanpham/list.php";
            break;
    }
}else{
    include "../View/admin/main.php";
}
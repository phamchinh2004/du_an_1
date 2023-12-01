<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/script.js"></script>
    <script src="https://kit.fontawesome.com/4392bd821c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="box_center">
        <header class="header"><!--Phần header-->
            <div class="header_bg"><!--Màu nền cho phần nav-->
                <div class="header_around"><!--Bọc xung quanh nav và căn giữa-->
                    <div class="header_nav"><!--Bọc nội dung nav-->
                        <a class="header_nav_logo" href="index.php"><!--Bọc nội dung logo-->
                            <img class="header_nav_logo_img" src="public/image/calling.png" alt="Logo">
                            <div class="header_nav_logo_text">
                                <h3 class="header_nav_logo_text_1">SAN'S</h3>
                                <h3 class="header_nav_logo_text_2">MOBILE</h3>
                            </div>
                        </a>
                        <div class="header_nav_search">
                            <form class="header_nav_search_form" action="">
                                <input class="header_nav_search_form_input" type="text" placeholder="Nhập từ khóa tìm kiếm ... ">
                                <button class="header_nav_search_form_submit" type="submit">
                                    <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #ffffff;"></i>
                                </button>
                            </form>
                        </div>
                        <div class="header_nav_user">
                            <div class="header_nav_user_list">
                                <a class="header_nav_user_list_link" href="">
                                    <div class="header_nav_user_list_link_logo">
                                        <i class="fa-solid fa-phone fa-lg" style="color: #ffffff;"></i>
                                    </div>
                                    <p>0987 654 321</p>
                                </a>
                                <?php if (!isset($_SESSION['nameuser'])) { ?>
                                    <a class="header_nav_user_list_link" href="index.php?act=login">
                                        <div class="header_nav_user_list_link_logo">
                                            <i class="fa-solid fa-circle-user fa-lg" style="color: #ffffff;"></i>
                                        </div>
                                        <p>Tài khoản</p>
                                    </a>
                                <?php } else { ?>
                                    <a class="header_nav_user_list_link" href="index.php?act=user">
                                        <div class="header_nav_user_list_link_logo">
                                            <i class="fa-solid fa-circle-user fa-lg" style="color: #ffffff;"></i>
                                        </div>
                                        <p>Xin chào <?= $_SESSION['nameuser'] ?></p>
                                    </a>
                                <?php } ?>
                                <a class="header_nav_user_list_link" href="index.php?act=cart">
                                    <div class="header_nav_user_list_link_logo">
                                        <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ffffff;"></i>
                                    </div>
                                    <p>Giỏ hàng</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu -->
            <div class="box_menu">
                <div class="mb menu">
                    <ul>
                        <li class="dropdown">
                            <a class="dropdownbtn" href="index.php">TRANG CHỦ</a>
                        <li class="dropdown">
                            <a class="dropdownbtn" href="index.php?act=gioithieu">GIỚI THIỆU</a>
                        <li class="dropdown">
                            <a class="dropdownbtn" href="index.php?act=sanpham">SẢN PHẨM</a>
                        <li class="dropdown">
                            <a class="dropdownbtn" href="index.php?act=dichvu">DỊCH VỤ</a>
                        <li class="dropdown">
                            <a class="dropdownbtn" href="index.php?act=khuyenmai">KHUYẾN MÃI</a>
                        <li class="dropdown">
                            <a class="dropdownbtn" href="index.php?act=tintuc">TIN TỨC</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- END HEADER -->
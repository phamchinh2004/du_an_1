<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/admin.css">
</head>

<body>
    <aside class="aside">
        <h1 style="font-size: 20px;margin: 10px 0;color: red;">SYSTEM MANAGER</h1>
        <div class="aside_menu">
            <ul class="aside_menu_list">
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="../../controller/admin.php?act=trangchu">Trang chủ</a>
                </li>
                <li class="aside_menu_list_item" tabindex="0">
                    <a class="aside_menu_list_item_link">Sản phẩm</a>
                    <ul class="aside_menu_list_item_hidden">
                        <li class="aside_menu_list_item_hidden_item">
                            <a class="aside_menu_list_item_hidden_item_link" href="../../controller/admin.php?act=listsp">- Quản lý sản phẩm</a>
                        </li>
                        <li class="aside_menu_list_item_hidden_item">
                            <a class="aside_menu_list_item_hidden_item_link" href="">- Sản phẩm bán chạy nhất</a>
                        </li>
                    </ul>
                </li>
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="">Danh mục</a>
                </li>
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="">Tính năng</a>
                </li>
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="">Đơn hàng</a>
                </li>
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="">Tài khoản</a>
                </li>
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="">Đánh giá</a>
                </li>
                <li class="aside_menu_list_item">
                    <a class="aside_menu_list_item_link" href="">Thống kê</a>
                </li>
            </ul>
        </div>
        <div>
        </div>
        <div class="logout">
            <a class="" href="">Đăng xuất</a>
        </div>
    </aside>
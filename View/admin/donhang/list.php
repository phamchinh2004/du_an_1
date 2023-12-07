<?php
if (isset($_GET['nhanSucc']) && $_GET['nhanSucc'] != "") {
    echo "<script>
            alert('" . $_GET['nhanSucc'] . "');
        </script>";
}else if (isset($_GET['huySucc']) && $_GET['huySucc'] != "") {
    echo "<script>
            alert('" . $_GET['huySucc'] . "');
        </script>";
} ?>
<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Quản lý đơn hàng</h1>
        </div>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <form action="index.php?act=listdh" method="POST">
                    <div class="listok">
                        <input type="number" placeholder="Tìm kiếm theo id đơn hàng" name="keyw" value="<?php echo htmlspecialchars($keyw); ?>">
                        <input type="submit" value="Tìm kiếm" name="listok">
                    </div>
                </form>
                <div class="arrange_loctk_forms">
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh">Tất cả</a>
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=1">Chờ xác nhận</a>
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=2">Đang giao hàng</a>
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=3">Đã giao hàng</a>
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=4">Đã hủy</a>
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=5">Trả hàng</a>
                </div>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Ngày đặt hàng</th>
                            <th>Số sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($listdh)) {
                            foreach ($listdh as $value) {
                                extract($value);
                                //LINK
                                $Chitiet = "index.php?act=chitietdonhang&iddh=" . $id;
                                $Nhan = "index.php?act=nhanDh&iddh=" . $id;
                                $Huy = "index.php?act=huyDh&iddh=" . $id;
                                //MESSAGE
                                $confirmNhan = "Xác nhận và đóng gói?";
                                $Cancle = "Bạn có chắc chắn muốn hủy đơn hàng này không?";
                                echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name_nguoi_nhan . '</td>
                                            <td>' . $sdt_nguoi_nhan . '</td>
                                            <td>' . $dia_chi_nhan_hang . '</td>
                                            <td>' . $ghi_chu . '</td>
                                            <td>' . $order_time     . '</td>
                                            <td>' . $so_luong . '</td>
                                            <td>' . $tong_tien . '</td>
                                            <td>';

                                if ($trangthai == 1) {
                                    echo '<a href="' . $Chitiet . '"> <input type="button" value="Xem chi tiết"> </a>';
                                    echo '<a href="' . $Nhan . '"> <input type="button" value="Nhận và đóng gói" onclick="return confirm(\'' . $confirmNhan . '\')"> </a>';
                                    echo '<a href="' . $Huy . '"> <input type="button" value="Hủy" onclick="return confirm(\'' . $Cancle . '\')"> </a>';
                                } else {
                                    echo '<a href="' . $Chitiet . '"> <input type="button" value="Xem chi tiết"> </a>';
                                }
                                echo '</td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='11'>Chưa có đơn hàng nào</td>
                                </tr>";
                        } ?>
                    </table>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
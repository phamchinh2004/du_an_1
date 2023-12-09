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
            <h1>ĐƠN HÀNG HIỆN CÓ</h1>
        </div>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <div class="arrange_loctk_forms">
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=6">Hiện có</a>
                    <a class="listok arrange_loctk_forms_link" href="index.php?act=listdh&trangthai=2">Đang giao hàng</a>
                </div>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Số sản phẩm</th>
                            <th>Tổng tiền</th>
                            
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($listdh)) {
                            foreach ($listdh as $value) {
                                extract($value);
                                //LINK
                                $Nhan = "index.php?act=nhanDhShip&iddh=" . $id;
                                $Huy = "index.php?act=huyDhShip&iddh=" . $id;
                                $Done="index.php?act=doneDh&iddh=" . $id;
                                //MESSAGE
                                $confirmNhan = "Xác nhận giao đơn hàng này?";
                                $Cancle = "Bạn có chắc chắn không nhận đơn hàng này không?";
                                $confirmDone="Xác nhận đã giao đơn hàng này?";
                                
                                echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name_nguoi_nhan . '</td>
                                            <td>' . $sdt_nguoi_nhan . '</td>
                                            <td>' . $dia_chi_nhan_hang . '</td>
                                            <td>' . $ghi_chu . '</td>
                                            <td>' . $so_luong . '</td>
                                            <td>' .$tong_tien. 'đ</td>
                                            
                                            <td>';

                                if ($trangthai == 6) {
                                    echo '<a href="' . $Nhan . '"> <input type="button" value="Nhận" onclick="return confirm(\'' . $confirmNhan . '\')"> </a>';
                                    echo '<a href="' . $Huy . '"> <input type="button" value="Không nhận" onclick="return confirm(\'' . $Cancle . '\')"> </a>';
                                }else if ($trangthai == 2) {
                                    echo '<a href="' . $Done . '"> <input type="button" value="Xong" onclick="return confirm(\'' . $confirmDone . '\')"> </a>';
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
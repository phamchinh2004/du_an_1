<div class="content">
    <div class="box_content">
        <br>
        <div class="box_content font_title">
            <?php
            if (isset($chiTietDonHang[0]['id_don_hang'])) :
                echo '<h1>Đơn hàng có ID: ' . $chiTietDonHang[0]['id_don_hang'] . '</h1>';
            else :
                echo '<h1>Không tìm thấy id đơn hàng</h1>';
            endif;
            ?>

        </div>
        <!-- Lấy id tính năng để thêm mới cho id tính năng chi tiết -->
        <div class="box_content form_content ">
            <form>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                        <?php if (isset($chiTietDonHang) && $chiTietDonHang != "") {
                            foreach ($chiTietDonHang as $values) {
                                extract($values);
                                echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $namesp . '</td>
                            <td>' . $so_luong . '</td>
                            <td>' . $tongtien . '</td>
                        </tr>';
                            }
                        } ?>
                    </table>
                    <br>
                    <a href="index.php?act=listdh"><input class="mr20" type="button" value="QUAY LẠI"></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>
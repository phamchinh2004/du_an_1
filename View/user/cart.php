<div class="content_cart">
    <div class="box_content_cart">
        <div class="box_content_cart font_title_cart">
            <h1>Giỏ hàng</h1>
        </div>
        <div class="box_content_cart form_content_cart ">
            <form action="#" method="POST">
                <form action="index.php?act=listsp" method="POST">
                    <div class="listok_cart">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="kyw">
                        <select name="iddm" id="">
                            <option value="0" selected>Danh mục</option>
                            <?php
                            foreach ($loadAllDm as $value) {
                                extract($value);
                                echo '<option value="' . $id . '" ' . (($iddm == $id) ? 'selected' : '') . '>' . $name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" value="Lọc" name="listok">
                    </div>
                </form>
                <?php
                if (isset($thanhcong)) {
                    echo "<span style='color:green;'>$thanhcong</span>";
                } else if (isset($deleteSoft)) {
                    echo "<span style='color:green;'>$deleteSoft</span>";
                } else if (isset($deleteHard)) {
                    echo "<span style='color:green;'>$deleteHard</span>";
                }
                ?>
                <div class="box_content_cart form_loai_cart ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Lượt xem</th>
                            <th>Lượt mua</th>
                            <th>Lượt đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($listSpCart)) {
                            foreach ($listSpCart as $value) {
                                extract($value);
                                $hinhpath = "../../public/image/" . $hinhanh;
                                if (is_file($hinhpath)) {
                                    $hinhpath = "<img src='" . $hinhpath . "' width='150px' height='100px'>";
                                } else {
                                    $hinhpath = "Chưa có hình ảnh";
                                }
                                if ($luotmua == "") {
                                    $luotmua = "Chưa có lượt mua";
                                } else if ($luotvote == "") {
                                    $luotvote = "Chưa có lượt đánh giá nào";
                                }
                                $DeleteSpCart = "index.php?act=hardDeleteSp&idsp=" . $id;
                                echo    '<tr>
                                            <td><input type="checkbox" value="' . $id . '"></td>
                                            <td>' . $name . '</td>
                                            <td>' . $hinhpath . '</td>
                                            <td>' . $gianhap . '</td>
                                            <td>' . $giaban . '</td>
                                            <td>' . $soluong . '</td>
                                            <td>' . $luotxem . '</td>
                                            <td>' . $luotmua . '</td>
                                            <td>' . $luotvote . '</td>
                                            <td>
                                                <a href="' . $DeleteSpCart . '"> <input type="button" value="Xóa cứng" onclick="return confirm(\'Bạn có chắc chắn muốn xóa cứng? Điều này sẽ xóa vĩnh viễn sản phẩm khỏi giỏ hàng của bạn!\')"> </a>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                            <td><input type='checkbox'></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type='number'></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=''> <input type='button' value='Xóa cứng' onclick='return confirm(\"Bạn có chắc chắn muốn xóa cứng? Điều này sẽ xóa vĩnh viễn sản phẩm khỏi giỏ hàng của bạn!\")'> </a>
                            </td>
                            <td>Không tìm thấy sản phẩm nào</td>
                                </tr>";
                        } ?>
                    </table>
                </div>
            </form>
        </div>
    </div>

</div>
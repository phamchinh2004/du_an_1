<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Danh sách sản phẩm</h1>
        </div>
        <a href="index.php?act=addsp"> <input class="spadm" type="button" value="Thêm sản phẩm"></a>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <form action="index.php?act=listsp" method="POST">
                    <div class="listok">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="kyw">
                        <select name="iddm" id="">
                            <option value="0" selected>Danh mục</option>
                            <?php
                            foreach ($loadAllDm as $value) {
                                extract($value);
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" value="Lọc" name="listok">
                    </div>
                </form>
                <?php
                if (isset($thanhcong)) {
                    echo "<span style='color:green;'>$thanhcong</span>";
                }
                ?>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Lượt xem</th>
                            <th>Lượt mua</th>
                            <th>Lượt đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($listSp)) {
                            foreach ($listSp as $value) {
                                extract($value);
                                $hinhpath = "../../public/image/" . $hinhanh;
                                if (is_file($hinhpath)) {
                                    $hinhpath = "<img src='" . $hinhpath . "' width='30px' height='30px'>";
                                } else {
                                    $hinhpath = "Chưa có hình ảnh";
                                }
                                if ($luotmua == "") {
                                    $luotmua = "Chưa có lượt mua";
                                } else if ($luotvote == "") {
                                    $luotvote = "Chưa có lượt đánh giá nào";
                                }
                                $suaSp = "index.php?act=suaSp&idsp=" . $id;
                                echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $gianhap . '</td>
                                            <td>' . $giaban . '</td>
                                            <td>' . $hinhpath . '</td>
                                            <td>' . $soluong . '</td>
                                            <td>' . $luotxem . '</td>
                                            <td>' . $luotmua . '</td>
                                            <td>' . $luotvote . '</td>
                                            <td>
                                                <a href="suasp.php"> <input type="button" value="Thêm tính năng"> </a>
                                                <a href="suasp.php"> <input type="button" value="Thêm ảnh"> </a> 
                                                <a href="' . $suaSp . '"> <input type="button" value="Sửa"> </a> 
                                                <a href="xoasp.php"> <input type="button" value="Xóa mềm"> </a>
                                                <a href="xoasp.php"> <input type="button" value="Xóa cứng"> </a>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='10'>Không tìm thấy sản phẩm nào</td>
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
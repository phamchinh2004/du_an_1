<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>THÊM SẢN PHẨM BÁN CHẠY</h1>
        </div>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <form action="index.php?act=addTopSp" method="POST">
                    <div class="listok">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="kyw" value="<?php echo htmlspecialchars($keyw); ?>">
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
                if (isset($_SESSION['thanhcong']) && $_SESSION['thanhcong'] != '') {
                    echo '<span style="color:green;">' . $_SESSION['thanhcong'] . '</span>';
                    unset($_SESSION['thanhcong']);
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
                        <?php if (!empty($listAddSpTop)) {
                            foreach ($listAddSpTop as $value) {
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
                                $addSpTopDone = "index.php?act=addSpTopDone&idsp=" . $id;
                                echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $hinhpath . '</td>
                                            <td>' . $gianhap . '</td>
                                            <td>' . $giaban . '</td>
                                            <td>' . $soluong . '</td>
                                            <td>' . $luotxem . '</td>
                                            <td>' . $luotmua . '</td>
                                            <td>' . $luotvote . '</td>
                                            <td>
                                                <a href="' . $addSpTopDone . '"> <input type="button" value="Thêm"> </a>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='10'>Không tìm thấy sản phẩm nào</td>
                                </tr>";
                        } ?>
                    </table>
                    <a href="index.php?act=topsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
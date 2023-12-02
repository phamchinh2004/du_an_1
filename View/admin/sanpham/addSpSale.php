<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Thêm sản phẩm giảm giá</h1>
        </div>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <form action="index.php?act=addSpgg" method="POST">
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
                if (isset($_GET['addSuc']) && $_GET['addSuc'] != '') {
                    echo '<span style="color:green;">' . $_GET['addSuc'] . '</span>';
                    $_GET['addSuc'] = "";
                } else if ((isset($_GET['addFail']) && $_GET['addFail'] != '')) {
                    echo '<span style="color:red;">' . $_GET['addFail'] . '</span>';
                    $_GET['addFail'] = "";
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
                        <?php if (!empty($listAddSpGG)) {
                            foreach ($listAddSpGG as $value) {
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
                                $addSpSaleDone = "index.php?act=addSpSaleDone";
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
                                                <form action="index.php?act=addSpSaleDone" method="POST">
                                                <input type="text" name="idsp" value="'.$id.'" hidden>
                                                <label>Nhập % giảm giá</label>
                                                <input type="number" name="valueGiamgia" min="0" max="99">
                                                <input type="submit" name="them" value="Thêm">
                                                </form>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='10'>Không tìm thấy sản phẩm nào</td>
                                </tr>";
                        } ?>
                    </table>
                    <a href="index.php?act=salesp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
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
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="kyw" value="<?php echo htmlspecialchars($keyw); ?>">
                        <select name="iddm" id="">
                            <option value="0" selected>Danh mục</option>
                            <?php
                            foreach ($loadAllDm as $value) {
                                extract($value);
                                echo '<option value="' . $id . '" ' . (($id_dm == $id) ? 'selected' : '') . '>' . $name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" value="Lọc" name="listok">
                    </div>
                </form>
                <?php
                if (isset($_SESSION['addSucc'])) {
                    echo '<span style="color:green;">' . $_SESSION['addSucc'] . '</span>';
                    unset($_SESSION['addSucc']);
                }else if (isset($deleteSoft)) {
                    echo "<span style='color:green;'>$deleteSoft</span>";
                }else if (isset($deleteHard)) {
                    echo "<span style='color:green;'>$deleteHard</span>";
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
                                    $hinhpath = "<img src='" . $hinhpath . "' width='150px' height='100px'>";
                                } else {
                                    $hinhpath = "Chưa có hình ảnh";
                                }
                                if ($luotmua == "") {
                                    $luotmua = "Chưa có lượt mua";
                                } else if ($luotvote == "") {
                                    $luotvote = "Chưa có lượt đánh giá nào";
                                }
                                $suaSp = "index.php?act=suaSp&idsp=" . $id;
                                $addImgSp="index.php?act=addImgSp&idsp=" . $id;
                                $addTnSp="index.php?act=addTnSp&idsp=" . $id;
                                $softDeleteSp="index.php?act=softDeleteSp&idsp=" . $id;
                                // $hardDeleteSp="index.php?act=hardDeleteSp&idsp=" . $id;
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
                                                <a href="'.$addTnSp.'"> <input type="button" value="Thêm tính năng"> </a>
                                                <a href="'.$addImgSp.'"> <input type="button" value="Thêm ảnh"> </a> 
                                                <a href="' . $suaSp . '"> <input type="button" value="Sửa"> </a> 
                                                <a href="'.$softDeleteSp.'"> <input type="button" value="Xóa mềm" 
                                                onclick="return confirm(\'Bạn có chắc chắn muốn xóa mềm? Điều này sẽ đặt trạng thái của sản phẩm
                                                 thành 0 và ở những trang hiển thị sản phẩm chỉ xem được những sản phẩm có trạng thái là 1!\')"> </a>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='10'>Không tìm thấy sản phẩm nào</td>
                                </tr>";
                        } ?>
                    </table>                                                
                    <!-- <a href="'.$hardDeleteSp.'"> <input type="button" value="Xóa cứng" onclick="return confirm(\'Bạn có chắc chắn muốn xóa cứng? Điều này sẽ xóa vĩnh viễn sản phẩm!\')"> </a> -->

                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Sản phẩm bán chạy nhất</h1>
        </div>
        <a href="index.php?act=addTopSp"> <input class="spadm" type="button" value="Thêm sản phẩm"></a>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <?php
                if (isset($thanhcong)) {
                    echo "<span style='color:green;'>$thanhcong</span>";
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
                                $DeleteSpTop="index.php?act=DeleteTopSp&idsp=" . $id;
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
                                                <a href="'.$DeleteSpTop.'"> <input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa cứng?\')"> </a>
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
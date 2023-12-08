<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Danh sách sản phẩm đã được đánh giá</h1>
        </div>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Lượt xem</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($listSp)) {
                            foreach ($listSp as $value) {
                                extract($value);
                                $loadVoteSp = "index.php?act=loadVoteSp&idsp=" . $id;
                                echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $gianhap . '</td>
                                            <td>' . $giaban . '</td>
                                            <td>' . $soluong . '</td>
                                            <td>' . $luotxem . '</td>
                                            <td>
                                                <a href="'.$loadVoteSp.'"> <input type="button" value="Xem đánh giá"> </a>
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
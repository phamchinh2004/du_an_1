<div class="content">
    <div class="box_content">
        <?php
        if (isset($thanhcong)) {
            echo "<span style='color:green;'>$thanhcong</span>";
        }
        ?>
        <br>
        <div class="box_content font_title">
            <h1>Danh sách tính năng</h1>
        </div>
        <a href="index.php?act=addtn"> <input class="spadm" type="button" value="Thêm tính năng"></a>
        <div class="box_content form_content ">
            <form>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên tính năng</th>
                            <th>Tổng value</th>
                            <th></th>
                        </tr>
                        <?php foreach ($tinhnang as $value) {
                            extract($value);
                            echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $tongValue . '</td>
                            <td>
                                <a href="index.php?act=tnct&idtn="> <input type="button" value="Xem chi tiết"> </a> 
                                <a href="index.php?act=suatn&idtn='.$id.'"> <input type="button" value="Sửa"> </a> 
                            </td>
                        </tr>';
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
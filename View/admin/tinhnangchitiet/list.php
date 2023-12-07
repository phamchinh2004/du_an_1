<div class="content">
    <div class="box_content">
        <?php
        if (isset($thanhcong)) {
            echo "<span style='color:green;'>$thanhcong</span>";
        }
        ?>
        <br>
        <div class="box_content font_title">
            <h1><?=$tnParent['name']?></h1>
        </div>
        <!-- Lấy id tính năng để thêm mới cho id tính năng chi tiết -->
        <a href="index.php?act=addtnct&idtn=<?=$tnParent['id']?>"> <input class="spadm" type="button" value="Thêm value"></a>
        <div class="box_content form_content ">
            <form>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Giá trị</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if(isset($listTnct)&& $listTnct!=""){
                            foreach ($listTnct as $values) {
                            extract($values);
                            echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $value . '</td>
                            <td>' . $nameDm . '</td>
                            <td>
                                <a href="index.php?act=suatnct&idtnct='.$id.' &idtn='.$tnParent['id'].'"> <input type="button" value="Sửa"> </a> 
                            </td>
                        </tr>';
                        }}else{
                            echo "<tr>
                                <td colspan='4'>Chưa có giá trị nào</td>
                            </tr>";
                        } ?>
                    </table>
                    <br>
                    <a href="index.php?act=listtn"><input class="mr20" type="button" value="QUAY LẠI"></a>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
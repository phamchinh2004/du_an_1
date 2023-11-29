<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Danh sách loại hàng</h1>
        </div>
        <a href="index.php?act=addDm"> <input class="spadm" type="button" value="Thêm danh mục"></a>
        <?php
            if(isset($imgSuc)){
                echo "<span style='color:green;'>$imgSuc</span>";
            }
        ?>
        <div class="box_content form_content">
            <form action="" method="POST">
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach ($listdm as $value) {
                            extract($value);
                            $hinhpath="../../public/image/".$img;
                            $sua="index.php?act=suaDm&iddm=".$id;
                            $xoa="index.php?act=xoaDm&iddm=".$id;
                            if(is_file($hinhpath)){
                                $hinhpath="<img src='".$hinhpath."' width='100px' height='120px'>";
                            }else{
                                $hinhpath="Chưa có hình ảnh";
                            }
                            echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$hinhpath.'</td>
                                    <td>
                                        <a href="'.$sua.'"> <input type="button" value="Sửa"> </a> 
                                        <a href="'.$xoa.'"> <input type="button" value="Xóa"> </a> 
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
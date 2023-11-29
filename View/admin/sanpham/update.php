<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>SỬA SẢN PHẨM</h1>
        </div>
        <div class="box_content form_content">
            <?php if(isset($failed)){
                    echo "<span style='color:red;'>$failed</span>";
                }else if(isset($succ)){
                    echo "<span style='color:green;'>$succ</span>";
                }?>
            <form action="index.php?act=updateSpDone" method="POST" enctype="multipart/form-data">
                <?php
                    if(isset($OldDataSp)){
                        extract($OldDataSp);
                    }
                ?>
                <div class="row mb10 box_content">
                    <br>
                    <div class="mr20">
                        <label> Danh mục </label> <br>
                        <select name="iddm" id="">
                            <?php
                            foreach ($loadAllDm as $value) {
                                extract($value);
                                echo '<option value="' . $id . '" ' . (($id == $iddanhmuc) ? 'selected' : '') . '>' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="text" value="<?=$OldDataSp['id']?>" hidden name="idsp">
                <div class="box_content mb10">
                    <label>Tên sản phẩm </label> <br>
                    <input type="text" name="tensp" value="<?=$OldDataSp['name']?>" placeholder="Nhập vào tên">
                </div>
                <div class="box_content mb10">
                    <label>Giá nhập </label> <br>
                    <input type="text" name="gianhap" value="<?=$gianhap?>" placeholder="Nhập vào giá nhập">
                </div>
                <div class="box_content mb10">
                    <label>Giá bán </label> <br>
                    <input type="text" name="giaban" value="<?=$giaban?>" placeholder="Nhập vào giá bán">
                </div>
                <div class="box_content mb10">
                    <label>Số lượng </label> <br>
                    <input type="text" name="soluong" value="<?=$soluong?>" placeholder="Nhập vào số lượng">
                </div>
                <div class="box_content mb10">
                    <label>Mô tả sản phẩm </label> <br>
                    <textarea name="mota" cols="30" value="<?=$mota?>" rows="5"></textarea>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="CÂP NHẬT" name="update">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>

</div>
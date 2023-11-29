<div class="content">
    <div class="box_content">
        <?php
            if(isset($succFile)){
                echo "<span style='color:green;'>$succFile</span>";
            }else if(isset($failFile)){
                echo "<span style='color:red;'>$failFile</span>";
            }else if(isset($messError)){
                echo "<span style='color:red;'>$messError</span>";
            }
        ?>
        <div class="box_content font_title">
            <h1>THÊM MỚI ẢNH</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=addImgSpDone" method="POST" style="line-height: 40px;" enctype="multipart/form-data">
                <input type="text" value="<?php echo (isset($OldDataSp))? $OldDataSp['id']:""?>" hidden name="idsp">
                <div class="box_content mb10">
                    <label>Tên sản phẩm</label> <br>
                    <input type="text" name="tensp" value="<?php echo (isset($OldDataSp))? $OldDataSp['name']:""?>" readonly>
                </div>
                <div class="box_content mb10">
                    <label>Thêm hình ảnh</label> <br>
                    <input type="file" name="img" required>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content">
    <div class="box_content">
        <?php
            if(isset($mess)){
                echo "<span style='color:red;'>$mess</span>";
            }
        ?>
        <div class="box_content font_title">
            <h1>THÊM GIÁ TRỊ</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=addtnctDone&idtn=<?=$tnParent['id']?>" method="POST">
                <div class="box_content mb10">
                    <label>Tính năng</label> <br>
                    <input type="text" name="tentn" placeholder="Nhập vào giá trị" value="<?=$tnParent['name']?>" required readonly disabled>
                </div>
                <div class="box_content mb10">
                    <label>Giá trị</label> <br>
                    <input type="text" name="tenvalue" placeholder="Nhập vào giá trị" required>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtnct&idtn=<?=$tnParent['id']?>"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
</div>
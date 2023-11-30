<div class="content">
    <div class="box_content">
        <?php
            if(isset($mess)){
                echo "<span style='color:red;'>$mess</span>";
            }else if(isset($thanhcong)){
                echo "<span style='color:green;'>$thanhcong</span>";
            }
        ?>
        <div class="box_content font_title">
            <h1>THÊM SẢN PHẨM BÁN CHẠY</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=addSpTopDone" method="POST" style="line-height: 40px;">
                <div class="box_content mb10">
                    <label>Nhập vào id sản phẩm</label> <br>
                    <input type="number" name="idsp" placeholder="Nhập vào id" required>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=topsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
</div>
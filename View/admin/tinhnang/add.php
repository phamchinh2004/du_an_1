<div class="content">
    <div class="box_content">
        <?php
            if(isset($mess)){
                echo "<span style='color:red;'>$mess</span>";
            }
        ?>
        <div class="box_content font_title">
            <h1>THÊM MỚI TÍNH NĂNG</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=addtnDone" method="POST">
                <div class="box_content mb10">
                    <label>Tên tính năng </label> <br>
                    <input type="text" name="tentn" placeholder="Nhập vào tên" required>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtn"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
</div>
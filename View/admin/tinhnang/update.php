<div class="content">
    <div class="box_content">
        <!-- Hiển thị thông báo lỗi nếu sửa tên tính năng mới mà trùng với tên tính năng đã có trên hệ thống -->
        <?php
            if(isset($mess)){
                echo "<span style='color:red;'>$mess</span>";
            }
        ?>
        <div class="box_content font_title">
            <h1>SỬA TÊN TÍNH NĂNG</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=updateTnDone&idtn=<?=$tenTnOld['id']?>" method="POST"><!--Lấy id tn sang bên index để hệ thống biết là sửa tính năng nào-->
                <div class="box_content mb10">
                    <label>Tên tính năng </label> <br>
                    <input type="text" name="tentn" placeholder="Nhập vào tên" value="<?=$tenTnOld['name']?>" required>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="CẬP NHẬT" name="sua">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtn"><input class="mr20" type="button" value="QUAY LẠI"></a>
                </div>
            </form>
        </div>
    </div>
</div>
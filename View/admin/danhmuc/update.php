<div class="content">
    <div class="box_content">
        <!-- Hiển thị thông báo lỗi nếu sửa tên tính năng mới mà trùng với tên tính năng đã có trên hệ thống -->
        <?php
            if(isset($mess)){
                echo "<span style='color:red;'>$mess</span>";
            }
        ?>
        <div class="box_content font_title">
            <h1>SỬA DANH MỤC</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=updateDmDone&iddm=<?=$odlDataDm['id']?>" method="POST" enctype="multipart/form-data"><!--Lấy id tn sang bên index để hệ thống biết là sửa tính năng nào-->
                <div class="box_content mb10">
                    <label>Tên danh mục</label> <br>
                    <input type="text" name="tendm" placeholder="Nhập vào tên" value="<?=$odlDataDm['name']?>" required>
                </div>
                <?php
                    $imgOld="../../public/image/".$odlDataDm['img'];
                    if(is_file($imgOld)){
                        echo '<div class="box_content mb10">
                                <label>Ảnh cũ</label> <br>
                                <img src="'.$imgOld.'" width="100px" height="100px">
                            </div>';
                    }else{
                        echo '<label style="color:red;">Danh mục này chưa có ảnh</label>';
                    }
                ?>
                <div class="box_content mb10">
                    <label>Tải ảnh mới</label> <br>
                    <input type="file" name="imgNew">
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="CẬP NHẬT" name="sua">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listdm"><input class="mr20" type="button" value="QUAY LẠI"></a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content">
    <div class="box_content">
        <!-- Hiển thị thông báo lỗi nếu sửa tên tính năng chi tiết mới trùng với tên tính năng chi tiết đã có trên hệ thống -->
        <?php
        if(isset($mess)){
            foreach($mess as $key => $value){
            echo "<span style='color:red;'>$value</span><br>";
            }
        }
        ?>
        <div class="box_content font_title">
            <h1>SỬA VALUE</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=updateTnctDone&idtnct=<?= $tenTnctOld['id'] ?>&idtn=<?=$tnParent['id']?>" method="POST"><!--Lấy id tnct sang bên index để hệ thống biết là sửa tính năng nào-->
                <div class="listok">
                    <select name="iddm" id="">
                        <option value="0" selected>Danh mục</option>
                        <?php
                        foreach ($loadAllDm as $value) {
                            extract($value);
                            echo '<option value="' . $id . '" ' . (($tenTnctOld['iddm'] == $id) ? 'selected' : '') . '>' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="box_content mb10">
                    <label>Tính năng</label> <br>
                    <input type="text" name="idtn" value="<?= $tnParent['name'] ?>" required readonly disabled>
                </div>
                <div class="box_content mb10">
                    <label>Tên giá trị</label> <br>
                    <input type="text" name="tenvalue" placeholder="Nhập vào giá trị" value="<?= $tenTnctOld['value'] ?>" required>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="CẬP NHẬT" name="sua">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtnct&idtn=<?=$tnParent['id']?>"><input class="mr20" type="button" value="QUAY LẠI"></a>
                </div>
            </form>
        </div>
    </div>
</div>
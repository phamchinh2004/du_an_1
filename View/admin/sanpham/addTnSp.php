<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>THÊM MỚI SẢN PHẨM</h1>
        </div>
        <div class="box_content form_content">
            <?php if (isset($needSelect)) {
                echo "<span style='color:red;'>$needSelect</span>";
            }else if (isset($mess)) {
                echo "<span style='color:red;'>$mess</span>";
            } else if (isset($thanhcong)) {
                echo "<span style='color:green;'>$thanhcong</span>";
            } ?>
                <form action="index.php?act=loadTnct" method="POST">
                    <div class="listok">
                        <select name="idtn" id="">
                            <?php
                            foreach ($loadAllTn as $value) {
                                extract($value);
                                // Kiểm tra nếu $id tính năng trong option trùng với id tính năng được chọn, thêm thuộc tính "selected"
                                echo '<option value="' . $id . '" ' . (isset($idtn)&&($idtn == $id) ? 'selected' : '') . '>' . $name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="text" value="<?php if(isset($idsp)){echo $idsp;}?>" hidden name="idsp">
                        <input type="submit" value="Lọc" name="listok">
                    </div>
                </form>
            <form action="index.php?act=addTnSpDone" method="POST" enctype="multipart/form-data">
            <div class="listok">
                <?php
                if (isset($idtn) && isset($loadTnct)&& !empty($loadTnct)) {
                    echo '<select name="idtnct" id="">';
                    foreach ($loadTnct as $values) {
                        extract($values);
                        echo '<option value="' . $id . '"';
                        // Kiểm tra nếu $id là phần tử đầu tiên của mảng, thêm thuộc tính "selected"
                        if($id == $loadTnct[0]['id']){
                            echo "selected";
                        }
                        echo '>' . $value . '</option>';
                    }
                    echo '</select>';
                }
                ?>
            </div>
                <input type="text" value="<?php if(isset($idtn)){echo $idtn;}?>" hidden name="idtn">
                <input type="text" value="<?php if(isset($idsp)){echo $idsp;}?>" hidden name="idsp">
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>

</div>
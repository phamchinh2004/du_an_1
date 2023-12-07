<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>THÊM TÀI KHOẢN</h1>
        </div>
        <div class="box_content form_content">
            <?php
            if (isset($_SESSION['imgFail']) && ($_SESSION['imgFail']!="")) {
                echo '<div style="color: red;">' . $_SESSION['imgFail'] . '</div>';
                unset($_SESSION['imgFail']); // Xóa thông báo sau khi hiển thị
            }
            if (isset($_SESSION['error']) && ($_SESSION['error']!="")) {
                foreach($_SESSION['error'] as $error){
                    echo '<div style="color: red;">' . $error . '</div>';
                }
                unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị
            }
            ?>
            <form action="index.php?act=addTkDone" method="POST" enctype="multipart/form-data">
                <div class="box_content mb10">
                    <label>Tên người dùng </label> <br>
                    <input type="text" name="name" value="" placeholder="Nhập vào tên">
                </div>
                <div class="box_content mb10">
                    <label>Username </label> <br>
                    <input type="text" name="username" value="" placeholder="Nhập vào tên đăng nhập">
                </div>
                <div class="box_content mb10">
                    <label>Password </label> <br>
                    <input type="password" name="password" value="" placeholder="Nhập vào mật khẩu" onpaste="return false;">
                </div>
                <div class="box_content mb10">
                    <label>Repassword </label> <br>
                    <input type="password" name="repassword" value="" placeholder="Xác nhận mật khẩu" onpaste="return false;">
                </div>
                <div class="box_content mb10">
                    <label>Upload avatar</label> <br>
                    <input type="file" name="avatar">
                </div>
                <div class="box_content mb10">
                    <label>Email </label> <br>
                    <input type="email" name="email" value="" placeholder="Nhập vào email">
                </div>
                <div class="box_content mb10">
                    <label>Số điện thoại </label> <br>
                    <input type="number" name="tel" value="" placeholder="Nhập vào số điện thoại">
                </div>
                <div class="box_content mb10">
                    <label>Địa chỉ</label> <br>
                    <input type="text" name="address" value="" placeholder="Nhập vào địa chỉ">
                </div>
                <div class="box_content mb10">
                    <label>Vai trò </label> <br>
                    <select name="role" id="">
                        <?php
                        if(isset($listRole)){
                            foreach($listRole as $value){
                                extract($value);?>
                                <option value="<?=$id?>"><?=$name?></option>
                            <?php }}?>
                    </select>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtk"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>

</div>
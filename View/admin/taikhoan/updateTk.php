<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>SỬA TÀI KHOẢN</h1>
        </div>
        <div class="box_content form_content">
            <?php if (isset($ImgFail)) {
                echo "<span style='color:red;'>$ImgFail</span><br>";
            } else if (isset($ImgSusc)) {
                echo "<span style='color:green;'>$ImgSusc</span><br>";
            }
            if (isset($_SESSION['error'])&& $_SESSION['error']!="") {
                foreach ($_SESSION['error'] as $mess) {
                    echo "<span style='color:red;'>$mess</span><br>";
                }
                unset($_SESSION['error']);
            } 
            if (isset($_SESSION['update_failed'])) {
                echo '<div style="color: red;">' . $_SESSION['update_failed'] . '</div>';
                unset($_SESSION['update_failed']); // Xóa thông báo sau khi hiển thị
            }
            ?>
            <form action="index.php?act=updateTkDone" method="POST" enctype="multipart/form-data">
                <?php
                if (isset($OldDataTk)) {
                    extract($OldDataTk);
                    echo '
                <input type="text" value="' . $id . '" hidden name="idtk">
                <div class="box_content mb10">
                    <label>Tên người dùng </label> <br>
                    <input type="text" name="name" value="' . $name . '" placeholder="Nhập vào tên">
                </div>
                <div class="box_content mb10">
                    <input type="text" name="usernameOld" value="' . $username . '" placeholder="Nhập vào tên đăng nhập" hidden>
                </div>
                <div class="box_content mb10">
                    <label>Username </label> <br>
                    <input type="text" name="username" value="' . $username . '" placeholder="Nhập vào tên đăng nhập">
                </div>
                <div class="box_content mb10">
                    <label>Password </label> <br>
                    <input type="text" name="password" value="' . $password . '" placeholder="Nhập vào mật khẩu">
                </div>';

                    $imgOld = "../../public/image/" . $avatar;
                    if (is_file($imgOld)) {
                        echo '<div class="box_content mb10">
                                <label>Old avatar</label> <br>
                                <img src="' . $imgOld . '" width="100px" height="100px">
                            </div>';
                    } else {
                        echo '<label style="color:red;">Chưa có avatar</label>';
                    }
                    echo '
                <div class="box_content mb10">
                    <input type="text" name="oldAvatar" value="' . $avatar . '" hidden>
                </div>
                <div class="box_content mb10">
                    <label>Upload new avatar</label> <br>
                    <input type="file" name="avatarNew">
                </div>
                <div class="box_content mb10">
                    <label>Email </label> <br>
                    <input type="email" name="email" value="' . $email . '" placeholder="Nhập vào email">
                </div>
                <div class="box_content mb10">
                    <label>Số điện thoại </label> <br>
                    <input type="number" name="tel" value="' . $tel . '" placeholder="Nhập vào số điện thoại">
                </div>
                <div class="box_content mb10">
                    <label>Địa chỉ</label> <br>
                    <input type="text" name="address" value="' . $address . '" placeholder="Nhập vào địa chỉ">
                </div>
                <div class="box_content mb10">
                    <label>Vai trò </label> <br>
                    <input type="number" name="role" value="' . $role . '" placeholder="Nhập vào vai trò">
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="CẬP NHẬT" name="update">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listtk"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
                ';
                } ?>
            </form>
        </div>
    </div>

</div>
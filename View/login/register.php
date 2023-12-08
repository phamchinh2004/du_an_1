<div class="register-form">
        <?php
        if (isset($_SESSION['imgFail']) && ($_SESSION['imgFail']!="")) {
            echo '<span style="color: red;">' . $_SESSION['imgFail'] . '</span>';
            unset($_SESSION['imgFail']); // Xóa thông báo sau khi hiển thị
        }
        if (isset($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $mess) {
                echo "<span style='color:red;font-size:20px;'>$mess</span><br>";
            }
            unset($_SESSION['error']);
        }
        ?>
        <form class="box-register" action="index.php?act=sendRegister" method="POST" enctype="multipart/form-data">
        <h2 class="title_login">Đăng Ký</h2>
            <div class="form-register">
                <label>Tên người dùng </label>
                <input type="text" name="name" value="" placeholder="Nhập vào tên">
            </div>
            <div class="form-register">
                <label>Email </label>
                <input type="email" name="email" value="" placeholder="Nhập vào email">
            </div>
            <div class="form-register">
                <label>Tên đăng nhập </label>
                <input type="text" name="username" value="" placeholder="Nhập vào tên đăng nhập">
            </div>
            <div class="form-register">
                <label>Mật khẩu </label>
                <input type="password" name="password" value="" placeholder="Nhập vào mật khẩu" onpaste="return false;">
            </div>
            <div class="form-register">
                <label>Nhập lại mật khẩu </label>
                <input type="password" name="repassword" value="" placeholder="Xác nhận mật khẩu" onpaste="return false;">
            </div>
            <div class="form-register">
                <label>Ảnh đại diện</label>
                <input type="file" name="avatar">
            </div>
            <div class="form-register">
                <label>Số điện thoại </label>
                <input type="number" name="tel" value="" placeholder="Nhập vào số điện thoại">
            </div>
            <div class="form-register">
                <label>Địa chỉ</label>
                <input type="text" name="address" value="" placeholder="Nhập vào địa chỉ">
            </div>

                <button type="submit" name="btnsubmit">Đăng Ký</button>
        </form>
</div>

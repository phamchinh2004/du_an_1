<div class="login-form">
        <?php
        if (!empty($thongbao)) {
            foreach ($thongbao as $tb) {
                echo "<span style='color:red;font-size:20px;'>$tb</span>";
            }
        }
        ?>
        <h2 class="title_login">Đăng Nhập</h2>
        <form action="index.php?act=sendLogin" method="POST">
            <div class="form-group">
                <label for="username">Tài khoản:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="additional-options">
                <div class="register_css">Bạn chưa có tài khoản? <a href=""><u style="color: red;">Đăng ký</u></a> ngay!</div>
                <a class="forget_css" href="#">Quên mật khẩu?</a>
            </div>
            <div class="form-group">
                <button type="submit" name="btnsubmit">Đăng Nhập</button>
            </div>
        </form>

    </div>

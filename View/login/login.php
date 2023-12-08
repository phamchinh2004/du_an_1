<div class="login-form">
    <?php
    if (isset($_SESSION['addTkDone'])) {
        echo '<div style="color: green;">' . $_SESSION['addTkDone'] . '</div>';
        unset($_SESSION['addTkDone']); // Xóa thông báo sau khi hiển thị
    }
    if (isset($_SESSION['errorLogin'])) {
        foreach ($_SESSION['errorLogin'] as $mess) {
            echo "<span style='color:red;font-size:20px;'>$mess</span><br>";
        }
        unset($_SESSION['errorLogin']);
    }
    ?>
    <h2 class="title_login">Đăng Nhập</h2>
    <form action="index.php?act=sendLogin" method="POST">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="additional-options">
            <div class="register_css">Bạn chưa có tài khoản? <a href="index.php?act=signUp"><u style="color: red;">Đăng ký</u></a> ngay!</div>
            <a class="forget_css" href="index.php?act=quenmk" style="color:blue">Quên mật khẩu?</a>
        </div>
        <div class="form-group">
            <button type="submit" name="btnsubmit">Đăng Nhập</button>
        </div>
    </form>

</div>
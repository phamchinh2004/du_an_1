<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        /*LOGIN*/
        .title_login{
            margin-bottom: 10px;
        }
        .login-form {
            line-height: 30px;
            width: auto;
            height: auto;
            background-color: #FFF;
            padding-top: 140px;
            border-radius: 8px;
            text-align: center;
        }

        .login-form h2 {
            color: #FF6138;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            margin-bottom: 8px;
            color: #C3080A;
        }

        .form-group input {
            width: 20%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #C3080A;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #FF6138;
            color: #FFF;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #C3080A;
        }

        .additional-options {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .additional-options a {
            text-decoration: none;
            color: black;
        }
        .register_css,
        .forget_css{
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

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
                <a class="forget_css" href="#">Quên mật khẩu?</a>
            </div>
            <div class="form-group">
                <button type="submit" name="btnsubmit">Đăng Nhập</button>
            </div>
        </form>

    </div>
</body>

</html>
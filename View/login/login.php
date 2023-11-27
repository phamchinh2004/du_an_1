<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        .login-form {
            width: auto;
            height: auto;
            background-color: #FFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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

        .additional-options a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <h2>Đăng Nhập</h2>
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
                <div >Bạn chưa có tài khoản? <a href=""><u style="color: red;">Đăng ký</u></a> ngay!</div>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <div class="form-group">
                <button type="submit" name="btnsubmit">Đăng Nhập</button>
            </div>
        </form>

    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        /*LOGIN*/
        .title_login {
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

        /* .register_css,
        .forget_css {
            margin-bottom: 10px;
        } */
    </style>
</head>

<body>

    <div class="login-form">
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
        <h2 class="title_login">Đăng Nhập</h2>
        <form action="index.php?act=sendRegister" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên người dùng </label>
                <input type="text" name="name" value="" placeholder="Nhập vào tên">
            </div>
            <div class="form-group">
                <label>Email </label>
                <input type="email" name="email" value="" placeholder="Nhập vào email">
            </div>
            <div class="form-group">
                <label>Username </label>
                <input type="text" name="username" value="" placeholder="Nhập vào tên đăng nhập">
            </div>
            <div class="form-group">
                <label>Password </label>
                <input type="password" name="password" value="" placeholder="Nhập vào mật khẩu" onpaste="return false;">
            </div>
            <div class="form-group">
                <label>Repassword </label>
                <input type="password" name="repassword" value="" placeholder="Xác nhận mật khẩu" onpaste="return false;">
            </div>
            <div class="form-group">
                <label>Avatar</label>
                <input type="file" name="avatar">
            </div>
            <div class="form-group">
                <label>Số điện thoại </label>
                <input type="number" name="tel" value="" placeholder="Nhập vào số điện thoại">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" value="" placeholder="Nhập vào địa chỉ">
            </div><br>
            <div class="form-group">
                <button type="submit" name="btnsubmit">Đăng Ký</button>
            </div>
        </form>

    </div>
</body>

</html>
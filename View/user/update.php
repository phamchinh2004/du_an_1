<div class="user-form">
    <div class="status-nav mb">
        <div class="home">
            <a class="focus-home" href="index.php"><i class="fa-solid fa-house-chimney"></i>TRANG CHỦ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a class="focus-home" href="index.php?act=user">TÀI KHOẢN</a>
            <i class="fa-solid fa-angle-right"></i>
            <div class="focus-page">CẬP NHẬT THÔNG TIN</div>
        </div>
    </div>
    <h2 class="mb">CẬP NHẬT THÔNG TIN</h2>
    <div class="user-content">
        <div class="udt-box-right">
            <div class="udt-img-user">
                <img src="public/image/avt.jpg" alt="">
            </div>
        </div>
        <div class="udt-box-left">
        <form action="index.php?" method="post">
                <div class="form-udt">
                    <b>Tài khoản:</b><br>
                    <input type="text" name="user" placeholder="User" value="">
                </div>
                <div class="form-udt"> 
                    <b>Họ tên:</b><br>
                    <input type="text" name="name" placeholder="Họ và tên" value="">
                </div>
                <div class="form-udt">
                    <b>Số điện thoại:</b><br>
                    <input type="number" name="sdt" placeholder="Số điện thoại" value="">
                </div>
                <div class="form-udt">
                    <b>Email:</b><br>
                    <input type="email" name="email" placeholder="Email" value="">
                </div>
                <div class="form-udt">
                    <b>Địa chỉ:</b><br>
                    <input type="text" name="address" placeholder="Địa chỉ" value="">
                </div>
                <div class="form-udt">
                    <b>Hình:</b><br>
                    <input type="file" name="hinh" value="">
                </div>
                <input type="hidden" name="id" value="">
                <div class="form-udt">
                <button type="submit" name="btnsubmit">Cập nhật</button>
            </div>
            </form>
        </div>
    </div>
</div>
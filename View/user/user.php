<div class="user-form">
    <div class="status-nav mb">
        <div class="home">
            <a class="focus-home" href="index.php"><i class="fa-solid fa-house-chimney"></i>TRANG CHỦ</a>
            <i class="fa-solid fa-angle-right"></i>
            <div class="focus-page">TÀI KHOẢN</div>
        </div>
    </div>
    <h2 class="mb">THÔNG TIN TÀI KHOẢN</h2>
    <div class="user-content">

        <div class="box-right">
            <div class="box-right-item">
                <div class="box-right-cart mb">
                    <a class="focus-cart" href="index.php?act=myorder"><i class="fa-solid fa-cart-shopping"></i>Đơn hàng của tôi</a>
                
                </div>
                <div class="box-right-cart mb">
                    <a class="focus-cart" href="#"><i class="fa-solid fa-location-dot"></i>Địa chỉ nhận hàng</a>
                
                </div>
                <div class="box-right-cart">
                    <a class="focus-cart" href="index.php?act=dangxuat"><i class="fa-solid fa-right-from-bracket"></i></i>Đăng xuất</a>
                
                </div>
            </div>
        </div>
        <?php if(isset($inforUser) && $inforUser!="") {

            $hinhpath="public/image/".$inforUser['avatar'];
            $doimk="index.php?act=doimk&iduser=".$inforUser['id'];
            $updatetk="index.php?act=updatetk&iduser=".$inforUser['id'];
            if(is_file($hinhpath)){
                $hinhpath="<img src='".$hinhpath."'>";
            }else{
                $hinhpath="Chưa có hình ảnh";
            }
        echo '<div class="box-left">
                <div class="img-user">'.$hinhpath.'</div>
                <div class="thongtin-user">
                    <p>Họ tên: <b>'.$inforUser['name'].'</b></p>
                    <p>SĐT: <b>'.$inforUser['tel'].'</b></p>
                    <p>Email: <b>'.$inforUser['email'].'</b></p>
                    <p>Địa chỉ: <b>'.$inforUser['address'].'</b></p>
                    <div class="dmk mb"><a href="'.$doimk.'">Đổi mật khẩu</a></div>
                    <div class="udt-tk"> <a href="'.$updatetk.'">Cập nhật tài khoản</a></div>
                
                </div>
            </div>';
        } ?>
    </div>
</div>
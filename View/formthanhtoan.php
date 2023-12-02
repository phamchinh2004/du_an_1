<div class="page-order">
<div class="status-nav mb">
        <div class="home">
            <a class="focus-home" href="index.php"><i class="fa-solid fa-house-chimney"></i>TRANG CHỦ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a class="focus-home" href="index.php?act=cart">GIỎ HÀNG</a>
            <i class="fa-solid fa-angle-right"></i>
            <div class="focus-page">THANH TOÁN</div>
        </div>
    </div>
    <div class="cart-title">
    <img src="public/image/thanhtoan.png" alt="" width="60px">
    <h2 class="mb">Thanh toán</h2>
    </div>
    <div class="box-oder">
        <div class="form-order">
            <form action="" method="post" class="style-oder">
                <h2>Thông tin khách hàng</h2>
                <div><input type="text" name="txthoten" id="" placeholder="Họ và tên" required></div>
                <div><input type="tel" name="txttel" id="" placeholder="Số điện thoại" required></div>
                <div><input type="email" name="txtemail" id="" placeholder="Email" required></div>
                <div><input type="text" name="txtaddress" id="" placeholder="Địa chỉ" required></div>
                <div><input type="text" name="note" id="" placeholder="Ghi chú" ></div>
                <h3>Phương thức thanh toán</h3>
                <div class="pttt">
                    <p><input type="radio" name="pttt" id="" value="1" required> Thanh toán tiền mặt</p>
                    <p><input type="radio" name="pttt" id="" value="2" required> Thanh toán online</p>
                </div>
                
                <input type="submit" value="Xác nhận đặt hàng" name="order_confirm">
            </form>
        </div>
        <div class="sub-order">
            <h2>Đơn hàng</h2>
            <table >
                <tr>
                    <th>Sản phẩm</th>
                    <th>Thành tiền</th>
                </tr>
                <tr>
                    <td>
                        Iphone 14 pro max<br>
                        <small>SL: 1</small>
                    </td>
                    <td>15.000.000 ₫</td>
                </tr>
                <tr>
                    <td>
                        Iphone 14 pro max<br>
                        <small>SL: 1</small>
                    </td>
                    <td>15.000.000 ₫</td>   
                </tr>
                <tr>
                    <td><b>Tổng tiền:</b></td>
                    <td style="color:red;"><b>30.000.000 ₫</b></td>
                </tr>
            </table>
        </div>
    </div>
    
</div>

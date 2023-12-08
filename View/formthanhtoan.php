<div class="page-order">
    <?php if (isset($selectSp)){?>
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
            <form action="index.php?act=orderSpDone" method="post" class="style-oder">
                <div class="sub-order">
                    <h2>Đơn hàng</h2>
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th style="text-align: center;">Thành tiền</th>
                        </tr>
                        <?php if ($selectSp != "") {
                            $gia = 0;
                            $total = 0;
                            $totalAll = 0;
                            $dem=0;
                            // var_dump($selectSp);
                            foreach ($selectSp as $value) {
                            $dem++;
                            extract($value);
                            $gia = $giaban - ($giaban*($giamgia / 100));
                            if(isset($cart_soluong)){
                                $total = $gia * $cart_soluong;
                            }else{
                                $total = $gia;
                            } 
                            $totalAll += $total;
                        ?>
                            <tr>
                                <td>
                                    <input type="text" name="idsp" value="<?=$idsp?>" hidden>
                                    <input type="text" name="slSpCart" value="<?=isset($cart_soluong)? $cart_soluong : "1"?>" hidden>
                                    <input type="text" name="tongTienSp" value="<?=$total?>" hidden>
                                    <input type="text" name="tongSoSp" value="<?=$dem?>" hidden>
                                    <?= $name ?><br>
                                    <b><?= $soluong ?></b>
                                </td>
                                <td><input class="borderHidden" type="text" value="<?= number_format($total, 0, ",", ".") ?> đ"></td>
                            </tr>
                            
                        <?php }?>
                        <tr>
                                <td><b style="font-size:20px;">Tổng tiền:</b></td>
                                <td style="color:red;"><input class="borderHidden" style="font-size:18px;border:none;" type="text" name="tongtien" value="<?= number_format($totalAll, 0, ",", ".") ?> đ" readonly></td>
                            </tr>
                            <tr>
                                <td class="backCart" style="text-align:center;" colspan="2"><a style="text-decoration:none !important;color:#fff;" href="index.php?act=cart">Quay lại giỏ hàng</a></td>
                            </tr>
                        <?php } else { ?>
                            <b>Không có dữ liệu</b>
                        <?php } ?>
                    </table>
                </div>
                <div>
                    <h2>Thông tin đặt hàng</h2>
                    <?php if (!empty($selectInforUser)) {
                        extract($selectInforUser); ?>
                        <div>
                            <label for="">Nhập họ tên người nhận</label>
                            <input type="text" name="txthoten" id="" value="<?= $name ?>" placeholder="Họ và tên người nhận" required>
                        </div>
                        <div>
                            <label for="">Số điện thoại người nhận</label>
                            <input type="tel" name="txttel" id="" value="<?= $tel ?>" placeholder="Số điện thoại người nhận" required>
                        </div>
                        <div>
                            <label for="">Địa chỉ</label>
                            <input type="text" name="txtaddress" id="" value="<?= $address ?>" placeholder="Địa chỉ" required>
                        </div>
                        <div>
                            <label for="">Ghi chú</label>
                            <input type="text" name="note" id="" placeholder="Ghi chú">
                        </div>
                    <?php } ?>
                    <h3>Phương thức thanh toán</h3>
                    <div class="pttt">
                        <p><input type="radio" name="pttt" id="" value="1" required checked> Thanh toán tiền mặt</p>
                        <p><input type="radio" name="pttt" id="" value="2" required> Thanh toán online</p>
                    </div>
                    <input type="submit" value="Xác nhận đặt hàng" name="order_confirm">
                </div>
            </form>
        </div>

    </div>
    <?php } else if (isset($selectSpOne)){?>
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
            <form action="index.php?act=orderSpDone" method="post" class="style-oder">
                <div class="sub-order">
                    <h2>Đơn hàng</h2>
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th style="text-align: center;">Thành tiền</th>
                        </tr>
                        <?php if ($selectSpOne != "") {
                            $gia = 0;
                            $total = 0;
                            $totalAll = 0;
                            extract($selectSpOne);
                            $gia = $giaban - ($giaban*($giamgia / 100));
                            $total = $gia;
                            $totalAll = $total;
                        ?>
                            <tr>
                                <td>
                                    <input type="text" name="idsp" value="<?=$idsp?>" hidden>
                                    <input type="text" name="slSpCart" value="1" hidden>
                                    <input type="text" name="tongTienSp" value="<?=$total?>" hidden>
                                    <input type="text" name="tongSoSp" value="1" hidden>
                                    <?= $name ?><br>
                                    <b>1</b>
                                </td>
                                <td><input class="borderHidden" type="text" value="<?= number_format($total, 0, ",", ".") ?> đ"></td>
                            </tr>
                        <tr>
                                <td><b style="font-size:20px;">Tổng tiền:</b></td>
                                <td style="color:red;">
                                    <input class="borderHidden" style="font-size:18px;border:none;" type="text" name="tongtien" 
                                    value="<?=$totalAll ?> đ" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td class="backCart" style="text-align:center;" colspan="2">
                                    <a style="text-decoration:none !important;color:#fff;" href="index.php?act=cart">Quay lại giỏ hàng</a>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <b>Không có dữ liệu</b>
                        <?php } ?>
                    </table>
                </div>
                <div>
                    <h2>Thông tin đặt hàng</h2>
                    <?php if (!empty($selectInforUser)) {
                        extract($selectInforUser); ?>
                        <div>
                            <label for="">Nhập họ tên người nhận</label>
                            <input type="text" name="txthoten" id="" value="<?= $name ?>" placeholder="Họ và tên người nhận" required>
                        </div>
                        <div>
                            <label for="">Số điện thoại người nhận</label>
                            <input type="tel" name="txttel" id="" value="<?= $tel ?>" placeholder="Số điện thoại người nhận" required>
                        </div>
                        <div>
                            <label for="">Địa chỉ</label>
                            <input type="text" name="txtaddress" id="" value="<?= $address ?>" placeholder="Địa chỉ" required>
                        </div>
                        <div>
                            <label for="">Ghi chú</label>
                            <input type="text" name="note" id="" placeholder="Ghi chú">
                        </div>
                    <h3>Phương thức thanh toán</h3>
                    <div class="pttt">
                        <p><input type="radio" name="pttt" id="" value="1" required checked> Thanh toán tiền mặt</p>
                        <p><input type="radio" name="pttt" id="" value="2" required> Thanh toán online</p>
                    </div>
                    <input type="submit" value="Xác nhận đặt hàng" name="order_confirm">
                </div>
            </form>
        </div>

    </div>
    <?php }}?>    
</div>
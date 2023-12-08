<div class="box-myoder">
    <div class="content-myoder">
        <div class="header-myoder mb">
            <a href="index.php?act=myorder&trangthai=1">Chờ xác nhận</a>
            <a href="index.php?act=myorder&trangthai=2">Đang giao</a>
            <a href="index.php?act=myorder&trangthai=3">Đã giao</a>
            <a href="index.php?act=myorder&trangthai=4">Đã huỷ</a>
            <a href="index.php?act=myorder&trangthai=5">Trả hàng</a>
        </div>
        <!-- box - sản phẩm -->
        <div class="item-myoder mb">
            <?php if (isset($oderUser) && $oderUser != "") {
                foreach ($oderUser as $order) {
                    extract($order); ?>
                    <div class="item-myoder-top">
                        <div class="myoder-right">
                            <div class="myoder-text">
                                <h3>Tên người nhận: <?= $name_nguoi_nhan ?></h3>
                                <h3>Số điện thoại: <?= $sdt_nguoi_nhan ?></h3>
                                <h3>Địa chỉ nhận hàng: <?= $dia_chi_nhan_hang ?></h3>
                                <h3>Ghi chú: <?= $ghi_chu ?></h3>
                                <h3>Ngày đặt hàng: <?= $order_time ?></h3>
                            </div>
                        </div>
                        <div class="myoder-price">
                            <p class="mb5">Số sản phẩm: <?= $so_luong ?></p>
                            <div class="total-myoder-price">
                                <i class="fa-solid fa-cart-shopping"></i>
                                TỔNG TIỀN : <b><?=number_format( $tong_tien,0,",",".") ?>đ</b>
                            </div>
                        </div>
                    </div>
                    <div class="item-myoder-bottom">
                        <p>Vui lòng chỉ nhấn “ Hủy” nếu bạn có vấn đề về sản phẩm hoặc các vấn đề khác</p>
                        <a href="index.php?act=myOderDetail&iddh=<?=$id?>"><input type="button" value="XEM CHI TIẾT"></a>
                        <?php if ($id_trang_thai == 1) { ?>
                            <a href="index.php?act=cancleMyOder"><input type="button" value="HỦY"></a>
                        <?php } ?>
                    </div>
                <?php }
            } else { ?>
                <h2 style="text-align: center;">Chưa có đơn hàng nào</h2>
            <?php } ?>
        </div>
        <!-- endbox sản phẩm -->

    </div>
</div>
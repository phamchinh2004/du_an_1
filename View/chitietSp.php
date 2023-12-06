<div class="user-form">
    <div class="status-nav mb">
        <div class="home">
            <a class="focus-home" href="index.php"><i class="fa-solid fa-house-chimney"></i>TRANG CHỦ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a class="focus-home" href="index.php?act=sanpham">SẢN PHẨM</a>
            <i class="fa-solid fa-angle-right"></i>
            <div class="focus-page">CHI TIẾT SẢN PHẨM</div>
        </div>
    </div>
    <?php if (!empty($sanphamDetail)) {
        extract($sanphamDetail);
        $giaNew = $giaban - ($giaban * ($giamgia / 100));
        $hinhanhChinh = "public/image/" . $link;
        $hinhanhList = [];

        if (is_file($hinhanhChinh)) {
            $hinhanhList[] = $hinhanhChinh;
        }
    } ?>
    <div class="box-ctsp">
        <div class="ctsp-top mb">
            <div class="ctsp-title">
                <?= $name ?>
            </div>
            <div class="ctsp-title-rate">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <a href="#">273 ĐÁNH GIÁ</a>
            </div>
        </div>
        <div class="content-ctsp">
            <div class="ctsp-left">
                <div class="ctsp-img-top mb">
                    <img src="<?= $hinhanhChinh ?>" alt="" width="250px">
                </div>

                <div class="ctsp-slide-img mb">
                    <?php foreach ($hinhanhList as $value) { ?>
                        <img src="<?= $value ?>" alt="" width="50px">
                    <?php } ?>
                </div>
                <div class="ctsp-ttsale mb">
                    <div class="ttsale1 mb"><i class="fa-solid fa-medal"></i> Hàng chính hãng - Bảo hành 12 tháng</div>
                    <div class="ttsale2"><i class="fa-solid fa-truck-fast"></i>Giao hàng toàn quốc</div>
                </div>
            </div>
            <div class="ctsp-right">
                <div class="ctsp-right-price mb">
                    <p class="price-new"><?= number_format($giaNew, 0, ",", ".") ?> VNĐ</p>
                    <p class="price-old"><del><?= number_format($giaban, 0, ",", ".") ?> VNĐ</del></p>
                </div>
                <div class="ctsp-kythuat mb">
                    <h3>Thông số kỹ thuật</h3>
                    <table>
                        <tr>
                            <th>Hãng:</th>
                            <td>Apple</td>
                        </tr>
                        <tr>
                            <th>Hệ điều hành:</th>
                            <td>IOS</td>
                        </tr>
                        <tr>
                            <th>Độ phân giải:</th>
                            <td>FULL HD</td>
                        </tr>
                        <tr>
                            <th>Kích thước màn hình:</th>
                            <td>14 INCH</td>
                        </tr>
                    </table>
                </div>
                <div class="ctsp-khuyenmai mb">
                    <h3>Khuyến mãi</h3>
                    <h5>Giá và khuyến mãi có thể kết thúc sớm hơn dự kiến</h5>
                    <div class="ctsp-box-khuyenmai">
                        <div class="ctsp-ttkm">
                            <div class="ctsp-sttkm">1</div>Nhập mã MMSALE100 giảm ngay 1% tối đa 100.000đ khi thanh toán qua MOMO
                        </div>
                        <div class="ctsp-ttkm">
                            <div class="ctsp-sttkm">2</div>Hoàn 200,000đ cho chủ thẻ tín dụng HOME CREDIT khi thanh toán đơn hàng từ 5,000,000đ
                        </div>
                        <div class="ctsp-ttkm">
                            <div class="ctsp-sttkm">3</div>Nhập mã VNPAYTAO giảm ngay 200K cho đơn hàng từ 15 Triệu, chỉ áp dụng thanh toán VNPAY-QR tại cửa hàng
                        </div>
                        <div class="ctsp-ttkm">
                            <div class="ctsp-sttkm">4</div>Nhập mã ZLPIP15 giảm ngay 300K cho đơn hàng từ 20 Triệu, chỉ áp dụng thanh toán qua Ví ZALOPAY tại cửa hàng
                        </div>
                    </div>
                </div>
                <div class="ctsp-box-button">
                    <a href="index.php?act=formthanhtoan&idsp=<?= isset($id) ? $id : ""; ?>" class="ctsp-button-left">
                        <h3>MUA NGAY</h3>
                        <p>Giao hàng miễn phí cho lần đầu</p>
                    </a>
                    <a href="index.php?act=addtocart&idsp=<?= isset($id) ? $id : ""; ?>" class="ctsp-button-right">
                        <h4>Thêm giỏ hàng</h4>
                        <i class="fa-solid fa-cart-plus"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
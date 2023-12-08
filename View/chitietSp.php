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
    <div class="box-ctsp mb">
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
                <a><?php foreach ($loadAllVote as $value) {
                        extract($value);
                        echo $luotVote;
                    } ?> ĐÁNH GIÁ</a>
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
                    <a href="index.php?act=formthanhtoanOne&idsp=<?= $sanphamDetail['id'] ?>" class="ctsp-button-left">
                        <h3>MUA NGAY</h3>
                        <p>Giao hàng miễn phí cho lần đầu</p>
                    </a>
                    <a href="index.php?act=addtocart&idsp=<?= $sanphamDetail['id'] ?>" class="ctsp-button-right">
                        <h4>Thêm giỏ hàng</h4>
                        <i class="fa-solid fa-cart-plus"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <hr style="border:3px solid #f1f1f1" class="mb">
    <div class="box-rate mb">
        <h2>Đánh giá sản phẩm</h2>
        <div class="box-ratetb ">
            <div class="ratetb1">
                <p class="bt5">Đánh giá trung bình</p>
                <h1 class="bt5" style="color:red">5/5</h1>
                <div class="star-ratetb1 bt5">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p style="color:rgb(207, 204, 204)"><?php foreach ($loadAllVote as $value) {
                                                        extract($value);
                                                        echo $luotVote;
                                                    } ?></p>
            </div>
            <div class="ratetb2">
                <div class="ratetb2-box">
                    <div class="sl-rate">
                        <p class="ml">5</p>
                        <i class="fa-solid fa-star ml"></i>
                        <div class="bar-container ml">
                            <div class="bar-5"></div>
                        </div>
                        <p style="color:rgb(207, 204, 204)">8</p>
                    </div>
                    <div class="sl-rate">
                        <p class="ml">4</p>
                        <i class="fa-solid fa-star ml"></i>
                        <div class="bar-container ml">
                            <div class="bar-4"></div>
                        </div>
                        <p style="color:rgb(207, 204, 204)">2</p>
                    </div>
                    <div class="sl-rate">
                        <p class="ml">3</p>
                        <i class="fa-solid fa-star ml"></i>
                        <div class="bar-container ml">
                            <div class="bar-3"></div>
                        </div>
                        <p style="color:rgb(207, 204, 204)">0</p>
                    </div>
                    <div class="sl-rate">
                        <p class="ml">2</p>
                        <i class="fa-solid fa-star ml"></i>
                        <div class="bar-container ml">
                            <div class="bar-2"></div>
                        </div>
                        <p style="color:rgb(207, 204, 204)">0</p>
                    </div>
                    <div class="sl-rate">
                        <p class="ml">1</p>
                        <i class="fa-solid fa-star ml"></i>
                        <div class="bar-container ml">
                            <div class="bar-1"></div>
                        </div>
                        <p style="color:rgb(207, 204, 204)">0</p>
                    </div>
                </div>
            </div>
            <div class="ratetb3">
                <div class="ratetb3-box">
                    <span>BẠN ĐÃ DÙNG SẢN PHẨM NÀY?</span>
                    <a href="index.php?act=formrate"><input type="button" value="GỬI ĐÁNH GIÁ"></a>
                </div>
            </div>
        </div>
        <div class="user-rate">
            <!-- 1box user -->
            <?php if (isset($loadAllVote) && $loadAllVote != "") {
                foreach ($loadAllVote as $value) {
                    extract($value); ?>
                    <div class="box-content-user-rate">
                        <div class="content-user-rate">
                            <div class="avt-user-rate ml"><?= $chu_cai_dau ?></div>
                            <div class="name-user-rate ml"><?= $nameUser ?></div>
                            <div class="ml" style="color:#ff6138;padding-top: 3px;"><i class="fa-solid fa-circle-check ml" style="color:#ff6138"></i>Đã mua tại San's Mobile</div>
                        </div>
                        <div class="user-comment bt5 ml30">
                            SỐ SAO : <?= $soSao ?>
                        </div>
                        <div class="star-user-rate bt5 ml30">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="user-comment bt5 ml30">
                            <?= $content ?>
                        </div>
                        <div class="time-rate ml30">
                            <?= $timeVote ?> | <a href="#">Thích</a> | <a href="#">Trả lời</a>
                        </div>
                    </div>
                <?php } ?><div class="end-page-rate mb">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a class="active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div><?php } else { ?>
                <span>Chưa có đánh giá nào!</span>
            <?php } ?>
            <!-- 1box user -->

        </div>
    </div>
    <h2 class="mb">SẢN PHẨM CÙNG LOẠI</h2>
    <div class="items">
        <div class="box_items">
            <div class="box_items_bg">
                <div class="box_items_img">
                    <img src="public/image/dienthoai.jpg" alt="">
                </div>
                <div class="tg" href="">Trả góp 0%/0đ</div>
                <div class="sale" href="">Giảm 1.999.999đ</div>
            </div>

            <div class="items_text">
                <a class="item_name" href="">Iphone 14 Pro Max</a>
                <div class="price">
                    <p class="price-new">15.999.000đ</p>
                    <p class="price-old"><del>17.998.999đ</del></p>
                </div>
            </div>
            <div class="add"><a href="#">Mua ngay</a></div>
            <div class="ctsp"> <a href="#">Chi tiết</a></div>
        </div>
        <div class="box_items">
            <div class="box_items_bg">
                <div class="box_items_img">
                    <img src="public/image/dienthoai.jpg" alt="">
                </div>
                <div class="tg" href="">Trả góp 0%/0đ</div>
                <div class="sale" href="">Giảm 1.999.999đ</div>
            </div>

            <div class="items_text">
                <a class="item_name" href="">Iphone 14 Pro Max</a>
                <div class="price">
                    <p class="price-new">15.999.000đ</p>
                    <p class="price-old"><del>17.998.999đ</del></p>
                </div>
            </div>
            <div class="add"><a href="#">Mua ngay</a></div>
            <div class="ctsp"> <a href="#">Chi tiết</a></div>
        </div>
        <div class="box_items">
            <div class="box_items_bg">
                <div class="box_items_img">
                    <img src="public/image/dienthoai.jpg" alt="">
                </div>
                <div class="tg" href="">Trả góp 0%/0đ</div>
                <div class="sale" href="">Giảm 1.999.999đ</div>
            </div>

            <div class="items_text">
                <a class="item_name" href="">Iphone 14 Pro Max</a>
                <div class="price">
                    <p class="price-new">15.999.000đ</p>
                    <p class="price-old"><del>17.998.999đ</del></p>
                </div>
            </div>
            <div class="add"><a href="#">Mua ngay</a></div>
            <div class="ctsp"> <a href="#">Chi tiết</a></div>
        </div>
        <div class="box_items">
            <div class="box_items_bg">
                <div class="box_items_img">
                    <img src="public/image/dienthoai.jpg" alt="">
                </div>
                <div class="tg" href="">Trả góp 0%/0đ</div>
                <div class="sale" href="">Giảm 1.999.999đ</div>
            </div>

            <div class="items_text">
                <a class="item_name" href="">Iphone 14 Pro Max</a>
                <div class="price">
                    <p class="price-new">15.999.000đ</p>
                    <p class="price-old"><del>17.998.999đ</del></p>
                </div>
            </div>
            <div class="add"><a href="#">Mua ngay</a></div>
            <div class="ctsp"> <a href="#">Chi tiết</a></div>
        </div>
    </div>
</div>
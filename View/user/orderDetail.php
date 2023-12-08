<div class="box-myoder">
    <div class="content-myoder">
        <!-- box - sản phẩm -->
        <a class="backMyorder" href="index.php?act=myorder">Quay lại</a>
        <div class="item-myoder mb">
            <?php if (isset($listOrderDetail) && $listOrderDetail != "") {
                foreach ($listOrderDetail as $value) {
                    extract($value); ?>
                    <div class="item-myoder-top">
                        <div class="myoder-right">
                            <div class="myoder-text">
                                <h3><?= $name ?></h3>
                                <p>Số lượng: <b><?= $slct ?></b></p>
                            </div>
                        </div>
                        <div class="myoder-price">
                            <div class="total-myoder-price">
                                <i class="fa-solid fa-cart-shopping"></i>
                                THÀNH TIỀN : <b><?= $tongtien ?> đ</b>
                            </div>
                        </div>
                        <?php if ($trangThaiVote == 1) { ?>
                            <a href="index.php?act=danhGia&iddhct=<?= $iddhct ?>">Đánh giá</a>
                        <?php } else { ?>
                            <span>Đã đánh giá</span>
                        <?php } ?>
                    </div>
            <?php }
            } ?>
        </div>
        <!-- endbox sản phẩm -->
    </div>
</div>
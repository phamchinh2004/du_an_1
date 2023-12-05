<!-- Content -->
<!-- banner -->
<?php if(isset($needLogin)&& $needLogin!=""){
    echo "".$needLogin."";
}?>
<main class="box_content">
    <div class="catalog mb">
        <div class="content">
            <div class="box_banner">
                <div class="banner">
                    <img id="banner" src="public/image/banner0.jpg" alt="">
                    <button class="pre" onclick="pre()">&#10094;</button>
                    <button class="next" onclick="next()">&#10095;</button>
                </div>
                <div class="banner2 ">
                    <img id="banner1" src="public/image/anh1.jpg" alt="">
                    <img id="banner2" src="public/image/anh2.jpg" alt="">
                </div>
            </div>
            <!-- end banner -->

            <!-- danh muc -->
            <div class="danhmuc_title">
                <h3>DANH MỤC</h3>
            </div>
            <div class="danhmuc">
                <?php if (isset($listdm) && $listdm != "") {
                    foreach ($listdm as $value) {
                        extract($value);
                        $hinhanh = "public/image/" . $img;
                        if (!is_file($hinhanh)) {
                            $hinhanh = "";
                        }
                ?>
                        <div class="box_danhmuc">
                            <div class="danhmuc_item">
                                <?php if ($hinhanh != "") { ?>
                                    <img src="<?= $hinhanh ?>" alt="">
                                <?php } else { ?>
                                    <span>Chưa có hình ảnh</span>
                                <?php } ?>
                            </div>
                            <a href="index.php?act=listsptrangchu&iddm=<?=$id?>"> <input class="danhmuc_name" type="button" value="<?= $name ?>"></a>
                        </div>
                    <?php }
                } else { ?>
                    <h3>Chưa có danh mục nào</h3>
                <?php } ?>
            </div>
            <!-- end danhmuc -->
            <div class="anhtc">
                <img src="public/image/anhtc.png" alt="">
            </div>
            <!-- Sp khuyen mai-->
            <div class="sale_title">
                <i class="fa-solid fa-fire-flame-curved"></i>
                <h3>KHUYẾN MÃI HOT</h3>
            </div>
            <div class="items">
                <?php if (!empty($listSpgg)) {
                    foreach ($listSpgg as $value) {
                        extract($value);
                        $hinhanh = "public/image/" . $hinhanh;
                        if (!is_file($hinhanh)) {
                            $hinhanh = "";
                        }
                        $giaNew = $giaban - ($giaban * ($giamgia / 100));
                        $giaGiam = $giaban - $giaNew;
                ?>
                        <div class="box_items">
                            <div class="box_items_bg">
                                <div class="box_items_img">
                                    <?php if ($hinhanh != "") { ?>
                                        <img src="<?= $hinhanh ?>" alt="">
                                    <?php } else { ?>
                                        <span>Chưa có hình ảnh</span>
                                    <?php } ?>
                                </div>
                                <div class="tg" href="">Trả góp 0%/0<u>đ</u></div>
                                <div class="sale" href="">Giảm <?= number_format($giaGiam,0,",",".") ?><u>đ</u></div>
                            </div>

                            <div class="items_text">
                                <a class="item_name" href="index.php?act=chitietsp&idsp=<?=$id?>"><?= $name ?></a>
                                <div class="price">
                                    <p class="price-new"><?= number_format($giaNew,0,",",".") ?><u>đ</u></p>
                                    <p class="price-old"><del><?= number_format($giaban,0,",",".") ?><u>đ</u></del></p>
                                </div>
                            </div>
                            <div class="add"><a href="index.php?act=formthanhtoan&idsp=<?=$id?>">Mua ngay</a></div>
                            <div class="ctsp"> <a href="index.php?act=addtocart&idsp=<?=$id?>">Add cart</a></div>
                        </div>
                    <?php }
                } else { ?>
                    <h3>Chưa có sản phẩm khuyến mãi nào</h3>
                <?php } ?>
            </div>
            <!-- done sp khuyến mãi -->
            <div class="anhtc2">
                <img src="public/image/anhtc2.png" alt="">
            </div>
            <!-- san pham noi bat -->
            <div class="sptop_title mb">
                <h3>SẢN PHẨM BÁN CHẠY</h3>
            </div>
            <div class="items">
                <?php if (!empty($listSp)) {
                    foreach ($listSp as $value) {
                        extract($value);
                        $hinhanh = "public/image/" . $hinhanh;
                        if (!is_file($hinhanh)) {
                            $hinhanh = "";
                        }
                        $giaNew = $giaban - ($giaban * ($giamgia / 100));
                        $giaGiam = $giaban - $giaNew; ?>
                        <div class="box_items">
                            <div class="box_items_bg">
                                <div class="box_items_img">
                                    <?php if ($hinhanh != "") { ?>
                                        <img src="<?= $hinhanh ?>" alt="">
                                    <?php } else { ?>
                                        <span>Chưa có hình ảnh</span>
                                    <?php } ?>
                                </div>
                                <div class="tg" href="">Trả góp 0%/0<u>đ</u></div>
                                <div class="sale" href="">Giảm <?= number_format($giaGiam,0,",",".") ?><u> đ</u></div>
                            </div>

                            <div class="items_text">
                                <a class="item_name" href="index.php?act=chitietsp"><?=$name?></a>
                                <div class="price">
                                    <p class="price-new"><?=number_format($giaNew,0,",",".")?><u>đ</u></p>
                                    <p class="price-old"><del><?=number_format($giaban,0,",",".")?><u>đ</u></del></p>
                                </div>
                            </div>
                            <div class="add"><a href="#">Mua ngay</a></div>
                            <div class="ctsp"> <a href="index.php?act=cart&idsp=<?=$id?>">Add cart</a></div>
                        </div>
                    <?php }
                } else { ?>
                    <h3>Chưa có sản phẩm bán chạy nào</h3>
                <?php } ?>
            </div>
            <!-- done sp noi bat -->
            <!-- done sp noi bat -->
        </div>
    </div>
</main>
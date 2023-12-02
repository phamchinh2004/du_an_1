<main class="box_content">
    <div class="catalog mb">
        <div class="content">
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
                        <a href="index.php?act=listsptrangchu&iddm=<?= $id ?>"> <input class="danhmuc_name" type="button" value="<?= $name ?>"></a>
                    </div>
                    <?php }
                } else { ?>
                    <h3>Chưa có danh mục nào</h3>
                <?php } ?>
            </div>
            <div class="items">
                <?php if (!empty($listsp)) {
                    foreach ($listsp as $value) {
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
                                        <img src="" alt="<?= $hinhanh ?>">
                                    <?php } ?>
                                </div>
                                <div class="tg" href="">Trả góp 0%/0<u>đ</u></div>
                                <div class="sale" href="">Giảm <?= number_format($giaGiam, 0, ",", ".") ?><u>đ</u></div>
                            </div>

                            <div class="items_text">
                                <a class="item_name" href=""><?= $name ?></a>
                                <div class="price">
                                    <p class="price-new"><?= number_format($giaNew, 0, ",", ".") ?><u>đ</u></p>
                                    <p class="price-old"><del><?= number_format($giaban, 0, ",", ".") ?><u>đ</u></del></p>
                                </div>
                            </div>
                            <div class="add"><a href="#">Mua ngay</a></div>
                            <div class="ctsp"> <a href="#">Chi tiết</a></div>
                        </div>
                    <?php }
                } else { ?>
                    <h3>Không tìm thấy sản phẩm nào</h3>
                <?php } ?>
            </div>
            <!-- done sp khuyến mãi -->

            <!-- done sp noi bat -->
        </div>
    </div>
</main>
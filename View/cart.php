<div class="user-form">
    <div class="status-nav mb">
        <div class="home">
            <a class="focus-home" href="index.php"><i class="fa-solid fa-house-chimney"></i>TRANG CHỦ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a class="focus-home" href="index.php?act=sanpham">SẢN PHẨM</a>
            <i class="fa-solid fa-angle-right"></i>
            <div class="focus-page">GIỎ HÀNG</div>
        </div>
    </div>
    <div class="cart-title">
        <i class="fa-solid fa-cart-arrow-down"></i>
        <h3 class="mb">Giỏ hàng</h3>
    </div>
    <?php 
        if (isset($_GET['mess']) && $_GET['mess'] != "") {
            echo "<script>
                function mess(id){
                    alert(id);
                }      
                </script>";
            echo "<script>mess(" . json_encode($_GET['mess']) . ");</script>";
        }
        
    ?>
    <div class="user-content formds_loai form_content">
        <div>
            <table class="mb box-cart">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?php if (!empty($listSpCart)) {
                    $totalAll=0;
                    foreach ($listSpCart as $key => $value) {
                        extract($value);
                        $gia = $giaban - ($giaban *($giamgia / 100));
                        $total = $gia * $cart_soluong;
                        $totalAll+= $total;
                        $hinhanh = "public/image/" . $hinhanh;
                        if (!is_file($hinhanh)) {
                            $hinhanh = "";
                        } ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?= $name ?></td>
                            <td><?php if ($hinhanh != "") { ?>
                                    <img src="<?= $hinhanh ?>" alt="">
                                <?php } else { ?>
                                    <img src="" alt="<?= $hinhanh ?>">
                                <?php } ?>
                            </td>
                            <td><input class="total_tien" type="text" id="price1" name="price1" value="<?= number_format($gia,0,",",".") ?> đ" readonly></td>
                            <td>
                                <form action="index.php?act=updateQuantity" method="POST">
                                    <input type="text" hidden name="idsp" value="<?= $id ?>">
                                    <input type="number" id="quantity1" name="soluong" value="<?= $cart_soluong ?>" min="1">
                                    <input type="submit" style="margin-left: 10px;" name="btnSoluong" value="Cập nhật">
                                </form>
                            </td>
                            <td><input class="total_tien" type="text"  style="z-index: 100;" name="total1" value="<?= number_format($total,0,",",".") ?> đ" readonly></td>
                            <td>
                                <a href="index.php?act=formthanhtoan&idsp=<?=$id?>"><input style="margin-bottom:10px; background-color:;" type="button" value="Đặt hàng"> </a>
                                <a href=""> <input type="button" value="Xoá"> </a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        
                        <td colspan="7" style="text-align:center;">Bạn chưa thêm sản phẩm nào!</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="addCart" style="text-align:center;"><a href="index.php?act=trangchu">Thêm ngay?!</a></td>
                    </tr>
                <?php } ?>
                <tr><td>&nbsp;</td>
                    <td colspan="4" class="tongTienText">Tổng tiền:</td>
                    <td colspan="1"><input class="total_tien indam_total" type="text" id="grandTotal" name="grandTotal" value="<?php echo isset($totalAll) ? number_format($totalAll,0,",",".") : "0" ?> đ" readonly></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <div class="row mb10 ">
                <input class="mr10" type="button" value="CHỌN TẤT CẢ">
                <input class="mr10" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=formthanhtoan"> <input class="mr10" type="button" value="MUA TẤT CẢ"></a>
            </div>
        </div>
    </div>
</div>
<div class="page-buysuccess">
    <div class="buysuccess-title mb">
        <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
        <i class="fa-solid fa-circle-check"></i>
        <p>Cảm ơn quý khách đã tin tưởng mua hàng tại SAN'S MOBILE</p>
    </div>
    <div class="box-thongtinkh">
        <div class="content-thongtinkh mb">
            <h3>Thông tin đặt hàng</h3>
            <?php if (isset($echoOrderDone) && $echoOrderDone != "") {
                 foreach ($echoOrderDone as $value) {extract($value); ?>
                <table>
                    <tr>
                        <th>Họ tên khách hàng:</th>
                        <td><?= $name_nguoi_nhan?></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><?= $sdt_nguoi_nhan ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ:</th>
                        <td><?= $dia_chi_nhan_hang ?></td>
                    </tr>
                    <tr>
                        <th>Hình thức thanh toán:</th>
                        <td>Thanh toán sau khi nhận hàng</td>
                    </tr>
                    <?php break; }?>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?php 
                    foreach ($echoOrderDone as $value) {extract($value); ?>
                        <tr>
                            <td><?= $spname ?></td>
                            <td><?= $soluongct ?></td>
                            <td><?= $tongtien ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th style="font-size: 25px;padding-left:100px;">Tổng tiền :</th>
                        <th style="font-size: 25px;padding-left:100px;"><?= $tong_tien ?></th>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>Không có thông tin về đơn hàng nào!</td>
                    </tr>
                <?php } ?>
                </table>
        </div>
        <a href="index.php?act=myorder"><input class="" type="button" value="XEM TRẠNG THÁI ĐƠN HÀNG"></a>
    </div>
</div>
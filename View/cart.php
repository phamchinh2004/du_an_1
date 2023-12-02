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
    
    <div class="user-content formds_loai form_content">
        <form>
            <table class="mb box-cart">
                <tr>
                    <th></th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>Iphone 14 Pro Max</td>
                    <td><img src="public/image/dienthoai.jpg" alt=""></td>
                    <td><input type="number" id="price1" name="price1" value="6000" onchange="calculateTotal()"></td>
                    <td><input type="number" id="quantity1" name="quantity1" value="1" onchange="calculateTotal()"></td>
                    <td><input type="number" id="total1" name="total1" value="6000" readonly></td>
                    <td>
                        <a href=""> <input type="button" value="Xoá"> </a> 
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>Iphone 14 Pro Max</td>
                    <td><img src="public/image/dienthoai.jpg" alt=""></td>
                    <td><input type="number" id="price2" name="price2" value="6000" onchange="calculateTotal()"></td>
                    <td><input type="number" id="quantity2" name="quantity2" value="1" onchange="calculateTotal()"></td>
                    <td><input type="number" id="total2" name="total2" value="6000" readonly></td>
                    <td>
                        <a href=""> <input type="button" value="Xoá"> </a> 
                    </td>
                </tr>
                <tr>
                    <td colspan="5">Tổng tiền:</td>
                    <td colspan="2"><input type="number" id="grandTotal" name="grandTotal" value="12000" readonly></td>
                </tr>
            </table>
            <div class="row mb10 ">
                <input class="mr10" type="button" value="CHỌN TẤT CẢ">
                <input class="mr10" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=dathang"> <input class="mr10" type="button" value="ĐẶT HÀNG"></a>
            </div>
        </form>
    </div>
</div>
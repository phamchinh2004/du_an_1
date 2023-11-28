<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>THÊM MỚI SẢN PHẨM</h1>
        </div>
        <div class="box_content form_content">
            <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
                <div class="row mb10 box_content">
                    <div class="mr20">
                        <label> Danh mục </label> <br>
                        <select name="iddm" id="">
                            <option value="0">Apple</option>
                        </select>
                    </div>
                    <div class="mr20">
                        <label> Tính năng </label> <br>
                        <select name="iddm" id="">
                            <option value="0">Pin</option>
                        </select>
                    </div>
                </div>
                <div class="box_content mb10">
                    <label>Tên sản phẩm </label> <br>
                    <input type="text" name="tensp" placeholder="nhập vào tên">
                </div>
                <div class="box_content mb10">
                    <label>Giá sản phẩm </label> <br>
                    <input type="text" name="giasp" placeholder="nhập vào giá">
                </div>
                <div class="box_content mb10">
                    <label>Hình sản phẩm </label> <br>
                    <input type="file" name="hinh">
                </div>
                <div class="box_content mb10">
                    <label>Mô tả sản phẩm </label> <br>
                    <textarea name="mota" cols="30" rows="10"></textarea>
                </div>
                <div class="row">
                    <input class="mr20" type="submit" value="THÊM MỚI" name="themmoi">
                    <input class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
            </form>
        </div>
    </div>
  
</div>
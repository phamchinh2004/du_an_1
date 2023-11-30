<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Quản lý tài khoản</h1>
        </div>
        <a href="index.php?act=addsp"> <input class="spadm" type="button" value="Thêm tài khoản"></a>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <form action="index.php?act=listtk" method="POST">
                    <div class="listok">
                        <input type="text" placeholder="Tìm kiếm theo username tài khoản" name="keyw">
                        <input type="submit" value="Tìm kiếm" name="listok">
                    </div>
                </form>
                <div class="arrange_loctk_forms">
                <form action="index.php?act=listtk" method="POST">
                    <div class="listok">
                        <input type="submit" value="Tất cả" name="listok"><!--Nếu click vào nút này sẽ hiển thị danh sách tất cả các tài khoản-->
                    </div>
                </form>
                <form action="index.php?act=listtk&trangthai=1" method="POST">
                    <div class="listok">
                        <input type="submit" value="Đang hoạt động" name="listok"><!--Nếu click vào nút này sẽ hiển thị danh sách các tài khoản có trangthai=1-->
                    </div>
                </form>
                <form action="index.php?act=listtk&trangthai=2" method="POST">
                    <div class="listok">
                        <input type="submit" value="Bị hạn chế" name="listok"><!--Nếu click vào nút này sẽ hiển thị danh sách các tài khoản có trangthai=0-->
                    </div>
                </form>
                </div>
                <?php
                if (isset($thanhcong)) {
                    echo "<span style='color:green;'>$thanhcong</span>";
                }else if (isset($deleteSoft)) {
                    echo "<span style='color:green;'>$deleteSoft</span>";
                }else if (isset($deleteHard)) {
                    echo "<span style='color:green;'>$deleteHard</span>";
                }else if (isset($_SESSION['update_success'])) {
                    echo '<div style="color: green;">' . $_SESSION['update_success'] . '</div>';
                    unset($_SESSION['update_success']); // Xóa thông báo sau khi hiển thị
                }
                ?>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th hidden>ID</th>
                            <th>Tên người dùng</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($listtk)) {
                            foreach ($listtk as $value) {
                                extract($value);
                                $hinhpath = "../../public/image/" . $avatar;
                                if (is_file($hinhpath)) {
                                    $hinhpath = "<img src='" . $hinhpath . "' width='60px' height='80px'>";
                                } else {
                                    $hinhpath = "Chưa có avatar";
                                }
                                if($updateAt==""){
                                    $updateAt="Chưa có cập nhật mới nào!";
                                }
                                $suaTk = "index.php?act=suaTk&idtk=" . $id;
                                $Ban="index.php?act=banTk&idtk=" . $id;
                                $hardDeleteTk="index.php?act=hardDeleteTk&idtk=" . $id;
                                echo    '<tr>
                                            <td hidden>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $username . '</td>
                                            <td>' . $password . '</td>
                                            <td>' . $hinhpath. '</td>
                                            <td>' . $email . '</td>
                                            <td>' . $tel . '</td>
                                            <td>' . $address . '</td>
                                            <td>' . $role . '</td>
                                            <td>' . $createAt . '</td>
                                            <td>' . $updateAt . '</td>
                                            <td>
                                                <a href="' . $suaTk . '"> <input type="button" value="Sửa"> </a> 
                                                <a href="'.$Ban.'"> <input type="button" value="Ban" onclick="return confirm(\'Bạn có chắc chắn muốn xóa mềm? Điều này sẽ đặt trạng thái của sản phẩm thành 0 và ở những trang hiển thị sản phẩm chỉ xem được những sản phẩm có trạng thái là 1!\')"> </a>
                                                <a href="'.$hardDeleteTk.'"> <input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa cứng? Điều này sẽ xóa vĩnh viễn sản phẩm!\')"> </a>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='11'>Không tìm thấy tài khoản nào</td>
                                </tr>";
                        } ?>
                    </table>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
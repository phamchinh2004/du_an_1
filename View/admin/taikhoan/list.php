<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Quản lý tài khoản</h1>
        </div>
        <a href="index.php?act=addTk"> <input class="spadm" type="button" value="Thêm tài khoản"></a>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <form action="index.php?act=listtk" method="POST">
                    <div class="listok">
                        <input type="text" placeholder="Tìm kiếm theo username tài khoản" name="keyw" value="<?php echo htmlspecialchars($keyw); ?>">
                        <input type="submit" value="Tìm kiếm" name="listok">
                    </div>
                </form>
                <div class="arrange_loctk_forms">
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk">Tất cả</a>
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk&trangthai=1">Đang hoạt động</a>
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk&trangthai=2">Bị hạn chế</a>
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk&role=1">Người dùng</a>
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk&role=2">Shiper</a>
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk&role=3">Kho</a>
                <a class="listok arrange_loctk_forms_link" href="index.php?act=listtk&role=4">Admin</a>
                <!-- <form action="index.php?act=listtk" method="POST">
                    <div class="listok">
                        <input type="submit" value="Tất cả" name="listok">Nếu click vào nút này sẽ hiển thị danh sách tất cả các tài khoản
                    </div>
                </form>
                <form action="index.php?act=listtk&trangthai=1" method="POST">
                    <div class="listok">
                        <input type="submit" value="Đang hoạt động" name="listok">Nếu click vào nút này sẽ hiển thị danh sách các tài khoản có trangthai=1
                    </div>
                </form>
                <form action="index.php?act=listtk&trangthai=2" method="POST">
                    <div class="listok">
                        <input type="submit" value="Bị hạn chế" name="listok">Nếu click vào nút này sẽ hiển thị danh sách các tài khoản có trangthai=0
                    </div>
                </form> -->
                </div>
                <?php
                if (isset($_SESSION['addTkDone'])) {//Hiển thị thông báo thêm tài khoản thành công
                    echo '<div style="color: green;">' . $_SESSION['addTkDone'] . '</div>';
                    unset($_SESSION['addTkDone']); // Xóa thông báo sau khi hiển thị
                }else if (isset($_SESSION['update_success'])) {//Hiển thị thông báo cập nhật tài khoản thành công
                    echo '<div style="color: green;">' . $_SESSION['update_success'] . '</div>';
                    unset($_SESSION['update_success']); // Xóa thông báo sau khi hiển thị
                }else if (isset($_SESSION['banSucc'])) {//Hiển thị thông báo hạn chế tài khoản thành công
                    echo '<div style="color: green;">' . $_SESSION['banSucc'] . '</div>';
                    unset($_SESSION['banSucc']); // Xóa thông báo sau khi hiển thị
                }else if (isset($_SESSION['xoaSucc'])) { //Hiển thị thông báo xóa tk thành công
                    echo '<div style="color: green;">' . $_SESSION['xoaSucc'] . '</div>';
                    unset($_SESSION['xoaSucc']); // Xóa thông báo sau khi hiển thị
                }
                ?>
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th hidden>ID</th>
                            <th>Tên người dùng</th>
                            <th>Username</th>
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
                                $hardDeleteTk="index.php?act=xoaTk&idtk=" . $id;
                                $confirmBan="Bạn có chắc chắn muốn hạn chế tài khoản này? Điều này 
                                sẽ đặt trạng thái của trạng thái của tài khoản thành 2 và ở những 
                                tài khoản có trạng thái bằng 2 thì sẽ không thể đăng nhập được!";
                                $confirmUnBan="Bạn có chắc chắn muốn unban tài khoản này không?";
                                echo    '<tr>
                                            <td hidden>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $username . '</td>
                                            <td>' . $hinhpath. '</td>
                                            <td>' . $email . '</td>
                                            <td>' . $tel . '</td>
                                            <td>' . $address . '</td>
                                            <td>' . $role . '</td>
                                            <td>' . $createAt . '</td>
                                            <td>' . $updateAt . '</td>
                                            <td>
                                                <a href="' . $suaTk . '"> <input type="button" value="Sửa"> </a> ';
                                                if($trangthai==1){
                                                    echo '<a href="'.$Ban.'"> <input type="button" value="Ban" onclick="return confirm(\''.$confirmBan.'\')"> </a>';
                                                }else{
                                                    echo '<a href="'.$Ban.'"> <input type="button" value="Hủy Ban" onclick="return confirm(\''.$confirmUnBan.'\')"> </a>';
                                                }
                                                echo '<a href="'.$hardDeleteTk.'"> <input type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa cứng? Điều này sẽ xóa vĩnh viễn sản phẩm!\')"> </a>
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
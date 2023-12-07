<main class="content">
        <div class="box_content">
            <div class="box_content font_title">
                <h1>KHÁCH HÀNG MUA NHIỀU NHẤT</h1>
            </div>
            <div class="box_content form_content ">
                    <div class="box_content form_loai ">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tổng đơn hàng</th>
                                <th>Tổng số sản phẩm</th>
                            </tr>
                            <?php if (!empty($listTopKh)) {
                                foreach ($listTopKh as $value) {
                                    extract($value);
                                    echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name. '</td>
                                            <td>' . $tel . '</td>
                                            <td>' . $tongDonHang . '</td>
                                            <td>' . $tongSoSanPham . '</td>
                                            </tr>';
                                }
                            } else {
                                echo "<tr >
                                    <td colspan='11'>Chưa có dữ liệu khách hàng nào</td>
                                </tr>";
                            } ?>
                        </table>
                    </div>
            </div>

    </div>
    </div>
    </body>

    </html>
</main>
<script src="https://kit.fontawesome.com/4392bd821c.js" crossorigin="anonymous"></script>
<!--Crossorigin: Nguồn gốc chéo, Anonymous: Vô danh-->
</div>
</body>

</html>
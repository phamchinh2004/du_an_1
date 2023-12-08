<?php
    if (isset($_GET['xoaSucc']) && $_GET['xoaSucc'] != "") {
        echo "<script>
                alert('" . $_GET['xoaSucc'] . "');
            </script>";
    }
?>
<div class="content">
    <div class="box_content">
        <div class="box_content font_title">
            <h1>Đánh giá của sản phẩm <?php foreach($loadAllVote as $value){extract($value);echo $namesp;}?></h1>
        </div>
        <div class="box_content form_content ">
            <form action="#" method="POST">
                <div class="box_content form_loai ">
                    <table>
                        <tr>
                            <th>ID ĐÁNH GIÁ</th>
                            <th>Tên người dùng</th>
                            <th>Nội dung</th>
                            <th>Số sao</th>
                            <th>Ngày đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php if (!empty($loadAllVote)) {
                            foreach ($loadAllVote as $value) {
                                extract($value);
                                $deleteVoteSp = "index.php?act=deleteVoteSp&iddg=" . $id . "&idsp=".$_GET['idsp'];
                                echo    '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $nameuser . '</td>
                                            <td>' . $content . '</td>
                                            <td>' . $id_star . '</td>
                                            <td>' . $vote_time . '</td>
                                            <td>
                                                <a href="'.$deleteVoteSp.'"> <input type="button" value="Xóa"> </a>
                                            </td>
                                        </tr>';
                            }
                        } else {
                            echo "<tr >
                                    <td colspan='10'>Không tìm thấy đánh giá nào</td>
                                </tr>";
                        } ?>
                    </table>                                                
                    <!-- <a href="'.$hardDeleteSp.'"> <input type="button" value="Xóa cứng" onclick="return confirm(\'Bạn có chắc chắn muốn xóa cứng? Điều này sẽ xóa vĩnh viễn sản phẩm!\')"> </a> -->

                </div>
            </form>
        </div>
    </div>

</div>
</div>
</body>

</html>
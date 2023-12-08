<div class="user-form">
    <h2 class="mb">QUÊN MẬT KHẨU</h2>
    <div class="box-quenmk">
        <form action="index.php?act=quenmk" method="post">
                <div>
                    <p class="mb">Email</p>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <input type="submit" value="Gửi" name="guiemail">
                <input type="reset" value="Nhập lại">
            </form>
            <h3>
                <?php
                    if ((isset($thongbao)) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                ?>
            </h3>
    </div>
</div>
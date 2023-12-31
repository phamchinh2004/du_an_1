<style>
        .user-rating {
            font-size: 30px;
        }

        .star {
            display: inline-block;
            color: grey;
            cursor: pointer;
        }

        .star:hover {
            color: gold;
        }
</style>
<div class="box-formrate">
    <div class="box-content-formrate">
        <h2 class="mb">ĐÁNH GIÁ SẢN PHẨM</h2>
        <form action="index.php?act=voteDone" class="content-formrate" method="post">
            <?php if(isset($loadVote) && $loadVote!=""){
                foreach($loadVote as $vote){
                extract($vote);
                $hinhanh="public/image/".$img;
                if(!is_file($hinhanh)){
                    $hinhanh="";
                }?>
            <div class="sp-userbuy">
                <input type="text" name="idctdh" value="<?=$idctdh?>" hidden>
                <img src="<?=$hinhanh?>" alt="" width="100">
                <h3><?=$namesp?></h3>
            </div>
            <?php }?>
            <label for="">Vui lòng chọn số sao</label>
            <select name="star" id="">
                <?php
                if(isset($loadStar) && $loadStar!= ""){
                 foreach($loadStar as $value){
                    extract($value);?>
                <option value="<?=$id?>"><?=$name?></option>
                <?php }}}?>
            </select>
            <div class="user-rating mb">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <textarea name="content" id="" cols="80" rows="10" placeholder="Hãy chia sẻ nhận xét của bạn về sản phẩm của chúng tôi. Lưu ý: nếu đánh giá có ngôn từ không phù hợp chúng tôi sẽ ẩn đi!"></textarea><br><br>
            <a href="#"><input name="btnSubmit" type="submit" value="Xác nhận"></a>
    </form>
    </div> 
    
</div>

<script>
        const stars = document.querySelectorAll('.star');

        function setRating(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.style.color = 'gold';
                } else {
                    star.style.color = 'grey';
                }
            });
        }

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                setRating(index + 1);
            });
        });

    </script>
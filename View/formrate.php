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
        <form class="content-formrate">
            <div class="sp-userbuy">
                <img src="public/image/dienthoai.jpg" alt="" width="100">
                <h3>iPhone 14 Pro Max / SL: 1</h3>
            </div>
            <div class="user-rating mb">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <textarea name="" id="" cols="80" rows="10" placeholder="Hãy chia sẻ nhận xét của bạn về sản phẩm của chúng tôi. Lưu ý: nếu đánh giá có ngôn từ không phù hợp chúng tôi sẽ ẩn đi!"></textarea><br><br>
            <a href="#"><input type="button" value="Xác nhận"></a>
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
//Slide show
var album=[];
for(var i=0;i<5;i++){
    album[i]=new Image();
    album[i].src="../public/image/banner"+i+".jpg";
}
 var interval=setInterval(slideshow,2000);
index=0;
function slideshow(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
}
function next(){
    index++;
    if(index>4){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
}
function pre(){
    index--;
    if(index<0){
        index=4;
    }
    document.getElementById("banner").src=album[index].src;
   
}
//END Slide show

document.addEventListener('DOMContentLoaded', function () {
    var menuItems = document.querySelectorAll('.aside_menu_list_item');

    menuItems.forEach(function (item) {
        item.addEventListener('click', function () {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
            } else {
                // Xóa lớp 'active' từ tất cả các mục
                menuItems.forEach(function (innerItem) {
                    innerItem.classList.remove('active');
                });

                // Thêm lớp 'active' vào mục được bấm
                item.classList.add('active');
            }
        });
    });
});
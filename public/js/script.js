//Slide show
var album=[];
for(var i=0;i<5;i++){
    album[i]=new Image();
    album[i].src="public/image/banner"+i+".jpg";
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

//Tổng tiền
function calculateTotal() {
    var price1 = document.getElementById("price1").value;
    var quantity1 = document.getElementById("quantity1").value;
    var total1 = price1 * quantity1;
    document.getElementById("total1").value = total1;

    var price2 = document.getElementById("price2").value;
    var quantity2 = document.getElementById("quantity2").value;
    var total2 = price2 * quantity2;
    document.getElementById("total2").value = total2;

    var grandTotal = total1 + total2;
    document.getElementById("grandTotal").value = grandTotal;
}
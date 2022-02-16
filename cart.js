var decrement=document.getElementById("decreement")
var x=document.getElementById("quantity").value;
var increement=document.getElementById("increement")
decrement.addEventListener("click",function(){
    var y=document.getElementById("quantity").value;
    if(y==0){
        return ;
    }else{
    --y;
    document.getElementById("quantity").value=y;
    }
})
increement.addEventListener("click",function(){
    var x=document.getElementById("quantity").value;
    ++x;
    document.getElementById("quantity").value=x;
})

function changeVisibility(){  
    var check = 0;
    for(var i = 0; i <= document.getElementsByClassName('req').length; i++){
        if(document.getElementsByClassName('req')[i].value != "" ){
            check++;
            if(check == document.getElementsByClassName('req').length){
                document.getElementById("empty").style.display = "none";
                document.getElementById("checked").style.opacity = "1";
            }
        }
    }
}


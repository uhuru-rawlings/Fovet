const toggleNavBar = (clicked_id) =>{
    var target = document.getElementById(clicked_id);
    if(target.style.display == "none"){
        target.style.display = "block";
    }else{
        target.style.display = "none";
    }
}
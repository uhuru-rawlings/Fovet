const toggleNavBar = (clicked_id) =>{
    var target = document.getElementById(clicked_id);
    if(target.style.display == "none"){
        target.style.display = "block";
    }else{
        target.style.display = "none";
    }
}

const closeApplicationForm =() =>{
    document.getElementById("carousel-container").style.display = "none"
}

const openApplicationForm =(clicked_id) =>{
    document.getElementById("carousel-container").style.display = "block"
    document.getElementById("course_id").value = clicked_id;
}
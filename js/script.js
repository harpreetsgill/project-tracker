function toggleProjView() {
    var btn = document.getElementById("add-proj-plus");
    var form = document.getElementById("div-add-proj");
    var svg = document.getElementById("svgsign");
    var spanAdd = document.getElementById("spn-add");
    var spanS = document.getElementById("spn-s");

    if (form.style.display === "block") {
        form.style.display = "none";
        spanAdd.style.display = "none";
        spanS.style.display = "inline";
    }
    else {
        form.style.display = "block";
        spanAdd.style.display = "inline";
        spanS.style.display = "none";
    }
    
}

function toggleCourseView() {
    var btn = document.getElementById("add-course-plus");
    var form = document.getElementById("addCourse");
    // var svg = document.getElementById("svgsign");
    var spanAdd = document.getElementById("spn-course-add");
    var spanS = document.getElementById("spn-course-s");

    if (form.style.display === "block") {
        form.style.display = "none";
        spanAdd.style.display = "none";
        spanS.style.display = "inline";
    }
    else {
        form.style.display = "block";
        spanAdd.style.display = "inline";
        spanS.style.display = "none";
    }    
}

// Using id
function toggleEdit() {
    console.log("edit");
    document.getElementById("edit").style.display = "none";
    document.getElementById("update").style.display = "inline";
}

// Using class
// function toggleEdit() {
//     console.log("edit");
//     document.getElementsByClassName("edit").style.display = "none";
//     document.getElementsByClassName("update").style.display = "inline";
// }
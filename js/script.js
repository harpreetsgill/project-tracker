// document.getElementById("add-proj-plus").onclick = document.getElementById("addProj").style.display == "none";

function toggleView() {
    var btn = document.getElementById("add-proj-plus");
    var form = document.getElementById("div-add-proj");
    var svg = document.getElementById("svgsign");
    var spanAdd = document.getElementById("spn-add");
    var spanS = document.getElementById("spn-s");

    if (form.style.display === "block") {
        form.style.display = "none";
        spanAdd.style.display = "none";
        spanS.style.display = "none";
    }
    else {
        form.style.display = "block";
        spanAdd.style.display = "inline";
        spanS.style.display = "inline";
    }
    
}
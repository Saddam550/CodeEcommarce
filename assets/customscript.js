
// header promote =================
var promote = document.getElementById("promoteDisplay")
setTimeout(() => {
    promote.style.transition = " All 0.3s";
    promote.style.transform = " scaleY(0)";
    promote.style.transformOrigin = " top";
    promote.style.visibility = "hidden";
    setTimeout(() => {
        promote.style.display = "none";
    }, 100);



}, 2000);
// short Menu =============
var customActive = document.querySelectorAll("#customActive")

customActive[0].addEventListener("click", function(){
console.log("asdas")

})

function FristColor() {
    var FristColorSet = document.querySelector("#FristColorSet")
    var colorOne = document.querySelector("#colorOne")

    FristColorSet.value=colorOne.innerText
}

function SecendColor() {
    var SecendColorSet = document.querySelector("#SecendColorSet")
    var colortwo = document.querySelector("#colortwo")

    SecendColorSet.value=colortwo.innerText
}


function ThirColor() {
    var ThirColorSet = document.querySelector("#ThirColorSet")
    var colorThere = document.querySelector("#colorThere")

    ThirColorSet.value=colorThere.innerText
}


var priceFilters = document.getElementById("priceFilters");

var userSelectPrice = document.getElementById("userSelectPrice");
var filterShowAndDefaultNone = document.getElementById("filterShowAndDefaultNone")
var priceFilterShowClass = document.querySelector(".priceFilterShowClass")

var changeFilterText = document.getElementById("changeFilterText")
var filerChangeShortMenu = document.getElementById("filerChangeShortMenu")

userSelectPrice.innerText = priceFilters.value
priceFilters.addEventListener("change", function priceFiltersfun() {
    userSelectPrice.innerText = priceFilters.value


    if (priceFilters.value >= 0) {
        filterShowAndDefaultNone.style.display = "none"
        changeFilterText.innerText = "Filter Result"
        filerChangeShortMenu.style.display = "none"
        priceFilterShowClass.style.display = "block"
  
    } 
    
    if (priceFilters.value <= 0) {
        filterShowAndDefaultNone.style.display = "flex"
        priceFilterShowClass.style.display = "none"
        changeFilterText.innerText = "Letest Products"
        filerChangeShortMenu.style.display = "block"

    }

})







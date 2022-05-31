
let toTop = document.querySelector(".toTop");
window.addEventListener("scroll",function() {
    if (window.pageYOffset > 600) {
        toTop.classList.add("active_toTop");
    } else {
        toTop.classList.remove("active_toTop");
   }
});
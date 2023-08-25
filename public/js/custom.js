/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

/* Preloader */
var loaderBg = document.querySelector('.loader_bg')

window.onload = function(){
    setTimeout(function(){
		loaderBg.style.display = 'none';
    }, 500); // Puedes cambiar el tiempo cada mil es 1 segundo.
}

// Sidepanel

var sidepanel = document.getElementById("mySidepanel");

openBtn.addEventListener("click", function() {
	sidepanel.style.width = "250px";
});

closeBtn.addEventListener("click", function() {
	sidepanel.style.width = "0";
});
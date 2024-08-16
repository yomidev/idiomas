document.addEventListener("DOMContentLoaded", function() {
    var enlacesMenu = document.getElementById("enlaces");
    var enlacesMenuOffset = enlacesMenu.offsetTop;

    window.addEventListener("scroll", function() {
        var scrollPos = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollPos >= enlacesMenuOffset) {
            enlacesMenu.classList.add("fixed-top");
        } else {
            enlacesMenu.classList.remove("fixed-top");
        }
    });
});
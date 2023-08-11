window.onload = function() {
    navExpander();
};

function navExpander() {
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.querySelector(".navbar-links").classList.toggle("show");
    });
}

window.addEventListener("load", function() {
    
    let dropdownButton = document.getElementById("dropdownButton");
    dropdownButton.addEventListener("click", toggleHamburgerMenu, "false");

    function toggleHamburgerMenu() {
        document.getElementById("mobileNav").classList.toggle("show");
    }
    
}, "false");
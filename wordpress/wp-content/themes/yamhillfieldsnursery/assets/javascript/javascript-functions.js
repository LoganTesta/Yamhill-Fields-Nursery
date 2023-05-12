
window.addEventListener("load", function() {
    
    let dropdownButton = document.getElementById("dropdownButton");
    dropdownButton.addEventListener("click", toggleHamburgerMenu, "false");

    function toggleHamburgerMenu() {
        document.getElementById("mobileNav").classList.toggle("show");
    }
    
    
    //WooCommerce: remove required attribute on product ratings comments.
    if(document.getElementById("comment") !== null){
        document.getElementById("comment").removeAttribute("required"); 
    } 
    
    
    /*Toggle show/hide for search bar. */
    let searchIcon = document.getElementById("searchFormSearchIcon");
    searchIcon.addEventListener("click", toggleSearchForm, false);
    
    function toggleSearchForm() {
        document.getElementById("searchForm").classList.toggle("show");
    }
    
    
}, "false");
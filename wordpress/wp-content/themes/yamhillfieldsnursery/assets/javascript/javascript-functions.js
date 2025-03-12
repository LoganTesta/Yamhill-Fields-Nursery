
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
    let searchFormSearchIcon = document.getElementById("searchFormSearchIcon");
    searchFormSearchIcon.addEventListener("click", toggleSearchForm, false);
    
    searchFormSearchIcon.addEventListener("keypress", function(event){
        if (event.key==="Enter") {
            toggleSearchForm();
        }
    });
    
    
    let searchFormCloseSearchIcon = document.getElementById("searchFormCloseSearchIcon");
    searchFormCloseSearchIcon.addEventListener("click", toggleSearchForm, false);
    
    searchFormCloseSearchIcon.addEventListener("keypress", function(event){
        if (event.key==="Enter") {
            toggleSearchForm();
        }
    });
    
    
    function toggleSearchForm() {
        document.getElementById("searchForm").classList.toggle("show");
    }
    
    
}, "false");
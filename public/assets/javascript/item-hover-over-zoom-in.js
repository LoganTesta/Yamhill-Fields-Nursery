
let numberOfItems = 7;

for (let i = 0; i < numberOfItems; i++) {
    let itemInspectBackground = document.getElementsByClassName("item__inspect-background")[i];

    let itemImage = document.getElementsByClassName("item__background-image")[i];
    let itemImageZoomIn = document.getElementsByClassName("item__zoom-in")[i];
    let itemZoomInContainer = document.getElementsByClassName("item__zoom-in-container")[i];
    let itemInspectBackgroundClose = document.getElementsByClassName("item__zoom-in-container-close")[i];


    itemImage.addEventListener("click", function () {
        toggleExamine(event, i);
    });

    itemImage.addEventListener("mousemove", function () {
        updateZoomInImage(event, i);
    });
    itemInspectBackground.addEventListener("click", function () {
        toggleExamine(event, i);
    });
    
    itemInspectBackgroundClose.addEventListener("click", function () {
        toggleExamine(event, i);
    });
}

window.onload = checkBrowserWidth();
window.addEventListener("resize", checkBrowserWidth);


function checkBrowserWidth() {
    for (let i = 0; i < numberOfItems; i++) {
        if (window.innerWidth >= 1200) {
            if (document.getElementsByClassName("item__inspect-background")[i].classList.contains("show") === false) {
                document.getElementsByClassName("item__inspect-background")[i].classList.add("show");
            }
        } else {
            document.getElementsByClassName("item__inspect-background")[i].classList.remove("show");
        }

        if (window.innerWidth < 1200) {
            document.getElementsByClassName("item__zoom-in-container")[i].classList.remove("inspect");
            document.getElementsByClassName("item__zoom-in-container-close")[i].classList.remove("inspect");
        }
    }
}

function toggleExamine(event, itemNumber) {
    for (let i = 0; i < numberOfItems; i++) {
        if(i !== itemNumber){
            document.getElementsByClassName("item__zoom-in-container")[i].classList.remove("inspect");
            document.getElementsByClassName("item__zoom-in-container-close")[i].classList.remove("inspect");
        }
    }
    if (window.innerWidth >= 1200) {
        document.getElementsByClassName("item__zoom-in-container")[itemNumber].classList.toggle("inspect");
        document.getElementsByClassName("item__zoom-in-container-close")[itemNumber].classList.toggle("inspect");
    }
}

function updateZoomInImage(event, itemNumber) {
    let imageBaseX = 91;
    let imageBaseY = 73;

    let imageBaseCroppedX = 0;
    let imageBaseCroppedY = 0;

    let itemImageRect = document.getElementsByClassName("item__background-image")[itemNumber].getBoundingClientRect();

    let mouseX = event.pageX - itemImageRect.left - window.pageXOffset;
    let mouseY = event.pageY - itemImageRect.top - window.pageYOffset;

    if (mouseX < 0) {
        mouseX = 0;
    }
    if (mouseX > 370) {
        mouseX = 370;
    }
    if (mouseY < 0) {
        mouseY = 0;
    }
    if (mouseY > 300) {
        mouseY = 300;
    }

    let updatedX = imageBaseX - imageBaseCroppedX - 0.5 * mouseX;
    let updatedY = imageBaseY - imageBaseCroppedY - 0.5 * mouseY;

    document.getElementsByClassName("item__zoom-in")[itemNumber].style.backgroundPosition = updatedX + "px" + " " + updatedY + "px";
}
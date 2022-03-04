
window.addEventListener("load", function() {
    
    /* Start of Slideshow */
    let currentSlide;
    let prevSlide;
    let slideshowCounter = 0;
    let paused = false;
    let updateSlideSettings = true;
    let regularSwitchSlide = false;
    let switchText = false;
    let currentSlideNumber = 0;
    const maxSlideNumber = 3;
    let pausePlayButton;
    let slide0 = new Image(670, 400);
    slide0.src = "wp-content/themes/yamhillfieldsnursery/assets/images/aloe-vera-close-up.jpg";
    let slide1 = new Image(670, 400);
    slide1.src = "wp-content/themes/yamhillfieldsnursery/assets/images/plants-in-pots-inside-greenhouse.jpg";
    let slide2 = new Image(670, 400);
    slide2.src = "wp-content/themes/yamhillfieldsnursery/assets/images/plants/grasses-up-close.jpg";
    let slide3 = new Image(670, 400);
    slide3.src = "wp-content/themes/yamhillfieldsnursery/assets/images/supplies/seed-packs.jpg";

    let slideButton0 = document.getElementById('slideButton0');
    let slideButton1 = document.getElementById('slideButton1');
    let slideButton2 = document.getElementById('slideButton2');
    let slideButton3 = document.getElementById('slideButton3');

    slideButton0.addEventListener('click', function () {
       setSlide(0);
    }, false);
    slideButton1.addEventListener('click', function () {
       setSlide(1);
    }, false);
    slideButton2.addEventListener('click', function () {
       setSlide(2);
    }, false);
    slideButton3.addEventListener('click', function () {
       setSlide(3);
    }, false);

    let backIcon = document.getElementsByClassName("slideshow__icon")[0];
    let forwardIcon = document.getElementsByClassName("slideshow__icon")[1];

    let currentSlideImageLink = document.getElementsByClassName("slideshow__image__link")[0];

    backIcon.addEventListener('click', function () {
       setSlide(currentSlideNumber - 1);
    }, false);

    forwardIcon.addEventListener('click', function () {
       setSlide(currentSlideNumber + 1);
    }, false);



    function init() {
        prevSlide = document.getElementsByClassName("slideshow__image")[0];
        currentSlide = document.getElementsByClassName("slideshow__image")[1];
        pausePlayButton = document.getElementById("pausePlayButton");
        currentSlide.style.opacity = 0;
        prevSlide.style.opacity = 0;
        currentSlideImageLink.href = "plants";
        currentSlideImageLink.setAttribute("aria-label", "Plants");
        currentSlideImageLink.innerHTML = "View from the nursery...";
        setInterval(function () {
            runFunctions();
        }, 10);
    }
    window.onload = init();

    function runFunctions() {
        runSlideShow();
    }

    function runSlideShow() {
        if (paused === false) {
            if (slideshowCounter === 200) {
                switchText = true;
            }
            if (slideshowCounter < 400) {
                currentSlide.style.opacity = parseFloat(currentSlide.style.opacity) + 0.0025;
                prevSlide.style.opacity = parseFloat(prevSlide.style.opacity) - 0.0025;
            }
            if (400 <= slideshowCounter && slideshowCounter < 900) {
                currentSlide.style.opacity = 1;
                prevSlide.style.opacity = 0;
            }

            if (slideshowCounter >= 900) {
                slideshowCounter = 0;
                updateSlideSettings = true;
                regularSwitchSlide = true;
                currentSlideNumber++;
            }

            if (currentSlideNumber < 0) {
                currentSlideNumber = maxSlideNumber;
            } else if (currentSlideNumber > maxSlideNumber) {
                currentSlideNumber = 0;
            }

            if (updateSlideSettings) {
                updateSlideSettings = false;
                if(regularSwitchSlide){
                    regularSwitchSlide = false;
                    currentSlide.style.opacity = 0;
                    prevSlide.style.opacity = 1;
                }

                if (currentSlideNumber === 0) {
                    currentSlide.style.backgroundImage = "url(" + slide0.src + ")";
                    prevSlide.style.backgroundImage = "url(" + slide3.src + ")";
                    slideButton0.classList.add('currentSlideButton');
                    slideButton1.classList.remove('currentSlideButton');
                    slideButton2.classList.remove('currentSlideButton');
                    slideButton3.classList.remove('currentSlideButton');                  
                } else if (currentSlideNumber === 1) {
                    currentSlide.style.backgroundImage = "url(" + slide1.src + ")";
                    prevSlide.style.backgroundImage = "url(" + slide0.src + ")";
                    slideButton0.classList.remove('currentSlideButton');
                    slideButton1.classList.add('currentSlideButton');
                    slideButton2.classList.remove('currentSlideButton');
                    slideButton3.classList.remove('currentSlideButton');                  
                } else if (currentSlideNumber === 2) {
                    currentSlide.style.backgroundImage = "url(" + slide2.src + ")";
                    prevSlide.style.backgroundImage = "url(" + slide1.src + ")";
                    slideButton0.classList.remove('currentSlideButton');
                    slideButton1.classList.remove('currentSlideButton');
                    slideButton2.classList.add('currentSlideButton');
                    slideButton3.classList.remove('currentSlideButton');                 
                } else if (currentSlideNumber === 3) {
                    currentSlide.style.backgroundImage = "url(" + slide3.src + ")";
                    prevSlide.style.backgroundImage = "url(" + slide2.src + ")";
                    slideButton0.classList.remove('currentSlideButton');
                    slideButton1.classList.remove('currentSlideButton');
                    slideButton2.classList.remove('currentSlideButton');
                    slideButton3.classList.add('currentSlideButton');
                }
            }
            if (switchText){
                switchText = false;
                if (currentSlideNumber === 0) {
                    currentSlideImageLink.href = "plants";
                    currentSlideImageLink.setAttribute("aria-label", "Plants");
                    currentSlideImageLink.innerHTML = "View from the nursery...";
                } else if (currentSlideNumber === 1) {
                    currentSlideImageLink.href = "about";
                    currentSlideImageLink.setAttribute("aria-label", "About");
                    currentSlideImageLink.innerHTML = "Rows and rows of plants!";
                } else if (currentSlideNumber === 2) {
                    currentSlideImageLink.href = "plants";
                    currentSlideImageLink.setAttribute("aria-label", "Plants");
                    currentSlideImageLink.innerHTML = "Green grass for yards";
                } else if (currentSlideNumber === 3) {
                    currentSlideImageLink.href = "supplies";
                    currentSlideImageLink.setAttribute("aria-label", "Supplies");
                    currentSlideImageLink.innerHTML = "Wide variety of seeds";
                }
            }
            slideshowCounter++;
        }
    }

    function togglePausePlay() {
        paused = !paused;
        if (paused === false) {
            pausePlayButton.classList.remove("paused");
        } else if (paused) {
            pausePlayButton.classList.add("paused");
        }
    }

    let pausePlay = document.getElementById("pausePlayButton");
    pausePlay.addEventListener("click", togglePausePlay, false);

    function setSlide(slideNumber) {
        slideshowCounter = 400;
        currentSlideNumber = slideNumber;
        paused = false;
        pausePlayButton.classList.remove("paused");
        updateSlideSettings = true;
        switchText = true;
    }

}, "false");
/*Start of Slideshow */
let currentSlide;
let slideshowCounter = 0;
let paused = false;
let currentSlideNumber = 0;
const maxSlideNumber = 3;
let pausePlayButton;
let slide0 = new Image(670, 400);
slide0.src = "assets/images/plants-in-pots-inside-greenhouse.jpg";
let slide1 = new Image(670, 400);
slide1.src = "assets/images/aloe-vera-close-up.jpg";
let slide2 = new Image(670, 400);
slide2.src = "assets/images/plants/grasses-up-close.jpg";
let slide3 = new Image(670, 400);
slide3.src = "assets/images/supplies/seed-packs.jpg";

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

backIcon.addEventListener('click', function () {
   setSlide(currentSlideNumber - 1);
}, false);

forwardIcon.addEventListener('click', function () {
   setSlide(currentSlideNumber + 1);
}, false);

function init() {
    currentSlide = document.getElementsByClassName("slideshow__image")[0];
    pausePlayButton = document.getElementById("pausePlayButton");
    currentSlide.style.opacity = 0;
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
        pausePlayButton.style.background = "url(assets/images/pause-button.png)";
    } else if (paused) {
        pausePlayButton.style.background = "url(assets/images/play-button.png)";
    }
    if (paused === false) {
        if (slideshowCounter === 0) {
            currentSlide.style.opacity = 0;
        }
        if (slideshowCounter < 100) {
            currentSlide.style.opacity = parseFloat(currentSlide.style.opacity) + 0.01;
        }
        if (100 <= slideshowCounter && slideshowCounter < 600) {
            currentSlide.style.opacity = 1;
        }
        if (slideshowCounter >= 600) {
            currentSlide.style.opacity = parseFloat(currentSlide.style.opacity) - 0.01;
        }
        if (slideshowCounter >= 700) {
            slideshowCounter = 0;
            currentSlide.style.opacity = 0;
            currentSlideNumber++;
        }
         
        if (currentSlideNumber < 0) {
            currentSlideNumber = maxSlideNumber;
        } else if (currentSlideNumber > maxSlideNumber) {
            currentSlideNumber = 0;
        }
        
        if (currentSlideNumber === 0) {
            currentSlide.style.backgroundImage = "url(" + slide0.src + ")";
            slideButton0.style.opacity = 1.0;
            slideButton1.style.opacity = 0.40;
            slideButton2.style.opacity = 0.40;
            slideButton3.style.opacity = 0.40;
        } else if (currentSlideNumber === 1) {
            currentSlide.style.backgroundImage = "url(" + slide1.src + ")";
            slideButton0.style.opacity = 0.40;
            slideButton1.style.opacity = 1.0;
            slideButton2.style.opacity = 0.40;
            slideButton3.style.opacity = 0.40;
        } else if (currentSlideNumber === 2) {
            currentSlide.style.backgroundImage = "url(" + slide2.src + ")";
            slideButton0.style.opacity = 0.40;
            slideButton1.style.opacity = 0.40;
            slideButton2.style.opacity = 1.0;
            slideButton3.style.opacity = 0.40;
        } else if (currentSlideNumber === 3) {
            currentSlide.style.backgroundImage = "url(" + slide3.src + ")";
            slideButton0.style.opacity = 0.40;
            slideButton1.style.opacity = 0.40;
            slideButton2.style.opacity = 0.40;
            slideButton3.style.opacity = 1.0;
        }
        slideshowCounter++;
    }
}

function togglePausePlay() {
    paused = !paused;
}

let pausePlay = document.getElementById("pausePlayButton");
pausePlay.addEventListener("click", togglePausePlay, false);

function setSlide(slideNumber) {
    slideshowCounter = 50;
    currentSlideNumber = slideNumber;
    paused = false;
}
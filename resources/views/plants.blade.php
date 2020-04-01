<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Your friendly Portland area landscaping and gardening store is here for business." />
        <meta name="keywords" content="nursery, Portland, Yamhill, Willamette Valley, Oregon, plants, grass, shrubs, trees, garden, gardening, landscaping" />
        <title>Plants | Yamhill Fields Nursery</title>
        @include('includes.head')
    </head>
    <body>
        <div class="body-wrapper">
            <header>
                <div class="header__background"></div>
                <div class="inner-wrapper">
                    @include('includes.header-components')
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__subtitle">Plants</h2>
                    </div>
                </div>
            </header>
            @include('includes.nav')
            <div class="content">
                <div class="inner-wrapper">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <h3>Buy Plants Here</h3>
                            <p>Come buy lots of house plants at our fantastic nursery.</p>
                            <p>NOTE: Prices and supplies are approximate and are provided as an estimate only.</p>
                        </div>
                        <div class="plant zero col-sma-4">
                            <h4 class="plant__title">Cacti</h4>
                            <div class="plant__background-image"></div>
                            <div class="plant__zoom-in-container-close">X</div>
                            <div class="plant__zoom-in-container"> 
                                <div class="plant__zoom-in"></div>
                            </div>
                            <div class="plant__inspect-background"></div>
                            <div class="plant__description">Small and compact, perfect for an easy house-plant.</div>
                            <div class="plant__price">$5</div>
                        </div>
                        <div class="plant one col-sma-4">
                            <h4 class="plant__title">Deciduous and Evergreen Saplings</h4>
                            <div class="plant__background-image"></div>
                            <div class="plant__zoom-in-container-close">X</div>
                            <div class="plant__zoom-in-container">
                                <div class="plant__zoom-in"></div>
                            </div>
                            <div class="plant__inspect-background"></div>
                            <div class="plant__description">Time to get a sapling for your yard or farm.  Assorted Varieties.</div>
                            <div class="plant__price">Typically around $70-$100</div>
                        </div>
                        <div class="plant two col-sma-4">
                            <h4 class="plant__title">Fern</h4>
                            <div class="plant__background-image"></div>
                            <div class="plant__zoom-in-container-close">X</div>
                            <div class="plant__zoom-in-container">
                                <div class="plant__zoom-in"></div>
                            </div>
                            <div class="plant__inspect-background"></div>
                            <div class="plant__description">Now's your chance to get fresh backyard blueberries!</div>
                            <div class="plant__price">$15</div>
                        </div>
                        <div class="plant three col-sma-4">
                            <h4 class="plant__title">Blueberry Bush</h4>
                            <div class="plant__background-image"></div>
                            <div class="plant__zoom-in-container-close">X</div>
                            <div class="plant__zoom-in-container">
                                <div class="plant__zoom-in"></div>
                            </div>
                            <div class="plant__inspect-background"></div>
                            <div class="plant__description">Low maintenance and very good as a background or center plant.</div>
                            <div class="plant__price">$20</div>
                        </div>
                        <div class="plant four col-sma-4">
                            <h4 class="plant__title">Potted Plants</h4>
                            <div class="plant__background-image"></div>
                            <div class="plant__zoom-in-container-close">X</div>
                            <div class="plant__zoom-in-container">
                                <div class="plant__zoom-in"></div>
                            </div>
                            <div class="plant__inspect-background"></div>
                            <div class="plant__description">We sell a wide variety of potted plants!  Depending on the time of year you can find
                            flowers, mints, strawberries, small bushes, and potted plants.  Great for decorating both the inside and outside of a home, 
                            apartment, business, and wherever else you can think of!  Plants range in size and price.</div>
                            <div class="plant__price">$5-30</div>
                        </div>
                        <div class="plant five col-sma-4">
                            <h4 class="plant__title">Grass</h4>
                            <div class="plant__background-image"></div>
                            <div class="plant__zoom-in-container-close">X</div>
                            <div class="plant__zoom-in-container">
                                <div class="plant__zoom-in"></div>
                            </div>
                            <div class="plant__inspect-background"></div>
                            <div class="plant__description">We sell small pots of grass for those you in need of a small addition
                                to a garden or yard.</div>
                            <div class="plant__price">$4</div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.footer')
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    setCurrentPage(1, "mobileNav");
                    setCurrentPage(1, "desktopNav");
                });
            </script>
            <script type="text/javascript" src="/assets/javascript/plant-hover-over-zoom-in.js"></script>
        </div>
    </body>
</html>
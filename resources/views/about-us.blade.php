<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Your friendly Portland area landscaping and gardening store is here for business." />
        <meta name="keywords" content="nursery, Portland, Yamhill, Willamette Valley, Oregon, plants, grass, shrubs, trees, garden, gardening, landscaping" />
        <title>About | Yamhill Fields Nursery</title>
        @include('includes.head')
    </head>
    <body>
        <div class="body-wrapper">
            <header>
                <div class="header__background"></div>
                <div class="inner-wrapper">        
                    @include('includes.header-components')
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__subtitle">About Us</h2>
                    </div>
                </div>
            </header>
            @include('includes.nav')
            <div class="inner-wrapper">
                <div class="content">
                    <div class="content-row">
                        <div class="col-sma-5">
                            <h3>We Sell Plants and Supplies!</h3>
                            <p>We've been a fixture and go-to destination for home and yard plants, landscaping and plant supplies since
                                our founding in 1982.  Over the years we've grown our inventory but still retain our small business feel.</p>
                            <h3>Hours</h3>
                            <p>Open Mon-Sat 9:00 am-9:00 pm, closed Sunday.</p>
                            <p>Questions? Call us at 503-538-8204.</p>
                            <h3>Location</h3>
                            <p>45202 Oak Highway, Dundee, OR 97115</p>
                        </div>
                        <div class="col-sma-7">
                            <div class="content-background-container">
                                <div class="content__content-image about-one"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.footer')
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    setCurrentPage(4, "mobileNav");
                    setCurrentPage(4, "desktopNav");
                });
            </script>
        </div>
    </body>
</html>
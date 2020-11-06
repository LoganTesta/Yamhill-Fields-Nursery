<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Your friendly Portland area landscaping and gardening store is here for business." />
        <meta name="keywords" content="nursery, Portland, Yamhill, Willamette Valley, Oregon, plants, grass, shrubs, trees, garden, gardening, landscaping" />
        <title>Supplies | Yamhill Fields Nursery</title>
        @include('includes.head')
    </head>
    <body>
        <div class="body-wrapper">
            <header>
                <div class="header__background"></div>
                <div class="inner-wrapper">
                    @include('includes.header-components')
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__subtitle">Supplies</h2>
                    </div>
                </div>
            </header>
            @include('includes.nav')
            <div class="inner-wrapper">
                <div class="content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <h3>Supplies for Sale</h3>
                            <p>Whether it's winter or summer, we have the supplies you need for your gardening projects!  <strong><em>Note: Prices and 
                                supplies are approximate and are provided as an estimate only.</em></strong></p>
                        </div>
                    </div>
                    <div class="content-row">
                        <div class="col-sma-12">
                        </div>
                        <?php echo do_shortcode( "[yfn_woocommerce_products_supplies]" ); ?>
                    </div>
                </div>
            </div>
            @include('includes.footer')
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    setCurrentPage(2, "mobileNav");
                    setCurrentPage(2, "desktopNav");
                });
            </script>
            <script type="text/javascript" src="/assets/javascript/item-hover-over-zoom-in.js"></script>
            <script>
                loadItems(7);    
            </script>
        </div>
    </body>
</html>
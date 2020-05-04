<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Your friendly Portland area landscaping and gardening store is here for business." />
        <meta name="keywords" content="nursery, Portland, Willamette Valley, Oregon, plants, grass, shrubs, trees, garden, gardening, landscaping" />
        <title>Yamhill Fields Nursery</title>
        <?php wp_head(); ?><!-- Allow WordPress plugins to use CSS and JavaScript. -->
        @include('includes.head')
    </head>
    <body class="page-index">
        <div class="body-wrapper">
            <header>
                <div class="header__background"></div>
                <div class="inner-wrapper">
                    @include('includes.header-components')
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__subtitle">The Place to Buy Outdoor and Indoor Plants!</h2>
                    </div>
                </div>
            </header>
            @include('includes.nav')
            <div class="inner-wrapper">
                <div class="content">
                    <div class="content-row">
                        <div class="col-sma-7">
                            <div class="slideshow">
                                <div class="slideshow__image">
                                    <a href="/" aria-label="" class="slideshow__image__link">
                                        <div class="slideshow__slide-background"></div>
                                        <div class="slideshow__slide-description"></div>
                                    </a>
                                </div>
                                <div class="slideshow__icon left">
                                    <div class="slideshow__icon__link">&#10094;</div>
                                </div>
                                <div class="slideshow__icon right">
                                    <div class="slideshow__icon__link">&#10095;</div>
                                </div>
                                <div class="slideshow__buttons">
                                    <div id="pausePlayButton" class="slideshow__slide-button"></div>
                                    <div id="slideButton0" class="slideshow__slide-button">
                                        <div class="slideshow__button-text"></div>
                                    </div>
                                    <div id="slideButton1" class="slideshow__slide-button">
                                        <div class="slideshow__button-text"></div>
                                    </div>
                                    <div id="slideButton2" class="slideshow__slide-button">
                                        <div class="slideshow__button-text"></div>
                                    </div>
                                    <div id="slideButton3" class="slideshow__slide-button">
                                        <div class="slideshow__button-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sma-5">
                            <h3>The Best Nursery in Yamhill County</h3>
                            <p class="content__highlighted-phrase"><strong>Get all your gardening and landscaping plants and supplies in one stop!</strong></p>
                            <p>We sell grass, shrubs, house plants, saplings, and more!</p>
                            <p>We sell gardening and landscaping tools!</p>
                            <p>Open Mon-Sat 9:00 am-9:00 pm, closed Sunday.</p>
                            <p>Questions: call us at 503-538-8204.</p>
                            <p>We are in Dundee near Portland in the Willamette Valley!</p>
                        </div>
                    </div>
                    <div class="content-row">
                        <div class="col-sma-1">&nbsp;</div>
                        <div class="col-sma-5">
                            <div class="index-product zero">
                                <div class="index-product__name"><a href="/plants" class="index-product__name-link">Saplings for the yard</a></div>
                                <div class="index-product__image">
                                    <div class="index-product__background-layer">
                                        <a href="/plants" class="index-product__image-link"><span class="sr-only">Plants</span></a>
                                    </div>    
                                </div>
                                <div class="index-product__description">We sell deciduous and evergreens.  Grown here in the nursery!</div>
                                <div class="clear-both"></div>
                            </div>
                        </div>
                        <div class="col-sma-5">
                            <div class="index-product one">
                                <div class="index-product__name"><a href="/supplies" class="index-product__name-link">Watering cans and more</a></div>
                                <div class="index-product__image">
                                    <div class="index-product__background-layer">
                                        <a href="/supplies" class="index-product__image-link"><span class="sr-only">Supplies</span></a>
                                    </div>
                                </div>
                                <div class="index-product__description">We are here for your gardening supplies.  Give us a call or drop on in.</div>
                                <div class="clear-both"></div>
                            </div>
                        </div>
                        <div class="col-sma-1">&nbsp;</div>
                    </div>	
                    <div class="content-row">
                        <?php
                        global $post;
                        $args = array('posts_per_page' => 3);
                        $postsToDisplay = get_posts($args);
                        foreach ($postsToDisplay as $post) : setup_postdata($post);
                            ?>      
                            <div class="col-sma-4">
                                <div class="blog-post">
                                    <h4 class="blog-post__title"><a href="/our-blog#<?php the_title(); ?>" class="blog-post__title__link"><?php the_title(); ?></a></h4>
                                    <div class="blog__categories"><?php
                                        $categories = get_the_category();
                                        $h = 0;
                                        foreach ($categories as $category) {
                                            $h++;
                                        }
                                        $h = $h - 1;
                                        $i = 0;
                                        foreach ($categories as $category) {
                                            $result = "";
                                            if ($i < $h) {
                                                $result .= $category->name . ", ";
                                            } else {
                                                $result .= $category->name;
                                            }
                                            echo $result;
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                    <div class="blog__date"><?php the_date(); ?></div>
                                    <div class="blog__image"><a href="/our-blog#<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a> <div class="clear-both"></div></div>
                                    <div class="blog__content"><?php the_excerpt(); ?></div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>	
                    <div class="content-row">
                        <div class="col-sma-12">
                            <?php
                            $content = "" . do_shortcode('[general_testimonials]');
                            echo $content;
                            ?>
                        </div>
                    </div>
                    <div class="content-row">
                        <div class="col-sma-1">&nbsp;</div>
                        <div class="col-sma-10">
                            <h3>Serving Gardeners and Landscapers Since 1982</h3>
                            <p>We've had the honor of selling plants and landscaping and gardening supplies to our customers for many years.
                                Drop and by and see why gardeners and landscapers make us their go-to garden and landscaping store!</p>
                        </div>
                        <div class="col-sma-1">&nbsp;</div>
                    </div>
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="subfooter-container">
                                <div class="nursery-view__subheader"><h3>You could be here looking at plants!</h3></div>
                                <div class="subfooter-container__background content__content-image"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.footer')
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    setCurrentPage(0, "mobileNav");
                    setCurrentPage(0, "desktopNav");
                });
            </script>
            <script src="/assets/javascript/index-slideshow.js"></script>
        </div>
        <?php wp_footer(); ?><!-- Allow WordPress plugins to use CSS and JavaScript. -->
    </body>
</html>
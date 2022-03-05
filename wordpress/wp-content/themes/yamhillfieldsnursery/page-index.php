<?php

/*Description: Index page custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-7">
                <div class="slideshow">
                    <div class="slideshow__image"></div>
                    <div class="slideshow__image">                   
                        <div class="slideshow__slide-background"></div>
                    </div>
                    <div class="slideshow__image__link-wrapper">
                        <a href="/" aria-label="" class="slideshow__image__link"></a>
                        <div class="slideshow__image__link-decoration-container">
                            <div class="slideshow__image__link-decoration"></div>
                        </div>
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
                <?php the_content(); ?>
                <div class="content__featured-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>')"></div>    
            </div>
        </div>
        <div class="content-row">
            <div class="col-sma-1">&nbsp;</div>
            <div class="col-sma-5">
                <div class="index-product zero">
                    <div class="index-product__name"><a href="plants" class="index-product__name-link">Saplings for the yard</a></div>
                    <div class="index-product__image">
                        <div class="index-product__background-layer">
                            <a href="plants" class="index-product__image-link"><span class="sr-only">Plants</span></a>
                        </div>    
                    </div>
                    <div class="index-product__description">We sell deciduous and evergreens.  Grown here in the nursery!</div>
                    <div class="clear-both"></div>
                </div>
            </div>
            <div class="col-sma-5">
                <div class="index-product one">
                    <div class="index-product__name"><a href="supplies" class="index-product__name-link">Watering cans and more</a></div>
                    <div class="index-product__image">
                        <div class="index-product__background-layer">
                            <a href="supplies" class="index-product__image-link"><span class="sr-only">Supplies</span></a>
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
            $numberOfPosts = (int)( wp_count_posts()->publish );
            $offSetNumberPosts = $numberOfPosts - 3;

            $args = array( 'numberposts' => 3, 'offset' => $offSetNumberPosts, 'orderby' => 'post_date', 'order' => 'ASC' );
            $postsToDisplay = get_posts($args);

            foreach ( $postsToDisplay as $post ) : setup_postdata( $post );
                ?>      
                <div class="col-sma-6 col-lar-4">
                    <div class="blog-post">
                         <div class="blog__image"><a href="blog#<?php the_title(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a> <div class="clear-both"></div></div>
                        <h4 class="blog-post__title"><a href="blog#<?php the_title(); ?>" class="blog-post__title__link"><?php the_title(); ?></a></h4>
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
                        <div class="blog__content"><?php the_excerpt(); ?><a href="blog#<?php the_title(); ?>"><span class="blog__read-more">Read more &#10132;</span></a></div>
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
                             
<?php 
get_footer();
?>

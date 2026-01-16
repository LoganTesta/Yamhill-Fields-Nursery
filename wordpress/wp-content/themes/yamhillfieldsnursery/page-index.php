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
                        <button class="slideshow__icon__button">&#10094;</button>
                    </div>
                    <div class="slideshow__icon right">
                        <button class="slideshow__icon__button">&#10095;</button>
                    </div>
                    <div class="slideshow__buttons">
                        <button id="pausePlayButton" class="pause-play-button slideshow__slide-button" aria-label="pausePlayButton">
                            <span class="play-button"></span>
                            <span class="pause-button-left"></span>
                            <span class="pause-button-right"></span>
                        </button>
                        <button id="slideButton0" class="slideshow__slide-button" aria-label="slideButton0">
                            <span class="slideshow__button-text"></span>
                        </button>
                        <button id="slideButton1" class="slideshow__slide-button" aria-label="slideButton1">
                            <span class="slideshow__button-text"></span>
                        </button>
                        <button id="slideButton2" class="slideshow__slide-button" aria-label="slideButton2">
                            <span class="slideshow__button-text"></span>
                        </button>
                        <button id="slideButton3" class="slideshow__slide-button" aria-label="slideButton3">
                            <span class="slideshow__button-text"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sma-5">
                <h2>The Best Nursery in Yamhill County</h2>
                <?php the_content(); ?>
                <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>')"></div>    
            </div>
        </div>
        <div class="content-row">
            <div class="col-sma-1">&nbsp;</div>
            <div class="col-sma-5">
                <div class="index-product zero">
                    <div class="index-product__name"><a href="plants" class="index-product__name-link">Saplings for the yard</a></div>
                    <div class="index-product__image">
                        <a href="plants" class="index-product__image-link">
                            <div class="index-product__background-layer">
                                <span class="hidden-sr-only">Plants</span>
                            </div>    
                        </a>
                    </div>
                    <div class="index-product__description">We sell deciduous and evergreens.  Grown here in the nursery!</div>
                    <div class="clear-both"></div>
                </div>
            </div>
            <div class="col-sma-5">
                <div class="index-product one">
                    <div class="index-product__name"><a href="supplies" class="index-product__name-link">Watering cans and more</a></div>
                    <div class="index-product__image">
                        <a href="supplies" class="index-product__image-link">
                            <div class="index-product__background-layer">
                                <span class="hidden-sr-only">Supplies</span>
                            </div>
                        </a>
                    </div>
                    <div class="index-product__description">We are here for your gardening supplies.  Give us a call or drop on in.</div>
                    <div class="clear-both"></div>
                </div>
            </div>
            <div class="col-sma-1">&nbsp;</div>
        </div>	
        <div class="content-row index-blog-posts">
            <?php
            global $post;
            $numberOfPosts = (int)( wp_count_posts()->publish );
            $offSetNumberPosts = $numberOfPosts - 3;

            $args = array( 'numberposts' => 3, 'offset' => $offSetNumberPosts, 'orderby' => 'post_date', 'order' => 'ASC' );
            $postsToDisplay = get_posts($args);

            foreach ( $postsToDisplay as $post ) : setup_postdata( $post );
                $postNameInitial = str_replace( " ", "", get_the_title() );
                $minusFirstChar = substr( $postNameInitial, 1 );
                $firstChar = strtolower(substr($postNameInitial, 0, 1));
                $postName = $firstChar . $minusFirstChar;
                ?>      
                <div class="col-sma-6 col-lar-4 blog-post">
                    <div class="">     
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="blog__image-container">
                                <a class="blog__image-link" href="<?php the_permalink(); ?>">
                                    <div class="blog__image" style="background: url('<?php echo esc_url( the_post_thumbnail_url( 'medium' ) ); ?>') 50% 50%/cover no-repeat"></div>
                                    <span class="hide-element"><?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?></span>
                                </a>
                            </div>
                        <?php } ?>
                        <h3 class="blog-post__title"><a href="<?php the_permalink(); ?>" class="blog-post__title__link"><?php the_title(); ?></a></h3>
                        <?php
                        $categories = get_the_category();
                        $numberOfCategories = 0;
                        if ( !empty ( $categories ) ) { ?>
                            <div class="blog__categories">
                                <?php foreach ( $categories as $category ) {
                                    $numberOfCategories++;
                                }
                                $i = 0;
                                foreach ( $categories as $category ) {
                                    $result = "";
                                    if ( $i < $numberOfCategories - 1 ) {
                                        $result .= "<a class='blog__categories__link' href='" . get_category_link( $category ) . "'>" . $category->name . "</a>, ";
                                    } else {
                                        $result .= "<a class='blog__categories__link' href='" . get_category_link( $category ) . "'>" . $category->name . "</a>";
                                    }
                                    echo $result;
                                    $i++;
                                } ?>
                            </div>
                        <?php } ?>
                        <div class="blog__date"><?php the_date(); ?></div>
                        <div class="blog__content"><?php the_excerpt(); ?><a href="blog#<?php echo $postName ?>"><span class="blog__read-more">More posts &#10132;</span></a></div>
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
                    <h3 class="content__subheader">You could be here looking at plants!</h3>
                    <div class="subfooter-container__background content__content-image"></div>
                </div>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

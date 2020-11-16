<?php

/*Description: the customized index page layout for this site. */
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-5">
                <?php while( have_posts() ) : 
                the_post();
                wc_get_template_part( 'content', 'single-product' );
                endwhile ?>
            </div>
            <div class="col-sma-7">
                <div class="content-background-container">
                    <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                </div>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

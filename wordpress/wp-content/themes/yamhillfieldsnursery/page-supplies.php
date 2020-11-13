<?php
/*Template Name: Supplies page custom template
 Description: the customized index page layout for this site. */
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-12">
                <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
            <?php the_content(); ?>
            </div>
        </div>
        <div class="content-row">
            <div class="col-sma-12">
                <?php echo do_shortcode( '[yfn_woocommerce_products_supplies]' ); ?>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>






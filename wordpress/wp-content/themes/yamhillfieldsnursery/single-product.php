<?php

/*Description: the customized index page layout for this site. */
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-12">
                <?php while( have_posts() ) : 
                the_post();
                wc_get_template_part( 'content', 'single-product' );
                endwhile ?>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

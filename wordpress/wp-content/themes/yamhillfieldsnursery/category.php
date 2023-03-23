<?php

get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-12">
            <?php if ( have_posts() ) { ?>
                <h2 class="">Category: <?php echo single_cat_title(); ?></h2>
            <?php } ?>
            <?php while ( have_posts() ) : the_post(); //A while loop is necessary to call the_content(). ?>
                <div class="category-blog-post">
                    <div class="content-background-container general-layout">
                        <div class="content__content-image <?php if ( esc_url( trim( get_the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            <?php 
            endwhile;
            wp_reset_query(); //Reset the page query ?>
            </div>
        </div>
    </div>
</div>   

<?php 
get_footer();
?>
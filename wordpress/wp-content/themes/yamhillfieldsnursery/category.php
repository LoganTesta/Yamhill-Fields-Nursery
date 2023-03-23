<?php

get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <?php while ( have_posts() ) : the_post(); //A while loop is necessary to call the_content(). ?>
                <div class="col-sma-12 category-section">
                    <div class="content-background-container general-layout">
                        <div class="content__content-image <?php if ( esc_url( trim( get_the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                    </div>
                    <h2><?php single_post_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            <?php 
            endwhile;
            wp_reset_query(); //Reset the page query ?>
            
        </div>
    </div>
</div>   

<?php 
get_footer();
?>
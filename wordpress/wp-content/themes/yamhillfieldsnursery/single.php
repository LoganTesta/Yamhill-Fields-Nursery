<?php

/*Description: Blog post page custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-12">
                <div class="breadcrumbs"><a class="breadcrumbs__link" href="<?php echo get_site_url(); ?>/blog">View all blog posts</a></div>
                <div class="blog-post__image-container">
                    <div class="blog-post__image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                </div>
                <h3 class="blog-post__title"><?php the_title(); ?></h3>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

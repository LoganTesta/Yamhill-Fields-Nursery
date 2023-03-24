<?php

/*Description: Blog post page custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-12">
                <div class="content-background-container">
                    <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                </div>
                <div class="blog-page-breadcrumbs"><a class="blog-page-breadcrumbs__link" href="<?php echo get_site_url(); ?>/blog">View all blog posts</a></div>    
                <h3 class="blog-post__title"><?php the_title(); ?></h3>
                <div class="blog__date"><?php echo get_the_date(); ?></div>
                <div class="blog__categories"><?php
                    $categories = get_the_category();
                    $h = 0;
                    foreach ( $categories as $category ) {
                        $h++;
                    }
                    $h = $h - 1;
                    $i = 0;
                    foreach ( $categories as $category ) {
                        $result = "";
                        if ( $i < $h ) {
                            $result .= "<a href='" . get_category_link( $category ) . "'>" . $category->name . "</a>, ";
                        } else {
                            $result .= "<a href='" . get_category_link( $category ) . "'>" . $category->name . "</a>";
                        }
                        echo $result;
                        $i++;
                    }
                    ?>
                </div>
         
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

<?php

/*Description: Blog post page custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content blog-post-content">
        <div class="content-row">
            <div class="col-sma-12">
                <h2 class="blog-post__title"><?php the_title(); ?></h2>
                <div class="breadcrumbs">
                    <div class="breadcrumbs__breadcrumb">
                        <a class="breadcrumbs__breadcrumb__link" href="<?php echo get_site_url(); ?>/blog">Blog</a>
                    </div>
                    <div class="breadcrumbs__breadcrumb">
                        <div class="breadcrumbs__breadcrumb__content">/</div>
                    </div>
                    <div class="breadcrumbs__breadcrumb">
                         <div class="breadcrumbs__breadcrumb__content"><?php the_title(); ?></div>
                    </div>
                </div> 
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
                            $result .= "<a class='blog__categories__link' href='" . get_category_link( $category ) . "'>" . $category->name . "</a>, ";
                        } else {
                            $result .= "<a class='blog__categories__link' href='" . get_category_link( $category ) . "'>" . $category->name . "</a>";
                        }
                        echo $result;
                        $i++;
                    }
                    ?>
                </div>
                <div class="blog__tags"><?php
                    $tags = get_the_tags();
                    $h = 0;
                    foreach ( $tags as $tag ) {
                        $h++;
                    }
                    $h = $h - 1;
                    $i = 0;
                    foreach ( $tags as $tag ) {
                        $result = "";
                        if ( $i < $h ) {
                            $result .= "<a class='blog__tag__link' href='" . get_tag_link( $tag ) . "'>#" . str_replace( " ", "-", $tag->name ) . "</a>, ";
                        } else {
                            $result .= "<a class='blog__tag__link' href='" . get_tag_link( $tag ) . "'>#" . str_replace( " ", "-", $tag->name ) . "</a>";
                        }
                        echo $result;
                        $i++;
                    }
                    ?>
                </div>
                <div class="content-background-container">
                    <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                </div>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

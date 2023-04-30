<?php

/*Description: Blog post page custom template*/
get_header(); 

$categories = get_the_category();
$numberOfCategories = 0;

if ( !empty ( $categories ) ) {
    foreach ( $categories as $category ) {
        $numberOfCategories++;
    }
}

$tags = get_the_tags();
$numberOfTags = 0;

if ( !empty( $tags ) ) {
    foreach ( $tags as $tag ) {
        $numberOfTags++;
    }
}

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
                <?php
                if ( !empty ( $categories ) ) { ?>
                    <div class="blog__categories">
                        <?php 
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
                <?php
                if ( !empty( $tags ) ) { ?>
                    <div class="blog__tags">
                        <?php
                        $i = 0;
                        foreach ( $tags as $tag ) {
                            $result = "";
                            if ( $i < $numberOfTags - 1 ) {
                                $result .= "<a class='blog__tag__link' href='" . get_tag_link( $tag ) . "'>#" . str_replace( " ", "-", $tag->name ) . "</a>, ";
                            } else {
                                $result .= "<a class='blog__tag__link' href='" . get_tag_link( $tag ) . "'>#" . str_replace( " ", "-", $tag->name ) . "</a>";
                            }
                            echo $result;
                            $i++;
                        } ?>
                    </div>
                <?php } ?>
                <?php if ( esc_url( get_the_post_thumbnail_url() ) !== "" ) { ?>
                    <div class="content-background-container">
                        <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                    </div>
                <?php } ?>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="content-row single-blog-post-content">
            <?php
            $currentPostId = get_the_ID();
            global $post;
            $numberOfPosts = (int)( wp_count_posts()->publish );
            $offSetNumberPosts = $numberOfPosts - 3;
            $randomNumberFromCategories = rand( 0, $numberOfCategories - 1 );
            $categoryIdSelected = "" . $categories[$randomNumberFromCategories]->term_id;
            $categoryNameSelected = "" . $categories[$randomNumberFromCategories]->name;
            $categorySlugSelected = "" . $categories[$randomNumberFromCategories]->slug;

            $args = array( 'numberposts' => 3, 'category' => $categoryIdSelected, 'exclude' => $currentPostId, 'orderby' => 'post_date', 'order' => 'DESC' );
            $postsToDisplay = get_posts( $args );
            $alreadyShownPostIds = "";
            ?>
            
            <div class="content-row">
                <h3 class="content__subheader">More in "<?php echo $categoryNameSelected; ?>", plus a random post</h3>
            </div>
            
            <?php foreach ( $postsToDisplay as $post ) : setup_postdata( $post ); ?>      
            <?php 
            $alreadyShownPostIds .= get_the_ID() . ", ";
            ?>              
                <div class="col-sma-6 col-lar-3">
                    <div class="blog-post">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="blog__image-container">
                                <a class="blog__image-link" href="<?php the_permalink(); ?>">
                                    <div class="blog__image" style="background: url('<?php echo esc_url( the_post_thumbnail_url( 'medium' ) ); ?>') 50% 50%/cover no-repeat"></div>
                                </a>
                            </div>
                        <?php } ?>
                        <h3 class="blog-post__title"><a href="<?php the_permalink(); ?>" class="blog-post__title__link"><?php the_title(); ?></a></h3>
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
                        <div class="blog__date"><?php the_date(); ?></div>
                        <div class="blog__content"><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>"><span class="blog__read-more">Read more &#10132;</span></a></div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            <?php endforeach; ?>
            
            
            <?php 
            $alreadyShownPostIds .= $currentPostId;
            $argsPostsNotShownYet = array( 'exclude' => $alreadyShownPostIds, 'orderby' => 'post_date', 'order' => 'DESC' );
            $postsNotShownYet = get_posts( $argsPostsNotShownYet ); 
        
            $numberOfPostsNotShownYet = count( $postsNotShownYet );
            $postToShowNumber =  rand( 0, $numberOfPostsNotShownYet - 1 );
            $postsToShow = $postsNotShownYet[$postToShowNumber]->ID;
            $argsPostsToDisplayRandom = array( 'numberposts' => 1, 'include' => $postsToShow, 'orderby' => 'post_date', 'order' => 'DESC' );
            $postsToDisplayRandom = get_posts( $argsPostsToDisplayRandom );
            ?>

            <?php foreach ( $postsToDisplayRandom as $post ) : setup_postdata( $post ); ?>      
                <div class="col-sma-6 col-lar-3">
                    <div class="blog-post">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="blog__image-container">
                                <a class="blog__image-link" href="<?php the_permalink(); ?>">
                                    <div class="blog__image" style="background: url('<?php echo esc_url( the_post_thumbnail_url( 'medium' ) ); ?>') 50% 50%/cover no-repeat"></div>
                                </a>
                            </div>
                        <?php } ?>
                        <h3 class="blog-post__title"><a href="<?php the_permalink(); ?>" class="blog-post__title__link"><?php the_title(); ?></a></h3>
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
                        <div class="blog__date"><?php the_date(); ?></div>
                        <div class="blog__content"><?php the_excerpt(); ?><a href="<?php the_permalink(); ?>"><span class="blog__read-more">Read more &#10132;</span></a></div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            <?php endforeach; ?>
         </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

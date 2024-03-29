<?php

//The default page template and layout.
get_header(); 
?>


<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <?php
                //The general page layout.
                if ( is_home() === false ){ ?>
                    <?php while ( have_posts() ) : the_post(); //A while loop is necessary to call the_content(). ?>
                        <div class="col-sma-12">
                            <div class="content-background-container general-layout">
                                <div class="content__content-image <?php if ( esc_url( trim( get_the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                            </div>
                            <h2><?php single_post_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    <?php 
                    endwhile;
                    wp_reset_query(); //Reset the page query ?>
                <?php } else {  
                    //For the posts (blog) page.
                    ?>
                    <div class="col-lar-9 blog-col-left">
                        <h2><?php single_post_title(); ?></h2> 
                        <div class="breadcrumbs">
                            <div class="breadcrumbs__breadcrumb">
                                <div class="breadcrumbs__breadcrumb__content">Blog</div>
                            </div>
                        </div> 
                        <div class="blog-posts" id="blogPosts">
                            <?php
                            global $post;
                            $args = array( 'posts_per_page' => 1000 );
                            $postsToDisplay = get_posts( $args );
                            foreach ( $postsToDisplay as $post ) : setup_postdata( $post );
                                ?>                                                       
                                <div class="blog-post <?php if ( has_post_thumbnail() ) { echo "has-image"; } ?>" id="<?php the_title(); ?>">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="blog__image-container">
                                            <a class="blog__image-link" href="<?php the_permalink(); ?>">
                                                <div class="blog__image" style="background: url('<?php echo esc_url( the_post_thumbnail_url( 'medium' ) ); ?>') 50% 50%/cover no-repeat"></div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="blog__content-wrapper">
                                        <h3 class="blog-post__title"><a class="blog-post__title__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
                                        <div class="blog__content"><?php the_excerpt(); ?></div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>               
                    </div>
                    <div class="col-lar-3 blog-col-right">
                        <h3>Visit us at</h3>
                        <p>45202 Oak Highway, Dundee, OR 97115</p>
                        <p>Open Mon-Sat 9:00 am-9:00 pm, closed Sunday.</p>
                        <div class="blog-col-right__bg-img"></div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>                         
        
<?php 
get_footer();
?>
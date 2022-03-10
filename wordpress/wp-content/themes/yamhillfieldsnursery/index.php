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
                                <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                            </div>
                            <?php the_content(); ?>
                        </div>
                    <?php 
                    endwhile;
                    wp_reset_query(); //Reset the page query ?>
                <?php } else {  
                    //For the posts (blog) page.
                    ?>
                    <div class="col-sma-9">
                        <h3>Our Blog</h3>                 
                        <div class="blog-posts" id="blogPosts">
                            <?php
                            global $post;
                            $args = array( 'posts_per_page' => 1000 );
                            $postsToDisplay = get_posts( $args );
                            foreach ( $postsToDisplay as $post ) : setup_postdata( $post );
                                ?>                                                       
                                <div class="blog-post" id="<?php the_title(); ?>">
                                    <?php if ( has_post_thumbnail() ) { ?><div class="blog__image"><?php the_post_thumbnail( 'medium' ); ?></div><?php } ?>
                                    <h4 class="blog-post__title"><a class="blog-post__title__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
                                                $result .= $category->name . ", ";
                                            } else {
                                                $result .= $category->name;
                                            }
                                            echo $result;
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                    <div class="blog__date"><?php the_date(); ?></div>
                                    <div class="blog__content"><?php the_excerpt(); ?></div>
                                    <div class="clear-both"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>               
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
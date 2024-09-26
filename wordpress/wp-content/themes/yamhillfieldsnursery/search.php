<?php


get_header(); 
?>


<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">    
            <div class="col-sma-12 search-results">
                <h2 class="search-results__header">Showing <?php echo $wp_query->found_posts; ?> result<?php if ( $wp_query->found_posts !== 1 ) { echo "s"; } ?> for 
                    <span class="search-query-text">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h2>                              
                <div class="blog-posts" id="blogPosts">
                    <?php 
                    while ( have_posts() ) { 
                        the_post(); 
                        
                        $titlePrefix = "";
                        if ( get_post_type() === "post" ) {
                            $titlePrefix = "<span class='blog-post__title__prefix'>(Post)</span> ";
                        } else if ( get_post_type() === "page" ) {
                            $titlePrefix = "<span class='blog-post__title__prefix'>(Page)</span> ";
                        } else if ( get_post_type() === "product" ) {
                            $titlePrefix = "<span class='blog-post__title__prefix'>(Product)</span> ";
                        } else if ( get_post_type() === "general-testimonials" ) {
                            $titlePrefix = "<span class='blog-post__title__prefix'>(Testimonial)</span> ";
                        }
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
                                <h3 class="blog-post__title"><a class="blog-post__title__link" href="<?php the_permalink(); ?>"><?php echo $titlePrefix; ?><?php the_title(); ?></a></h3>
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
                    <?php } ?>
                </div>  
            </div>
        </div>
    </div>
</div>                         
        
<?php 
get_footer();
?>
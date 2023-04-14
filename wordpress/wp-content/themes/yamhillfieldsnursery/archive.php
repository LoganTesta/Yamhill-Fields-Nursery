<?php

//The default page template and layout.
get_header(); 
?>


<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">    
            <div class="col-lar-9 blog-col-left">
                <h2 class="">Showing all posts for <em><?php echo strip_tags( get_the_archive_title() ); ?></em></h2>
                <div class="blog-posts" id="blogPosts">
                    <?php
                    while( have_posts() ) { 
                        the_post(); 
                        ?>                                                       
                        <div class="blog-post" id="<?php the_title(); ?>">
                            <?php if ( has_post_thumbnail() ) { ?><div class="blog__image" style="background: url('<?php echo esc_url( the_post_thumbnail_url( 'medium' ) ); ?>') 50% 50%/cover no-repeat">
                                <a class="blog__image-link" href="<?php the_permalink(); ?>"></a>
                            </div><?php } ?>
                            <div class="blog__content-wrapper">
                                <h3 class="blog-post__title"><a class="blog-post__title__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
                                <div class="blog__date"><?php the_date(); ?></div>
                                <div class="blog__content"><?php the_excerpt(); ?></div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    <?php } ?>
                </div>               
            </div>
            <div class="col-lar-3 blog-col-right">
                <h3>Visit us at</h3>
                <p>45202 Oak Highway, Dundee, OR 97115</p>
                <p>Open Mon-Sat 9:00 am-9:00 pm, closed Sunday.</p>
                <div class="blog-col-right__bg-img"></div>
            </div>
        </div>
    </div>
</div>                         
        
<?php 
get_footer();
?>
<?php

/*Description: All Categories page custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-12">
                <div class="categories-list">
                    <h2><?php single_post_title(); ?></h2>
                    <?php the_content(); ?>
                    <?php
                        $allCategories = get_categories();
                        $result = "";
                        foreach($allCategories as $category){
                            $result .= "<div class='categories-list__category'><a href='" . get_category_link( $category->term_id ) . "' >" . $category->name . "</a></div>";
                        }
                        echo $result;
                    ?>
                </div>
            </div>
            <div class="col-sma-12 col-lar-6">
                <div class="content-background-container">
                    <div class="content__content-image <?php if ( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>') 50% 50%/cover no-repeat;"></div>    
                </div>
            </div>
        </div>

    </div>
</div>
                             
<?php 
get_footer();
?>

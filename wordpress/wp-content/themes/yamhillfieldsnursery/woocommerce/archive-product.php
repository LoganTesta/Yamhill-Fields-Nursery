<?php

/*Description: Archive pages custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <?php

        global $wp;
        $currentUrl = home_url( $wp->request );

        $productCat = basename( $currentUrl );  
       
        echo do_shortcode( '[yfn_woocommerce_products_products category="' . $productCat . '"]' ); 
        
        ?>
    </div>
</div>
                             
<?php 
get_footer();
?>

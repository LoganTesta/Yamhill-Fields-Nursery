<?php

/*Description: Archive pages custom template*/
get_header(); 

global $wp;
$currentUrl = home_url( $wp->request );

$productCat = basename( $currentUrl );  
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="woocommerce-product-page-header">
                <h2>Category: <?php echo str_replace( "-", " ", $productCat ); ?></h2>
            </div>
            
            <?php


            if ( $productCat === "shop" ){
                $productCat = "";
            }

            echo do_shortcode( '[yfn_woocommerce_products_products category="' . $productCat . '"]' ); 

            ?>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>

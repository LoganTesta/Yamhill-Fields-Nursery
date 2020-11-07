<?php

/*Prevent non-logged in users from accessing the site's user and post data using the WordPress REST API.*/
add_filter( 'rest_authentication_errors', function( $result ) {
   if ( !empty( $result ) ) {
       return $result;
   } 
   if( !is_user_logged_in() ) {
       return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );    
   }
   return $result;
});


add_theme_support( "post-thumbnails" ); //Allow image thumbnails in pages and posts.
//Allow cropping for medium thumbnail images.
if(false === get_option( "medium_crop" )) {
    add_option( "medium_crop", "1" );
} else {
    update_option( "medium_crop", "1" );
}



function yfn_woocommerce_products_plants_layout() {   
    $args = array(
        'post_type' => 'product',
        'product_cat' => 'plants',
    );
    $products = new WP_Query( $args );
    
    while( $products->have_posts() ) : $products->the_post(); global $product;  
        echo '<div class="item col-sma-4">';
            echo '<h4 class="item__title">' . get_the_title() . '</h4>';
            echo '<div class="item__background-image" style="background: url(' . get_the_post_thumbnail_url() . ') 0% 0%/cover no-repeat"></div>';
            echo '<div class="item__zoom-in-container-close">X</div>';
            echo '<div class="item__zoom-in-container">';
                echo '<div class="item__zoom-in" style="background: url('. get_the_post_thumbnail_url() . ') 91px 73px/cover no-repeat"></div>';
            echo '</div>';
            echo '<div class="item__inspect-background"></div>';
            echo '<div class="item__notes">' . get_the_excerpt() . '</div>';
            echo '<div class="item__description">' . get_the_content() . '</div>';
            echo '<div class="item__price">$' . $product->get_price() . '<a class="item__add-to-cart" href="?add-to-cart=' . $product->id . '">Add to Cart</a></div>';
        echo '</div>';       
    endwhile;
}
add_shortcode( 'yfn_woocommerce_products_plants', 'yfn_woocommerce_products_plants_layout' );


function yfn_woocommerce_products_supplies_layout() {
    $args = array(
        'post_type' => 'product',
        'product_cat' => 'supplies',
    );
    $products = new WP_Query( $args );
    
    while( $products->have_posts() ) : $products->the_post(); global $product;  
        echo '<div class="item col-sma-4">';
            echo '<h4 class="item__title">' . get_the_title() . '</h4>';
            echo '<div class="item__background-image" style="background: url(' . get_the_post_thumbnail_url() . ') 0% 0%/cover no-repeat"></div>';
            echo '<div class="item__zoom-in-container-close">X</div>';
            echo '<div class="item__zoom-in-container">';
                echo '<div class="item__zoom-in" style="background: url('. get_the_post_thumbnail_url() . ') 91px 73px/cover no-repeat"></div>';
            echo '</div>';
            echo '<div class="item__inspect-background"></div>';
            echo '<div class="item__notes">' . get_the_excerpt() . '</div>';
            echo '<div class="item__description">' . get_the_content() . '</div>';
            echo '<div class="item__price">$' . $product->get_price() . '<a class="item__add-to-cart" href="?add-to-cart=' . $product->id . '">Add to Cart</a></div>';
        echo '</div>';       
    endwhile;
}
add_shortcode( 'yfn_woocommerce_products_supplies', 'yfn_woocommerce_products_supplies_layout' );



function yfm_update_cart(){
    global $woocommerce;
    ob_start();
    ?>
    <a class="woocommerce-cart-total" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( "See shopping cart", "woothemes" ); ?>"><?php echo sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.woocommerce-cart-total'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'yfm_update_cart' );

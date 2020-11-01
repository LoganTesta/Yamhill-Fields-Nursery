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


function yfn_woocommerce_customizations() {
    echo '<div class="plant__notes">' . get_the_excerpt() . '</div>';
    echo '<div class="plant__description">' . get_the_content() . '</div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'yfn_woocommerce_customizations' );

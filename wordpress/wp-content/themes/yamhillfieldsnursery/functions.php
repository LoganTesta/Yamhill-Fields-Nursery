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



//Theme setup and support.
if ( function_exists( 'yamhill_fields_nursery_setup' ) === false ) {
    function yamhill_fields_nursery_setup() {
        add_theme_support( "post-thumbnails" ); //Allow image thumbnails in pages and posts.
        add_theme_support( "post-formats", array( 'aside', 'gallery', 'quote', 'image', 'video' ) ); //Let user customize the post format.  
        add_theme_support( "custom-logo", array ( 'width' => 200, 'height' => 200 ) );   //Let user upload the logo.
        add_theme_support( "custom-background" );
        add_theme_support( "custom-header" );
        add_theme_support( "title-tag" );
        add_theme_support( "automatic-feed-links" ); //Add default post and comment RSS links to head.
      
        add_theme_support( "align-wide" ); // Add support for wide and full width aligned images in pages, etc. (Gutenberg only).

        add_theme_support( "woocommerce" );
        
        //Allow cropping for medium thumbnail images.
        if ( false === get_option( "medium_crop" ) ) {
            add_option( "medium_crop", "1" );
        } else {
            update_option( "medium_crop", "1" );
        }
        
        //Add support for additional nav menus.
        register_nav_menus(
            array(
                'main-nav' => __( 'Main Nav', 'yamhill-fields-nursery' ),
            )
        );
        
        //Enable theme translation.
        load_theme_textdomain( 'yamhill-fields-nursery', get_template_directory() . '/languages' );
        add_theme_support( 'editor-styles' ); //Enable theme support for styling posts.
        add_editor_style( 'assets/css/editor-styles.css' );
              
        if ( ! isset( $content_width ) ){
            $content_width = 1920;            
        };
    }
}
add_action( 'after_setup_theme', 'yamhill_fields_nursery_setup' );


add_action( 'admin_enqueue_scripts', function() { 
    wp_enqueue_style( 'admin-styles', "" . get_template_directory_uri() . '/assets/css/admin-styles.css?mod=11092020' );   
});

add_action( 'wp_enqueue_scripts', function() {   
    wp_register_script( 'html5-shiv', get_template_directory_uri() . '/assets/javascript/html5shiv.js.js' );
    wp_enqueue_script( 'html5-shiv', get_template_directory_uri() . '/assets/javascript/html5shiv.js.js' ); 
    wp_script_add_data( 'html5-shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_style( 'font-awesome', "" . get_template_directory_uri() . '/assets/css/font-awesome/css/all.css' );
    
    if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }
 
    wp_register_script( 'javascript-functions', get_template_directory_uri() . '/assets/javascript/javascript-functions.js' );
    wp_enqueue_script( 'javascript-functions', get_template_directory_uri() . '/assets/javascript/javascript-functions.js' );  
    wp_enqueue_style( 'styles', "" . get_template_directory_uri() . '/assets/css/main-styles.css?mod=11122020' );
    wp_enqueue_style( 'print-styles', "" . get_template_directory_uri() . '/assets/css/print-styles.css?mod=11092020' );
   
    wp_register_script( 'item-hover-over-zoom-in', get_template_directory_uri() . '/assets/javascript/item-hover-over-zoom-in.js' );
    wp_enqueue_script( 'item-hover-over-zoom-in', get_template_directory_uri() . '/assets/javascript/item-hover-over-zoom-in.js' );
    
    if ( is_page( 'index' ) ) {
        wp_register_script( 'index-slideshow', get_template_directory_uri() . '/assets/javascript/index-slideshow.js' );
        wp_enqueue_script( 'index-slideshow', get_template_directory_uri() . '/assets/javascript/index-slideshow.js' );
    }
});




function yfn_woocommerce_products_plants_layout() {   
    $itemContainer = "";
    $args = array(
        'post_type' => 'product',
        'product_cat' => 'plants',
    );
    $products = new WP_Query( $args );
    
    $itemContainer .= '<div class="content-row">';
    while( $products->have_posts() ) : $products->the_post(); global $product;  
        $itemContainer .= '<div class="item col-sma-4">';
            $itemContainer .= '<h4 class="item__title">' . get_the_title() . '</h4>';
            $itemContainer .= '<div class="item__background-image" style="background: url(' . get_the_post_thumbnail_url() . ') 0% 0%/cover no-repeat"></div>';
            $itemContainer .= '<div class="item__zoom-in-container-close">X</div>';
            $itemContainer .= '<div class="item__zoom-in-container">';
                $itemContainer .= '<div class="item__zoom-in" style="background: url('. get_the_post_thumbnail_url() . ') 91px 73px/cover no-repeat"></div>';
            $itemContainer .= '</div>';
            $itemContainer .= '<div class="item__inspect-background"></div>';
            $itemContainer .= '<div class="item__notes">' . get_the_excerpt() . '</div>';
            $itemContainer .= '<div class="item__description">' . get_the_content() . '</div>';
            $itemContainer .= '<div class="item__price">$' . $product->get_price() . 
                    '<a class="item__add-to-cart ajax_add_to_cart add_to_cart_button" href="' . $product->add_to_cart_url() . '" value="' . esc_attr( $product->get_id() ) . '" data-product_id="' . get_the_ID() . '" data-product_sku="' . esc_attr( $sku ) . '" aria-label="Add ' . the_title_attribute( 'echo=0' ) . ' to cart.">Add to Cart</a>';
            $itemContainer .= '</div>';
        $itemContainer .= '</div>';       
    endwhile;
    $itemContainer .= '</div>'; 
    return $itemContainer;
}
add_shortcode( 'yfn_woocommerce_products_plants', 'yfn_woocommerce_products_plants_layout' );


function yfn_woocommerce_products_supplies_layout() {
    $itemContainer = "";
    $args = array(
        'post_type' => 'product',
        'product_cat' => 'supplies',
    );
    $products = new WP_Query( $args );
    
    $itemContainer .= '<div class="content-row">';
    while( $products->have_posts() ) : $products->the_post(); global $product;  
        $itemContainer .= '<div class="item col-sma-4">';
            $itemContainer .= '<h4 class="item__title">' . get_the_title() . '</h4>';
            $itemContainer .= '<div class="item__background-image" style="background: url(' . get_the_post_thumbnail_url() . ') 0% 0%/cover no-repeat"></div>';
            $itemContainer .= '<div class="item__zoom-in-container-close">X</div>';
            $itemContainer .= '<div class="item__zoom-in-container">';
                $itemContainer .= '<div class="item__zoom-in" style="background: url('. get_the_post_thumbnail_url() . ') 91px 73px/cover no-repeat"></div>';
            $itemContainer .= '</div>';
            $itemContainer .= '<div class="item__inspect-background"></div>';
            $itemContainer .= '<div class="item__notes">' . get_the_excerpt() . '</div>';
            $itemContainer .= '<div class="item__description">' . get_the_content() . '</div>';
            $itemContainer .= '<div class="item__price">$' . $product->get_price() . 
                    '<a class="item__add-to-cart ajax_add_to_cart add_to_cart_button" href="' . $product->add_to_cart_url() . '" value="' . esc_attr( $product->get_id() ) . '" data-product_id="' . get_the_ID() . '" data-product_sku="' . esc_attr( $sku ) . '" aria-label="Add ' . the_title_attribute( 'echo=0' ) . ' to cart.">Add to Cart</a>';
            $itemContainer .= '</div>';
        $itemContainer .= '</div>';      
    endwhile;
    $itemContainer .= '</div>'; 
    return $itemContainer;
}
add_shortcode( 'yfn_woocommerce_products_supplies', 'yfn_woocommerce_products_supplies_layout' );



function yfm_update_cart(){
    global $woocommerce;
    ob_start();
    ?>
    <a class="woocommerce-cart-total" href="/cart" title="<?php _e( "See shopping cart", "woothemes" ); ?>"><?php echo sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.woocommerce-cart-total'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'yfm_update_cart' );
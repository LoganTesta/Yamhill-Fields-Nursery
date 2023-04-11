<?php

/*Prevent non-logged in users from accessing the site's user and post data using the WordPress REST API.*/
//add_filter( 'rest_authentication_errors', function( $result ) {
//   if ( !empty( $result ) ) {
//       return $result;
//   } 
//   if( !is_user_logged_in() ) {
//       return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );    
//   }
//   return $result;
//});



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
    wp_enqueue_style( 'styles', "" . get_template_directory_uri() . '/assets/css/main-styles.css?mod=04102023' );
    wp_enqueue_style( 'print-styles', "" . get_template_directory_uri() . '/assets/css/print-styles.css?mod=04102023' );
   
    wp_register_script( 'item-hover-over-zoom-in', get_template_directory_uri() . '/assets/javascript/item-hover-over-zoom-in.js' );
    wp_enqueue_script( 'item-hover-over-zoom-in', get_template_directory_uri() . '/assets/javascript/item-hover-over-zoom-in.js' );
    
    if ( is_page( 'index' ) ) {
        wp_register_script( 'index-slideshow', get_template_directory_uri() . '/assets/javascript/index-slideshow.js' );
        wp_enqueue_script( 'index-slideshow', get_template_directory_uri() . '/assets/javascript/index-slideshow.js' );
    }
});


function yfn_handle_archive_pages(){
    if ( is_archive( ) && is_category() === false ) {
        wp_safe_redirect( 'blog' );
        exit;
    }
}
add_action( 'template_redirect', 'yfn_handle_archive_pages' );


function yfn_woocommerce_products_products_layout( $info ) {   
    
    $extractedInfo = shortcode_atts( array( 'category' => ''), $info );
     
    $productCat = $extractedInfo['category'];
    $orderbyquery = get_query_var( 'orderby' );
    $orderby = get_query_var( 'orderby' );
    $order = 'asc';
    $metakey = '';
    $itemContainer = ""; 

    if ( $orderby === 'date' ) {
        $order = 'desc';
    } else if ( $orderby === 'namedesc' ) {
        $orderby = 'name';
        $order = 'desc';
    } else if ( $orderby === 'rating' ) {
        $orderby = 'meta_value_num';
        $metakey = '_wc_average_rating';
    } else if ( $orderby === 'ratingdesc' ) {
        $orderby = 'meta_value_num';
        $order = 'desc';
        $metakey = '_wc_average_rating';
    } else if ( $orderby === 'price' ) {
        $orderby = 'meta_value_num';
        $metakey = '_price';
    } else if ( $orderby === 'pricedesc' ) {
        $orderby = 'meta_value_num';
        $order = 'price';
        $metakey = '_price';
    }
    
    $args = array(
        'post_type' => 'product',
        'product_cat' => $productCat,
        'meta_key' => $metakey,
        'orderby' => $orderby,
        'order' => $order
    );
    $products = new WP_Query( $args );   
    
    $itemContainer .= '<div class="content-row">';
    
        $itemContainer .= '<form class="woocommerce-ordering custom-form" method="get">';
            $itemContainer .= '<select name="orderby" class="orderby" aria-label="Shop order">';
                $itemContainer .= '<option value="menu_order"'; ?><?php if( $orderbyquery === "menu-order" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Default</option>'; 
                $itemContainer .= '<option value="name"'; ?><?php if( $orderbyquery === "name" ) { $itemContainer .= "selected=selected"; } ?><?php $itemContainer .= '>Name</option>';   
                $itemContainer .= '<option value="namedesc"'; ?><?php if( $orderbyquery === "namedesc" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Name (Reversed)</option>';   
                $itemContainer .= '<option value="date"'; ?><?php if( $orderbyquery === "date" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Newest</option>';  
                $itemContainer .= '<option value="rating"'; ?><?php if( $orderbyquery === "rating" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Rating (Low to High)</option>';  
                $itemContainer .= '<option value="ratingdesc"'; ?><?php if( $orderbyquery === "ratingdesc" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Rating (High to Low)</option>';  
                $itemContainer .= '<option value="price"'; ?><?php if( $orderbyquery === "price" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Price (Low to High)</option>';
                $itemContainer .= '<option value="pricedesc"'; ?><?php if( $orderbyquery === "pricedesc" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Price (High to Low)</option>';
            $itemContainer .= '</select>';     
            $itemContainer .= '<input type="hidden" name="paged" value="1">';   
            $itemContainer .= '<div class="custom-form__sort-results">Showing ' . $products->post_count . ' product'; 
            if ( $products->post_count > 1 ) { $itemContainer .= 's'; }
            $itemContainer .= '.</div>';
        $itemContainer .= '</form>';  
            
        while( $products->have_posts() ) : $products->the_post(); global $product;  
            $itemContainer .= '<div class="item col-sma-4">';
                $itemContainer .= '<div class="item__background-image" style="background: url(' . get_the_post_thumbnail_url() . ') 0% 0%/cover no-repeat"></div>';
                $itemContainer .= '<div class="item__zoom-in-container-close">X</div>';
                $itemContainer .= '<div class="item__zoom-in-container">';
                    $itemContainer .= '<div class="item__zoom-in" style="background: url('. get_the_post_thumbnail_url() . ') 91px 73px/cover no-repeat"></div>';
                $itemContainer .= '</div>';
                $itemContainer .= '<div class="item__inspect-background"></div>';
                $itemContainer .= '<h3 class="item__title"><a class="item__title__link" href="' . get_the_permalink( ) . '">' . get_the_title() . '</a></h3>';
                $itemContainer .= '<div class="item__notes">' . get_the_excerpt() . '</div>';
                $itemContainer .= '<div class="item__description">' . get_the_content() . '</div>';
                if ( $product->get_rating_count() > 0 ) {
                    $itemContainer .= '<div class="item__rating-and-count"><span class="item__rating">' . $product->get_average_rating() . ' / 5</span>' . 
                            '<span class="item__reviews">' . $product->get_rating_count() . ' review';
                    if ( $product->get_rating_count() === 0 || $product->get_rating_count() > 1 ) { $itemContainer .= 's'; }
                    $itemContainer .= '</span></div>';
                }
                $itemContainer .= '<div class="item__price">$' . $product->get_price() . 
                        '<a class="item__add-to-cart ajax_add_to_cart add_to_cart_button" href="' . $product->add_to_cart_url() . '" value="' . esc_attr( $product->get_id() ) . '" data-product_id="' . get_the_ID() . '" data-product_sku="' . esc_attr( $product->get_sku() ) . '" aria-label="Add ' . the_title_attribute( 'echo=0' ) . ' to cart.">Add to Cart</a>';
                $itemContainer .= '</div>';
            $itemContainer .= '</div>';       
        endwhile;
    $itemContainer .= '</div>'; 
    return $itemContainer;
}
add_shortcode( 'yfn_woocommerce_products_products', 'yfn_woocommerce_products_products_layout' );



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



function yfn_woocommerce_product_get_rating_html( $result, $rating, $count ){
    $result = '<div class="star-rating">';
    $result .= wc_get_star_rating_html( $rating, $count );
    $result .= '</div>';
    $result .= '<div class="star-rating__average-and-number"><div class="star-rating__average">' . $rating . '</div><div class="star-rating__number">(' . $count . ' reviews)</div></div>';
         
    return $result;
}
add_filter( 'woocommerce_product_get_rating_html', 'yfn_woocommerce_product_get_rating_html', 10, 3 );



//Enable header cart total to update using AJAX.
function yfn_add_to_cart_fragments( $parts ){
    global $woocommerce;
    $parts['.cart-icon__link'] = '<a class="cart-icon__link" href="cart">' . $woocommerce->cart->cart_contents_count . '</a>';
    return $parts;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'yfn_add_to_cart_fragments' );


//Adjust the page title if it is a category page.
function yfn_change_title ( $pageTitle ) {
    if ( is_category() ) { 
       $pageTitle = "Category: " . $pageTitle;
    }
    return $pageTitle;
}
add_filter( 'document_title', 'yfn_change_title', 10, 1 );


//Adjust the WooCommerce breadcrumb separator.
add_filter( 'woocommerce_breadcrumb_defaults', 'yfn_wcc_change_breadcrumb_delimiter' );
function yfn_wcc_change_breadcrumb_delimiter( $defaults ) {
    $defaults['delimiter'] = '&sol;';
    return $defaults;
}

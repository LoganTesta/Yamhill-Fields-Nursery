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
        $orderbyquery = get_query_var( 'orderby' );
        $orderby = get_query_var( 'orderby' );
        $order = 'asc';
        $metakey = '';
        $itemContainer = ""; 

        if ( $orderby === 'date' ) {
            $order = 'desc';
        } else if ( $orderby === 'name-desc' ) {
            $orderby = 'name';
            $order = 'desc';
        } else if ( $orderby === 'price' ) {
            $orderby = 'meta_value_num';
            $metakey = '_price';
        } else if ( $orderby === 'price-desc' ) {
            $orderby = 'meta_value_num';
            $order = 'price';
            $metakey = '_price';
        }

        $args = array(
            'post_type' => 'product',
            'product_cat' => 'supplies',
            'meta_key' => $metakey,
            'orderby' => $orderby,
            'order' => $order
        );
        $products = new WP_Query( $args );

        $itemContainer .= '<div class="content-row">';
            do_action( 'woocommerce_before_main_content' );
            $itemContainer .= '<form class="woocommerce-ordering custom-form" method="get">';
                $itemContainer .= '<select name="orderby" class="orderby" aria-label="Shop order">';
                    $itemContainer .= '<option value="menu_order"'; ?><?php if( $orderbyquery === "meu-order" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Default</option>'; 
                    $itemContainer .= '<option value="name"'; ?><?php if( $orderbyquery === "name" ) { $itemContainer .= "selected=selected"; } ?><?php $itemContainer .= '>Name</option>';   
                    $itemContainer .= '<option value="name-desc"'; ?><?php if( $orderbyquery === "name-desc" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Name (Reversed)</option>';   
                    $itemContainer .= '<option value="date"'; ?><?php if( $orderbyquery === "date" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Newest</option>';  
                    $itemContainer .= '<option value="price"'; ?><?php if( $orderbyquery === "price" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Price (Low to High)</option>';
                    $itemContainer .= '<option value="price-desc"'; ?><?php if( $orderbyquery === "price-desc" ) { $itemContainer .= "selected='selected'"; } ?><?php $itemContainer .= '>Price (High to Low)</option>';
                $itemContainer .= '</select>';     
                $itemContainer .= '<input type="hidden" name="paged" value="1">';   
                $itemContainer .= '<div class="custom-form__sort-results">Showing ' . $products->post_count . ' product'; 
                if ( $products->post_count > 1 ) { $itemContainer .= 's'; }
                $itemContainer .= '.</div>';
            $itemContainer .= '</form>';  

            while( $products->have_posts() ) : $products->the_post(); global $product;  
                $itemContainer .= '<div class="item col-sma-4">';
                    $itemContainer .= '<h4 class="item__title"><a class="item__title__link" href="' . get_the_permalink( ) . '">' . get_the_title() . '</a></h4>';
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
            do_action( 'woocommerce_after_main_content' );
        $itemContainer .= '</div>'; 

        echo $itemContainer;
        ?>
    </div>
</div>
                             
<?php 
get_footer();
?>

<?php
//Header template.  

global $woocommerce;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            /* Header styles */
            .header { 
                <?php if ( get_header_image() ) { ?> 
                    background: url('<?php echo esc_url( header_image() ); ?>') 50% 70%/cover no-repeat; 
                <?php } ?>  
            }
        </style>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class( strtolower( single_post_title( "", false ) ) ); ?>>
        <?php wp_body_open(); ?>
        <div class="body-wrapper">
            <header class="header">
                <div class="header__background"></div>
                <div class="inner-wrapper">
                    <div class="main-title-container">
                        <div class="main-title-container__background"></div>
                        <h1>
                            <a class="main-title-container__title" href="<?php echo esc_url( get_home_url() ); ?>"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>
                        </h1>
                    </div>
                    <?php if ( has_custom_logo() ) { ?>
                        <div class="logo">
                            <a class="logo__link" href="<?php echo esc_url( get_home_url() ); ?>">
                                <?php
                                    $logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $logo_id, 'full' );
                                ?>
                                <img class="logo__image" src="<?php echo esc_attr( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo">
                            </a>
                        </div>
                    <?php } ?>
                    <?php if ( $woocommerce->cart->cart_contents_count > 0 ) { ?>
                        <div class="cart-icon">
                            <a class="cart-icon__link" href="cart">
                                <?php echo $woocommerce->cart->cart_contents_count; ?>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'header-widgets-area' ) ) { ?>
                        <div class="header-widgets-area">
                            <?php dynamic_sidebar( 'header-widgets-area' ); ?>
                        </div>
                    <?php } ?>
                    <?php get_search_form(); ?>
                </div>
            </header>
            <nav class="nav mobile-nav" id="mobileNav">
                <div class="dropdown-button-wrapper">
                    <button id="dropdownButton" aria-label="dropdown button">
                        <span class="dropdown-part-1"></span>
                        <span class="dropdown-part-2"></span>
                        <span class="dropdown-part-3"></span>
                    </button>
                </div>
                <div id="dropdownContent">
                    <?php
                        wp_nav_menu( array( 'theme_location' => 'main-nav' ) );
                    ?>
                </div>
            </nav>
            <nav class="nav desktop-nav" id="desktopNav">
                <div class="inner-wrapper">
                    <?php
                        wp_nav_menu( array( 'theme_location' => 'main-nav' ) );
                    ?>
                </div>
            </nav>  
                   
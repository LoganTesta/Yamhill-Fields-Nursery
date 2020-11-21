<?php
//Header template.  
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
                    background: url('<?php echo esc_url( header_image() ); ?>') 50% 58%/cover no-repeat; 
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
                    <?php if ( is_front_page() && trim( get_bloginfo( 'description' ) ) !== "" ) { ?>
                        <div class="subtitle-container">
                            <h2 class="subtitle-container__subtitle"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2>
                        </div>
                    <?php } else { ?>
                        <div class="subtitle-container">
                            <h2 class="subtitle-container__subtitle">
                                <?php 
                                if ( !is_404() ) { 
                                    if( !is_product_category() ) { 
                                        if ( !is_shop() ) {
                                             single_post_title(); 
                                        } else { 
                                            echo "Shop";
                                        }
                                    } else { 
                                        single_cat_title(); 
                                    }
                                } else { 
                                    echo "404 Error"; 
                                } 
                                ?>
                            </h2>
                        </div>
                    <?php } ?>
                </div>
            </header>
            <nav class="nav mobile-nav" id="mobileNav">
                <div id="dropdownButton"></div>
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

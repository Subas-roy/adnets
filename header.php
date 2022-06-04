<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adnets
 */

?>

 <?php $values = get_option('adnets'); ?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>

    <!-- Required Meta Tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="<?php echo $values['favicon-icon']['url']; ?>">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <!-- header banner -->

    <div class="container header-banner mt-50 mb-30">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <a href="<?php $values = get_option('adnets'); echo $values['header-ad-url']; ?>" target="_blank">
                    <img src="<?php echo $values['header-banner']['url'] ?>" alt="<?php echo $values['header-banner']['alt']; ?>">
                </a>
                
            </div>
        </div>
    </div>

    <!-- header banner -->
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 mb-4 mb-md-0">
                    <div class="global-card header-logo d-flex justify-content-center align-items-center">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php if ( ! empty( $values['header-logo']['url'] ) ) { echo $values['header-logo']['url']; } ?>" class="logo" alt="<?php if ( ! empty( $values['header-logo']['alt'] ) ) { echo $values['header-logo']['alt']; } ?>">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 global-card header-right-wrapper">
                    <!-- categories and search bar  -->
                    <div class="position-relative d-flex  justify-content-between">    
                    <div class="mp_cate_wrapper">
                            <!-- categories btn -->
                            <span class="mp-cate-btn btn1 d-none d-md-block">
                                <i class="fa-solid fa-align-left me-3 d-inline-block"></i>
                                all categories
                            </span>
                            <!-- for mobile -->
                            <span class="mobile-mp-cate-btn d-md-none">
                                <i class="fa-solid fa-align-left me-3 d-inline-block"></i>
                            </span>

                            <!-- dropdown category for larger device -->
                            <ul class="mp_dropdown large-device">
                                <li class="close-category">
                                    <span class="cls-cat-btn"><i class="fa-solid fa-xmark"></i></span>
                                </li>
                                <?php 
                                $network_categories = get_terms( array(
                                    'taxonomy' => 'network-category',
                                    'hide_empty' => false
                                ) );
                                
                                if ( !empty($network_categories) ) :
                                    foreach( $network_categories as $category ) {
                                        ?>
                                        <li class="mp_list">
                                            <a class="mp_link" href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                                                <i class="fa-solid fa-cart-arrow-down d-inline-block me-2"></i>
                                                <?php echo $category->name; ?>(<?php echo $category->count; ?>)
                                            </a>
                                        </li>
                                        <?php 
                                    }
                                endif;
                                ?>
                                
                                

                            </ul>
                        </div>

                        <!-- search box -->
                        <div class="header-searchbar">
                            <form action="<?php echo home_url('/'); ?>" method="GET">
                                <input name="s" placeholder="Search affiliate networks" class="search-input" type="text" value="<?php echo get_search_query(); ?>">
                                <input name="post_type" value="network" type="hidden">
                                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- header menu-->
                    
                    <?php wp_nav_menu(array(
                            'theme_location'    =>  'adnets-main-menu',
                            'container' => 'div',
                            'container_class' => 'mp_cate_wrapper',
                            'menu_class' => 'mp_menu mt-20',
                            'depth' => '3',
                            'walker'=>new  YOUR_Walker_Nav_Menu()
                    )); ?>

                </div>
            </div>
        </div>
    </header>

    <!-- dropdown category for small device -->
    <ul class="mp_dropdown small-device">
        <li class="close-category">
            <span class="cls-cat-btn"><i class="fa-solid fa-xmark"></i></span>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-cart-arrow-down d-inline-block me-2"></i>
                eCommerce(321)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-mobile-screen-button d-inline-block me-2"></i>
                mobile(32)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-desktop d-inline-block me-2"></i>
                desktop(33)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-bitcoin-sign d-inline-block me-2"></i>
                crypto(321)
            </a>
        </li>

        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-cart-arrow-down d-inline-block me-2"></i>
                eCommerce(321)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-mobile-screen-button d-inline-block me-2"></i>
                mobile(32)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-desktop d-inline-block me-2"></i>
                desktop(33)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-bitcoin-sign d-inline-block me-2"></i>
                crypto(321)
            </a>
        </li>

        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-cart-arrow-down d-inline-block me-2"></i>
                eCommerce(321)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-mobile-screen-button d-inline-block me-2"></i>
                mobile(32)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-desktop d-inline-block me-2"></i>
                desktop(33)
            </a>
        </li>
        <li class="mp_list">
            <a class="mp_link" href="#">
                <i class="fa-solid fa-bitcoin-sign d-inline-block me-2"></i>
                crypto(321)
            </a>
        </li>
    </ul>




    










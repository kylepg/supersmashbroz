<?php
/**
 * Perfect Portfolio Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Perfect_Portfolio
 */

if( ! function_exists( 'perfect_portfolio_doctype' ) ) :
/**
 * Doctype Declaration
*/
function perfect_portfolio_doctype(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'perfect_portfolio_doctype', 'perfect_portfolio_doctype' );

if( ! function_exists( 'perfect_portfolio_head' ) ) :
/**
 * Before wp_head 
*/
function perfect_portfolio_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'perfect_portfolio_before_wp_head', 'perfect_portfolio_head' );

if( ! function_exists( 'perfect_portfolio_page_start' ) ) :
/**
 * Page Start
*/
function perfect_portfolio_page_start(){
    ?>
    <div id="page" class="site">
    <?php
}
endif;
add_action( 'perfect_portfolio_before_header', 'perfect_portfolio_page_start', 20 );

if( ! function_exists( 'perfect_portfolio_header' ) ) :
/**
 * Header Start
*/
function perfect_portfolio_header(){ 
       
    $ed_cart = get_theme_mod( 'ed_shopping_cart', false ); 
    $ed_header_search = get_theme_mod( 'ed_header_search', false ); 
    $menu_description = get_theme_mod( 'menu_description', '' );
    $site_title = get_bloginfo( 'name' );
    $description = get_bloginfo( 'description', 'display' );
    $header_text = get_theme_mod( 'header_text', true );
    
    if( has_custom_logo() && ( $site_title || $description ) && $header_text ) {
        $add_class = ' logo-text';
    }else{
        $add_class = '';
    } ?>
    <header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
        <div class="tc-wrapper">
            <?php if( has_custom_logo() || $site_title || $description ) : ?>
                
                <div class="site-branding<?php echo esc_attr( $add_class ); ?>" itemscope itemtype="http://schema.org/Organization">
                    <?php if( has_custom_logo() ) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( $site_title || $description ) { ?>
                        <div class="site-title-wrap">
                            <?php if( $site_title ) : ?>
                                <?php if ( is_front_page() ) : ?>
                                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                                <?php endif;
                            endif; 
                            if( $description || is_customize_preview() ) : ?>
                                <p class="site-description" itemprop="description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div><!-- .site-branding -->
            <?php endif; ?>
    		<div class="header-r">
            <a class="social-button" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-soundcloud fa-w-20" aria-hidden="true" data-prefix="fab" data-icon="soundcloud" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9c-1.4 0-2.5 1.1-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2c-1.9 0-3.6 1.4-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70c-.3-2.2-2-3.6-3.9-3.6zm241.4-110.9c-1.1-.8-2.8-1.4-4.2-1.4-2.2 0-4.2.8-5.6 1.9-1.9 1.7-3.1 4.2-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4c-2.2 1.4-3.6 3.9-3.6 6.7l-.3 1.7-2.8 160.8s0 .3 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7 1.7 1.9 3.9 3.1 6.4 3.1 2.2 0 4.2-1.1 5.6-2.5 1.7-1.4 2.5-3.3 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8c-.3-2.8-1.7-5.3-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8c-10.8 0-21.1 2.2-30.6 6.1-6.4-70.8-65.8-126.4-138.3-126.4-17.8 0-35 3.3-50.3 9.4-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3c43.3 0 78.6-35 78.6-78.3.1-43.6-35.2-78.9-78.5-78.9zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6c.3 4.2 3.6 7.5 7.8 7.5 4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4c-3.9 0-6.9 3.1-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            <a class="social-button" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-facebook fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            <a class="social-button" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            <a class="social-button" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-twitter fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
                <?php if( perfect_portfolio_is_woocommerce_activated() && $ed_cart ) perfect_portfolio_wc_cart_count(); ?>
                <?php if( $ed_header_search ) : ?>
				<div class="header-search">
                    <span class="search-toggle-btn"><i class="fa fa-search"></i></span>
                    <div class="head-search-form">
				        <?php get_search_form(); ?>
                    </div>
				</div>
                <?php endif; ?>

                <span class="toggle-btn"><i class="fa fa-bars"></i></span>							
                <div class="menu-wrap">                    
                    <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <button type="button" class="toggle-button">
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                            <span class="toggle-bar"></span>
                        </button>
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'nav-menu',
                                'container'      => false,
                                'fallback_cb'    => 'perfect_portfolio_primary_menu_fallback',
                            ) );
                        ?>
                        <p>Full site coming soon...</p>
                        <div class="menu-social">
                        <a class="social-button-menu" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-soundcloud fa-w-20" aria-hidden="true" data-prefix="fab" data-icon="soundcloud" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9c-1.4 0-2.5 1.1-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2c-1.9 0-3.6 1.4-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70c-.3-2.2-2-3.6-3.9-3.6zm241.4-110.9c-1.1-.8-2.8-1.4-4.2-1.4-2.2 0-4.2.8-5.6 1.9-1.9 1.7-3.1 4.2-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4c-2.2 1.4-3.6 3.9-3.6 6.7l-.3 1.7-2.8 160.8s0 .3 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7 1.7 1.9 3.9 3.1 6.4 3.1 2.2 0 4.2-1.1 5.6-2.5 1.7-1.4 2.5-3.3 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8c-.3-2.8-1.7-5.3-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8c-10.8 0-21.1 2.2-30.6 6.1-6.4-70.8-65.8-126.4-138.3-126.4-17.8 0-35 3.3-50.3 9.4-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3c43.3 0 78.6-35 78.6-78.3.1-43.6-35.2-78.9-78.5-78.9zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6c.3 4.2 3.6 7.5 7.8 7.5 4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4c-3.9 0-6.9 3.1-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            <a class="social-button-menu" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-facebook fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            <a class="social-button-menu" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            <a class="social-button-menu" href="https://twitter.com/_supersmashbroz" target="_blank" rel="nofollow"><svg class="svg-inline--fa fa-twitter fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg><!-- <i class="fab fa-twitter-square"></i> --></a>
            </div>
                    </nav><!-- #site-navigation -->
                    <div class="menu-search">
                        <?php get_search_form(); ?>
                    </div>
                    <?php if( !empty( $menu_description ) ) : ?>
                        <div class="menu-text">
                            <?php echo wpautop( wp_kses_post( $menu_description ) ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="menu-social">
                        <?php perfect_portfolio_social_links(); ?>
                    </div>         
                </div>
    		</div>
        </div>		
	</header>
    <?php 
}
endif;
add_action( 'perfect_portfolio_header', 'perfect_portfolio_header', 20 );

if( ! function_exists( 'perfect_portfolio_content_start' ) ) :
/**
 * Content Start
*/
function perfect_portfolio_content_start(){ 
    $home_sections = perfect_portfolio_get_home_sections();
    $sidebar = perfect_portfolio_sidebar( true );
    
    if( !( is_front_page() && ! is_home() && $home_sections ) ){ ?>
    <div id="content" class="site-content">
        <?php if( ! is_singular() ) : 
            $add_class_name = ( is_home() ) ? 'description' : 'header';
            $add_tag_name = ( is_home() ) ? 'div' : 'header'; ?>
            <<?php echo $add_tag_name; ?> class="page-<?php echo esc_attr( $add_class_name ); ?>">
                <div class="tc-wrapper">                
                <?php        
                    if ( is_home() ) : 
                        echo '<h1 class="page-title">';
                        esc_html_e( 'Blog','perfect-portfolio' );
                        echo '</h1>';
                        $blog_description = get_theme_mod( 'blog_description', '' );
                        if( ! empty( $blog_description ) ) :
                            echo wpautop( wp_kses_post( $blog_description ) );
                        endif;
                    endif;

                    if( is_archive() ) :
                        if( is_author() ){
                            $author_title = get_the_author_meta( 'display_name' ); ?>
                            <div class="about-author">
                                <figure class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 230 ); ?></figure>
                                <div class="author-info-wrap">
                                    <?php 
                                        echo '<span class="sub-title">' . esc_html__( 'All Posts by','perfect-portfolio' ) . '</span>';
                                        echo '<h3 class="name">' . esc_html( $author_title ) . '</h3>';
                                    ?>      
                                </div>
                            </div>
                            <?php 
                        }
                        elseif( is_category() ){
                            echo '<span class="sub-title">'. esc_html__( 'Category','perfect-portfolio' ) . '</span>';
                            echo '<h1 class="page-title"><span>' . esc_html( single_cat_title( '', false ) ) . '</span></h1>';
                        }
                        elseif( is_tag() ){
                            echo '<span class="sub-title">'. esc_html__( 'Tag','perfect-portfolio' ) . '</span>';
                            echo '<h1 class="page-title"><span>' . esc_html( single_tag_title( '', false ) ) . '</span></h1>';
                        }
                        elseif( is_tax( 'rara_portfolio_categories' ) ){
                            echo '<span class="sub-title">'. esc_html__( 'Portfolio Category','perfect-portfolio' ) . '</span>';
                            echo '<h1 class="page-title"><span>' . esc_html( single_term_title( '', false ) ) . '</span></h1>';
                        }
                        else{
                            the_archive_description( '<div class="archive-description">', '</div>' );
                            the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
                        }
                    endif;
                    
                    if( is_search() ) : 
                        echo '<h1 class="page-title">' . esc_html__( 'Search Results', 'perfect-portfolio' ) . '</h1>';
                        get_search_form();
                    endif;
                ?>
                </div>
            </<?php echo $add_tag_name; ?>>
        <?php endif; 
    }        
}
endif;
add_action( 'perfect_portfolio_content', 'perfect_portfolio_content_start' );

if( ! function_exists( 'perfect_portfolio_single_entry_header' ) ) :
/**
 * Entry Header
*/
function perfect_portfolio_single_entry_header(){ ?>
    <header class="entry-header">
		<?php 
            $ed_post_date  = get_theme_mod( 'ed_post_date', false );
            
            if ( is_singular() ) :
    			the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
    		else :
    			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    		endif; 
        
            if( 'post' === get_post_type() ){
                echo '<div class="entry-meta">';
                if( is_single() ){
                    if( ! $ed_post_date ) perfect_portfolio_posted_on();
                }else{
                    perfect_portfolio_posted_on();
                }
                perfect_portfolio_posted_by();
                echo '</div>';
            }		
		?>
	</header>         
    <?php    
}
endif;
add_action( 'perfect_portfolio_before_single_article', 'perfect_portfolio_single_entry_header' );

if ( ! function_exists( 'perfect_portfolio_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function perfect_portfolio_post_thumbnail() {
	global $wp_query;
    $image_size  = 'thumbnail';
    $blog_page_layout = get_theme_mod( 'blog_page_layout', 'with-masonry-description grid' );
    $ed_featured = get_theme_mod( 'ed_featured_image', false );
    $sidebar     = perfect_portfolio_sidebar();
    
    if( is_front_page() && is_home() ){

        if( $blog_page_layout == 'normal-grid-first-large' && $wp_query->current_post === 0 ) {
            $image_size = 'perfect-portfolio-fullwidth';
        }else{
            $image_size = 'perfect-portfolio-blog';
        }
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '" itemprop="thumbnailUrl">';            
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            echo '<img src="' . esc_url( get_template_directory_uri() . '/images/' . $image_size . '.jpg'  ) . '" alt="' . esc_attr( get_the_title() ) . '" itemprop="image" />';    
        }        
        echo '</a></figure>';
    }elseif( is_home() ){ 

        if( $blog_page_layout == 'normal-grid-first-large' && $wp_query->current_post === 0 ) {
            $image_size = 'perfect-portfolio-fullwidth';
        }else{
            $image_size = 'perfect-portfolio-blog';
        }       
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '" itemprop="thumbnailUrl">';
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            echo '<img src="' . esc_url( get_template_directory_uri() . '/images/' . $image_size . '.jpg'  ) . '" alt="' . esc_attr( get_the_title() ) . '" itemprop="image" />';    
        }        
        echo '</a></figure>';
    }elseif( is_archive() || is_search() ){
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '" itemprop="thumbnailUrl">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( 'perfect-portfolio-blog', array( 'itemprop' => 'image' ) );    
        }else{
            echo '<img src="' . esc_url( get_template_directory_uri() . '/images/perfect-portfolio-blog.jpg'  ) . '" alt="' . esc_attr( get_the_title() ) . '" itemprop="image" />';
        }
        echo '</a></figure>';
    }elseif( is_singular() ){
        $image_size = ( $sidebar ) ? 'perfect-portfolio-with-sidebar' : 'perfect-portfolio-fullwidth';
        if( is_single() && ( !$ed_featured ) ){
            if( has_post_thumbnail() ) {
                echo '<figure class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</figure>';
            }
        }elseif( is_page() ){
            if( has_post_thumbnail() ) {
                echo '<figure class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</figure>';
            }
        }
    }
}
endif;
add_action( 'perfect_portfolio_before_single_header', 'perfect_portfolio_post_thumbnail' );
add_action( 'perfect_portfolio_before_post_entry_content', 'perfect_portfolio_post_thumbnail', 20 );

if( ! function_exists( 'perfect_portfolio_entry_post_content' ) ) :
/**
 * Entry Content
*/
function perfect_portfolio_entry_post_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true );
    $blog_page_layout = get_theme_mod( 'blog_page_layout', 'with-masonry-description grid' ); ?>
    <div class="post-content-wrap">
        <header class="entry-header">
            <h2 class="entry-title" itemprop="headline">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="entry-meta">
                <?php perfect_portfolio_posted_on(); ?>
            </div>
        </header>
        <?php if( $blog_page_layout != 'normal-grid-first-large' ) {
            echo '<div class="entry-content">';
                if( $ed_excerpt ) {
                    the_excerpt();
                } else{
                    the_content();
                }
            echo'</div>';
        } ?>
    </div>
    <?php
}
endif;
add_action( 'perfect_portfolio_post_entry_content', 'perfect_portfolio_entry_post_content', 10 );

if( ! function_exists( 'perfect_portfolio_single_entry_content' ) ) :
/**
 * Entry Content
*/
function perfect_portfolio_single_entry_content(){ ?>
    <div class="entry-content" itemprop="text">
        <?php perfect_portfolio_tc_wrapper();
        the_content();    
		
        wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'perfect-portfolio' ),
			'after'  => '</div>',
		) );
		perfect_portfolio_tc_wrapper_end(); ?>
	</div><!-- .entry-content -->
    <?php
}
endif;
add_action( 'perfect_portfolio_single_article', 'perfect_portfolio_single_entry_content', 10 );

if( ! function_exists( 'perfect_portfolio_tc_wrapper' ) ) :
/**
 * Author Section
*/
function perfect_portfolio_tc_wrapper() { 
    $sidebar = perfect_portfolio_sidebar( true );

    if( $sidebar != 'rightsidebar' && $sidebar != 'leftsidebar' ) { 
        echo '<div class="tc-wrapper">';    
    }
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_tc_wrapper', 10 );

if( ! function_exists( 'perfect_portfolio_navigation' ) ) :
/**
 * Navigation
*/
function perfect_portfolio_navigation(){
    if( is_single() ){
        $previous = get_previous_post_link(
    		'<div class="nav-previous nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Previous Article', 'perfect-portfolio' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	);
    
    	$next = get_next_post_link(
    		'<div class="nav-next nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Next Article', 'perfect-portfolio' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	); 
        
        if( $previous || $next ){?>            
            <nav class="navigation post-navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'perfect-portfolio' ); ?></h2>
    			<div class="nav-links">
    				<?php
                        if( $previous ) echo $previous;
                        if( $next ) echo $next;
                    ?>
    			</div>
    		</nav>        
            <?php
        }
    }else{
        the_posts_pagination( array(
            'prev_text'          => __( 'Previous', 'perfect-portfolio' ),
            'next_text'          => __( 'Next', 'perfect-portfolio' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'perfect-portfolio' ) . ' </span>',
        ) );
    }
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_navigation', 15 );
add_action( 'perfect_portfolio_after_posts_content', 'perfect_portfolio_navigation' );

if( ! function_exists( 'perfect_portfolio_entry_footer' ) ) :
/**
 * Entry Footer
*/
function perfect_portfolio_entry_footer(){ ?>
    <div class="entry-footer">
        <?php
                        
            if( get_edit_post_link() ){
                edit_post_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'perfect-portfolio' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
            }
            if( is_single() ) {
                perfect_portfolio_tag();
            }
        ?>
    </div><!-- .entry-footer -->
    <?php 
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_entry_footer', 13 );

if( ! function_exists( 'perfect_portfolio_author' ) ) :
/**
 * Author Section
*/
function perfect_portfolio_author(){ 
    $ed_author    = get_theme_mod( 'ed_author', false );
    $author_title = get_the_author_meta( 'display_name' );
    $author_description = get_the_author_meta( 'description' );

    if( $ed_author && $author_title && $author_description ){ ?>
        <div class="about-author">
    		<figure class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 230 ); ?></figure>
    		<div class="author-info-wrap">
    			<?php 
                    if( is_author() ) echo '<span class="sub-title">' . esc_html__( 'All Posts by','perfect-portfolio' ) . '</span>';
                    echo '<h3 class="name">' . esc_html( $author_title ) . '</h3>';
                    echo '<div class="author-info">' . wpautop( wp_kses_post( $author_description ) ) . '</div>';
                ?>		
    		</div>
        </div>
    <?php }
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_author', 20 );

if( ! function_exists( 'perfect_portfolio_related_posts' ) ) :
/**
 * Related Posts 
*/
function perfect_portfolio_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', false );
    if( $ed_related_post ){
        perfect_portfolio_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_related_posts', 35 );

if( ! function_exists( 'perfect_portfolio_popular_posts' ) ) :
/**
 * Popular Posts
*/
function perfect_portfolio_popular_posts(){ 
    $ed_popular_post = get_theme_mod( 'ed_popular', false );
    if( $ed_popular_post ){
        perfect_portfolio_get_posts_list( 'popular' );  
    }
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_popular_posts', 30 );

if( ! function_exists( 'perfect_portfolio_latest_posts' ) ) :
/**
 * Latest Posts
*/
function perfect_portfolio_latest_posts(){ 
    perfect_portfolio_get_posts_list( 'latest' );
}
endif;
add_action( 'perfect_portfolio_latest_posts', 'perfect_portfolio_latest_posts' );

if( ! function_exists( 'perfect_portfolio_tc_wrapper_end' ) ) :
/**
 * Comments Template 
*/
function perfect_portfolio_tc_wrapper_end(){
    $sidebar = perfect_portfolio_sidebar( true );

    if( $sidebar != 'rightsidebar' && $sidebar != 'leftsidebar' ) { 
        echo '</div>';    
    }
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_tc_wrapper_end', 40 );

if( ! function_exists( 'perfect_portfolio_comment' ) ) :
/**
 * Comments Template 
*/
function perfect_portfolio_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
endif;
add_action( 'perfect_portfolio_after_post_content', 'perfect_portfolio_comment', 45 );
add_action( 'perfect_portfolio_after_page_content', 'perfect_portfolio_comment' );

if( ! function_exists( 'perfect_portfolio_content_end' ) ) :
/**
 * Content End
*/
function perfect_portfolio_content_end(){ 
    $home_sections = perfect_portfolio_get_home_sections();
    
    if( !( is_front_page() && ! is_home() && $home_sections ) ){ ?>       
    </div><!-- .site-content -->
    <?php
    }
}
endif;
add_action( 'perfect_portfolio_before_footer', 'perfect_portfolio_content_end', 20 );

if( ! function_exists( 'perfect_portfolio_single_portfolio_thumbnail' ) ) :
/**
 * Portfolio gallery
*/
function perfect_portfolio_single_portfolio_thumbnail(){ 
    
    if( is_singular( 'rara-portfolio' ) ){
        if( has_post_thumbnail() ) {
            echo '<figure class="post-thumbnail">';
            the_post_thumbnail( 'perfect-portfolio-fullwidth', array( 'itemprop' => 'image' ) );
            echo '</figure>';
        }
    }
}
endif;                                                                               
add_action( 'perfect_portfolio_before_single_portfolio_content', 'perfect_portfolio_single_portfolio_thumbnail' );

if( ! function_exists( 'perfect_portfolio_single_portfolio_content' ) ) :
/**
 * Portfolio content 
*/
function perfect_portfolio_single_portfolio_content(){ 
    global $post; ?>
    <div class="content-wrap-box">
        <header class="page-header">
            <?php $category_ids = get_the_terms( $post, 'rara_portfolio_categories');
            if( ! empty( $category_ids ) ) { ?>
            <span class="sub-title">
                <?php foreach( $category_ids as $category_id ){
                    echo '<span>' . esc_html( $category_id->name ) . '</span>'; 
                } ?>
            </span>
            <?php } ?>
            <h1 class="page-title"><span><?php the_title();?></span></h1>
        </header>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>    
<?php }
endif;                                                                               
add_action( 'perfect_portfolio_single_portfolio_content', 'perfect_portfolio_single_portfolio_content' );

if( ! function_exists( 'perfect_portfolio_single_portfolio_related_posts' ) ) :
/**
 * Related Posts 
*/
function perfect_portfolio_single_portfolio_related_posts(){ 
    perfect_portfolio_get_posts_list( 'portfolio-related' );    
}
endif;                                                                               
add_action( 'perfect_portfolio_after_portfolio_content', 'perfect_portfolio_single_portfolio_related_posts', 10 );

if( ! function_exists( 'perfect_portfolio_call_to_action' ) ) :
/**
 * Content End
*/
function perfect_portfolio_call_to_action(){ 

    if( is_singular( 'rara-portfolio' ) ) {    
        if ( is_active_sidebar( 'cta-footer' ) ) { ?>
            <section id="cta_section" class="cta-section">
                <div class="v-center-inner">
                    <div class="tc-wrapper">
                        <?php dynamic_sidebar( 'cta-footer' ); ?>
                    </div>
                </div>
            </section> <!-- .cta-section -->
    <?php }
    }
}
endif;
add_action( 'perfect_portfolio_before_footer', 'perfect_portfolio_call_to_action', 25 );

if( ! function_exists( 'perfect_portfolio_footer_start' ) ) :
/**
 * Footer Start
*/
function perfect_portfolio_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'perfect_portfolio_footer', 'perfect_portfolio_footer_start', 20 );

if( ! function_exists( 'perfect_portfolio_footer_top' ) ) :
/**
 * Footer Top
*/
function perfect_portfolio_footer_top(){    
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ){ ?>
    <div class="top-footer">
		<div class="tc-wrapper">
            <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
				<div class="col">
				   <?php dynamic_sidebar( 'footer-one' ); ?>	
				</div>
            <?php } ?>
			
            <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                <div class="col">
				   <?php dynamic_sidebar( 'footer-two' ); ?>	
				</div>
            <?php } ?>
            
            <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                <div class="col">
				   <?php dynamic_sidebar( 'footer-three' ); ?>	
				</div>
            <?php } ?>
		</div>
	</div>
    <?php 
    }   
}
endif;
add_action( 'perfect_portfolio_footer', 'perfect_portfolio_footer_top', 30 );

if( ! function_exists( 'perfect_portfolio_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function perfect_portfolio_footer_bottom(){ ?>
    <div class="bottom-footer">
		<div class="tc-wrapper">
            <div class="copyright">           
                <?php if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
                } 
                perfect_portfolio_get_footer_copyright();
                printf( esc_html__( '%1$sPerfect Portfolio%2$s by Rara Theme.', 'perfect-portfolio' ), '<a href="' . esc_url( 'https://raratheme.com/wordpress-themes/perfect-portfolio/' ) .'" rel="author" target="_blank">', '</a>' );
                
                printf( esc_html__( ' Powered by %s', 'perfect-portfolio' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'perfect-portfolio' ) ) .'" target="_blank">WordPress</a> .' );
            ?>               
            </div>
            <div class="foot-social">
                <?php perfect_portfolio_social_links(); ?>
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'perfect_portfolio_footer', 'perfect_portfolio_footer_bottom', 40 );

if( ! function_exists( 'perfect_portfolio_back_to_top' ) ) :
/**
 * Footer End 
*/
function perfect_portfolio_back_to_top(){ ?>
    <div class="back-to-top">
        <i class="fa fa-long-arrow-up"></i>
    </div>
    <?php
}
endif;
add_action( 'perfect_portfolio_footer', 'perfect_portfolio_back_to_top', 50 );

if( ! function_exists( 'perfect_portfolio_footer_end' ) ) :
/**
 * Footer End 
*/
function perfect_portfolio_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'perfect_portfolio_footer', 'perfect_portfolio_footer_end', 60 );

if( ! function_exists( 'perfect_portfolio_page_end' ) ) :
/**
 * Page End
*/
function perfect_portfolio_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'perfect_portfolio_after_footer', 'perfect_portfolio_page_end', 20 );


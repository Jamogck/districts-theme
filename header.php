<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EFCA_District_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php $logo = get_field( 'logo', 'option' ); 
    if( $logo ) { ?>
        <style>
            .site-title a {
                display: inline-block;
                background: url('<?php echo $logo; ?>') no-repeat center;
                background-size: auto 100%;
                color: transparent;
                height: 50px;
            }
            .site-title a:hover, .site-title a:focus {
                color: transparent;
            }
        </style>
    <?php }; ?>

<?php wp_head(); ?>
</head>

<body>
<div class="wrap">
   <div class="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'efca-district' ); ?></a>

	<header class="header-page group" role="banner">
        <div class="topbar">
        	<div class="inner  flex">
            <?php 
                if ( get_field('include_giving', 'option') == 'yes' ) { 
                    $giving_link = get_field( 'giving_link', 'option' ); ?>
                <a id="giving_link" class="hide-on-small" href="<?php echo $giving_link; ?>">Give</a>
            <?php }; ?>

                <a class="btn btn_green" href="#">Find a Church</a>
                <?php get_search_form(); ?>
            </div>
        </div>
		<div class="inner" role="navigation">
            <nav id="primary-nav">
                <div id="nav_trigger">
                    <button class="hamburger  hamburger--squeeze" type="button">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                    </button>
                </div>
                        
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				    <?php clean_custom_menu( 'primary' ); ?>
			</nav>
		</div>
	</header><!-- #masthead -->

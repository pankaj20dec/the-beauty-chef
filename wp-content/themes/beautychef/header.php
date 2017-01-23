<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!--<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'beautychef' ); ?></a>-->
	<header id="masthead" class="site-header" role="banner">
		<div class="logo-header">
			<div class="top-bar">
				<div class="left-bar">
					Free shipping Australia wide for orders over $100
				</div>
				<div class="right-bar">
					<ul>
						<li><a href="#" class="search-icon">Search</a></li>
						<li><a href="#" class="user-icon">User</a></li>
						<li><a href="#" class="bag-icon">Bag</a></li>
						<?php global $woocommerce; ?>
							<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
					</ul>
				</div>
			</div>
			<div class="social-icons">
				<?php 
						$facebook_link =carbon_get_theme_option('crb_facebook_link'); 
						$instagram_link =carbon_get_theme_option('crb_instagram_link'); 
						$instagram_link =carbon_get_theme_option('crb_pinterest_link'); 
					?>
				<ul>
					<?php if(!empty($facebook_link)){?>
						<li><a href="<?php echo $facebook_link;?>"><?php echo beautychef_get_svg( array( 'icon' => 'facebook' ) );?></a></li>
					<?php }?>
					<?php if(!empty($instagram_link)){?>
						<li><a href="<?php echo $instagram_link;?>"><?php echo beautychef_get_svg( array( 'icon' => 'instagram' ) );?></a></li>
					<?php }?>
					<?php if(!empty($instagram_link)){?>
						<li><a href="<?php echo $instagram_link;?>"><?php echo beautychef_get_svg( array( 'icon' => 'pinterest-p' ) );?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="logo">
				<a href="<?php echo site_url();?>"><img src="<?php echo get_theme_file_uri();?>/assets/images/logo.png" alt="The Beauty Chef" /></a>
			</div>
		</div>
		<div class="top-menu">
			<a href="javascript:void(0);" class="menu-text"><span>M</span><span>e</span><span>n</span><span>u</span></a>
		</div>
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<a href="javascript:void(0);" class="close-menu">&times;</a>
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>
	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">

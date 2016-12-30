<?php
/**
 * Displays Footer navigation
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Footer Menu', 'beautychef' ); ?>">
	<?php wp_nav_menu( array(
		'theme_location' => 'footer_menu',
		'menu_id'        => 'footer-menu',
	) ); ?>
</nav><!-- #site-navigation -->

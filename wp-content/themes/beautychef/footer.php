<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */

?>

</div><!-- #content -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-info container">
				<div class="nav-continer">
					<div class="row clearfix">
						<div class="col-md-4 border-right">
							<h4 class="footer-title">info</h4>
							<div class="footer-navigation">
								<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
									<div class="navigation-footer">
										<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-5 border-right subscribe-box">
							<h4 class="footer-title">join the family</h4>
							<div class="subscribe">
								<p>Sign up to receive our quarterly newsletter and to receive 10% off your first order.</p>
								<form class="form">
								  <div class="form-group">
									<input type="text" class="form-control" id="name" placeholder="Name">
								  </div>
								  <div class="form-group">
									<input type="email" class="form-control" id="email" placeholder="Email">
								  </div>
								  <button type="submit" class="btn pull-right">sign up</button>
								</form>
							</div>
						</div>
						<div class="col-md-3 text-center">
							<h4 class="footer-title">connect</h4>
							<div class="connect">
								<div class="social-icons">
									<ul>
										<li><a href="#"><?php echo beautychef_get_svg( array( 'icon' => 'facebook' ) );?></a></li>
										<li><a href="#"><?php echo beautychef_get_svg( array( 'icon' => 'instagram' ) );?></a></li>
										<li><a href="#"><?php echo beautychef_get_svg( array( 'icon' => 'pinterest-p' ) );?></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .wrap -->
			<div class="credits">
				<div class="container">
					<span>Copyright 2016 The Beauty Chef</span> / <span>This is an Australian business trading within Australia</span> / <span>Website design by <strong>Smack Bang Designs</strong></span>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

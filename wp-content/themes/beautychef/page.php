<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beauty_chef
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">

		<?php
		 while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/page/content', 'page' );

		 endwhile; // End of the loop.
		?>

	</div><!-- #primary -->
</div><!-- .wrap -->
<?php 
	$banner_image = get_field('banner_image');
	$banner_title = get_field('banner_title');
?>
<div class="page-banner flex-contianer" style="background:url('<?php echo $banner_image['url']; ?>');">
	<h2 class="page-banner-title">
		<?php echo $banner_title; ?>
	</h2>
</div>
<?php get_footer();

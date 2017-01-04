<?php
/**
 *	Template Name: Contact Page	
 */

get_header(); ?>
	<div class="contact-container">
		<?php while ( have_posts() ) : the_post();
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'about-top-banner');
		?>
			<div class="container">
				<div class="row">
					<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
					<div class="banner-top contact-title-overlay" style="background: url('<?php echo $src[0]; ?>');">
						<h2 class="main-heading-alt">Contact the beauty chef </h2>
					</div>
					<div class="text-below-banner">
						<h5>Have a look at our <a href="<?php echo site_url();?>/faqs">FAQs</a> before enquiring. </h5>
						<h6 class="alt-sub-heading">In order for us to answer your query as quickly as possible please send your request to the following;</h6>
					</div>
				</div>
			</div>
			<div class="contact-info">
				<div class="container">
					<div class="row clearfix">
						<div class="col-md-4">
							<div class="column-info">
								<div class="column-des column-one">
									<?php the_field('column_one'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="column-des column-two">
								<?php the_field('column_two'); ?>
							</div>	
						</div>
						<div class="col-md-3 pull-right">
							<div class="column-des column-three">
								<?php the_field('column_three'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="contact-form">
					<?php echo do_shortcode('[ninja_form id=1]');?>
				</div>
			</div>
		<?php endwhile;?>
	</div>
<?php get_footer();
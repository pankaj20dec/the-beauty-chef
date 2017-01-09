<?php 
/*
 * Template Name: Naturopaths Page
 */
get_header(); 
	$page_sub_heading = get_field('page_sub_heading');
?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
		<div class="page-subtext">
			<h6 class="alt-sub-heading">
				<?php echo $page_sub_heading; ?>
			</h6>
		</div>
		<div class="main-content">
			<?php 
				$query = new WP_Query( array(
					 'order'        => 'ASC',
					 'post_type'    => 'naturopaths',
					 'posts_per_page'  => -1
				  ));
					if ( $query->have_posts() ) :

						while ( $query->have_posts() ) : $query->the_post();
						$sub_heading = get_field('sub_heading');
						$form_shortcode = get_field('form_shortcode');
						?>
						<div class="row clearfix naturopath-box">
							<div class="col-md-3 col-sm-3">
								<div class="left-part">
									<div class="image">
										<?php the_post_thumbnail('naturopath-img'); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 no-padding">
								<div class="middle-part">
									<h2><?php the_title();?></h2>
									<h6 class="alt-sub-heading"><?php echo $sub_heading; ?></h6>
									<div class="description">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 no-left-padding">
								<div class="right-part">
									<div class="enquiry-form">
										<?php echo $form_shortcode;?>
									</div>
								</div>	
							</div>
						</div>	
						<?php endwhile;
					else : 
						_e( 'Nothing published so far.');
					endif; 
				wp_reset_query();
			?>
		</div>
	</div>
 
<?php get_footer();
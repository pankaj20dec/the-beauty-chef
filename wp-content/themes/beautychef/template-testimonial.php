<?php 
/*
 * Template Name: Testimonial Page
 */
get_header(); 
$sub_heading = get_field('sub_heading');	
?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
			<div class="testimonial-featured-img">
				<?php the_post_thumbnail('top-banner');?>
			</div>
			<div class="sub-heading">
				<h6 class="alt-sub-heading"><?php if(!empty($sub_heading)){ echo $sub_heading;} ?></h6>
			</div>
			<div class="testimonial-container">
				<div class="testimonial-ul">
					<div class="grid-sizer"></div>
					<?php 
						$query = new WP_Query( array(
							 'order'        => 'ASC',
							 'post_type'    => 'testimonials',
							 'posts_per_page'  => 3,
							 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
						  ));
							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
									$writer_name = get_field('writer_name');
									$other_text = get_field('other_text');
								?>
								<div class="grid-item">
									<div class="testimonial-content">
										<?php the_content();?>
										<div class="writer-name">
											<h6> -  <?php if(!empty($writer_name)){ echo $writer_name;}?><br/>
											<span class="other-text"><?php if(!empty($other_text)){ echo $other_text;}?></span></h6>
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
					<?php 
					if (  $query->max_num_pages > 1 ) : ?>
						<div class="view-more-container">
							<div class="loader-img" style="display: none;text-align: center;">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ring.svg" alt="Loading" />
							</div>
							<ul class="next-prev">
								<li><?php next_posts_link( 'See more', $query->max_num_pages ); ?></li>
							</ul>
						</div>
					<?php endif;
					?>
			</div>
	</div>
 
<?php 
if (function_exists("pagination")) {
		pagination($query->max_num_pages);
	} 
get_footer();
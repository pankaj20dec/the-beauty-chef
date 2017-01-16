<?php
/**
 *	Template Name: About Page	
 */

get_header(); ?>
	<div class="about-container">
		<?php while ( have_posts() ) : the_post();
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'about-top-banner');
		$chef_name = get_field('chef_name');
		$sub_heading = get_field('sub_heading');
		$detail_about_chef = get_field('detail_about_chef');
		//$chef_image = get_field('chef_image');
		$attachment_id = get_field('chef_image');
		$attachment = $attachment_id['id'];
		$size = "about-image"; 
		$image = wp_get_attachment_image_src( $attachment, $size);
		//print_r($attachment_id);
		?>
			<div class="container">
				<div class="row">
					<div class="about-deatail-container">
						<div class="banner-top vertically-center" style="background: url('<?php echo $src[0]; ?>');">
							<h1>about the beauty chef </h1>
						</div>
						<div class="about-chef clearfix">
							<div class="col-md-6">
								<div class="chef-details">
									<h2 class="chef-name"><?php echo $chef_name; ?></h2>
									<h4 class="sub-heading"><?php echo $sub_heading; ?></h4>
									<div class="description">
										<?php echo $detail_about_chef; ?>
									</div>
								</div>
							</div>
							<div class="col-md-6 right-padding">
								<div class="chef-image">
									<img src="<?php echo $image[0];?>" alt="<?php echo $chef_name;?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
		<div id="team" class="team-list container">
			<div class="row clearfix">
					<h2 class="team-heading"> the team </h2>
					<div class="team-member-container">
						<?php 
							$query_default = new WP_Query( array(
								 'order'        => 'ASC',
								 'post_type'    => 'naturopaths',
								 'posts_per_page' => -1
							  ));
								if ( $query_default->have_posts() ) :

									while ( $query_default->have_posts() ) : $query_default->the_post();
									?>
									<div class="col-md-3 new-pad">
										<div class="team-member">
											<?php the_post_thumbnail('team-member-img');?>
											<h5> person name </h5>
											<h5 class="find-more"><a href="#">find out more</a></h5>
										</div>
									</div>
											
									<?php endwhile;

								else : // else; no posts
									_e( 'Nothing published so far.');
								endif; // endif; have_posts();

							wp_reset_query();
						?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();
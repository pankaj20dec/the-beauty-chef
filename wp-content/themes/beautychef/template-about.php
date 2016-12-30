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
		<?php endwhile; ?>
	</div>
<?php get_footer();
<?php
/**
 *	Template Name: Home Page	
 */

get_header(); ?>
<?php 
	$pageID = get_option('page_on_front');
	$bottom_banner_image = get_field('bottom_banner_image',$pageID);
	$bottom_banner_heading = get_field('bottom_banner_heading',$pageID);
	$bottom_banner_subheading = get_field('bottom_banner_subheading',$pageID);
	$find_match_image = get_field('find_match_image',$pageID);
	$find_match_heading = get_field('find_match_heading',$pageID);
	$size = 'home-bottom-banner-img';
	$find_match_size = 'find-match-image';
	$bottom_banner = wp_get_attachment_image_src( $bottom_banner_image, $size );
	$find_match = wp_get_attachment_image_src( $find_match_image, $find_match_size );
	?>
	<section class="intro-section">
		<div id="intro" class="intro-width">
			<div class="intro-slider-container">
				<ul class="intro-slider">
						<?php
						if( have_rows('intro_slider') ):
							while ( have_rows('intro_slider') ) : the_row();
								$image = get_sub_field('slide_image', $pageId);
								$heading = get_sub_field('heading', $pageId);
								$sub_heading = get_sub_field('sub_heading', $pageId);
								?>
								<li>
									<img src="<?php echo $image['url']; ?>" alt="Home slide" />
									<div class="caption">
										<?php if(!empty($heading)){?><h2><?php echo $heading; ?></h2><?php }?>
										<?php if(!empty($sub_heading)){?><h6 class="alt-sub-heading">"<?php echo $sub_heading; ?></h6><?php }?>
									</div>
								</li>
							<?php
							endwhile;
							wp_reset_postdata();
						endif;
					?>
				</ul>
			</div>
		</div>
		<div class="intro-text">
			<div class="container">
				<div class="row clerfix">
					<div class="col-sm-9 centered">
						<?php 
						echo $introText = get_field('intro_text',$pageID);?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="home-products">
		<div class="products-container">
			<h5 class="top-heading">view our best sellers</h5>
			<div class="owl-carousel products-slider">
				<?php 
					$args = array(  
					'post_type' => 'product',  
					'meta_key' => '_featured',  
					'meta_value' => 'yes',  
					'posts_per_page' => 20  
				);  
				  
				$featured_query = new WP_Query( $args );  
				if ($featured_query->have_posts()) :   
					while ($featured_query->have_posts()) :   
						$featured_query->the_post();  
						$product = get_product( $featured_query->post->ID );  
						$quantiy = get_post_meta($featured_query->post->ID, 'Quantity',true);
						 ?>
						<div class="product-item item">
							<?php the_post_thumbnail();?>
							<div class="details">
								<h5 class="alt-heading product-name"><?php  the_title(); ?></h5>
								<h5 class="alt-heading"><?php echo $quantiy; ?></h5>
								<h5 class="alt-heading"><?php echo $product->get_price_html();?></h5>
							</div>
						</div>
						<?php
					endwhile;  
				endif;  
				wp_reset_query();
				?>
			</div>
		</div>
		<div class="all-products-button"><a href="<?php echo site_url();?>/shop" class="link-button">Shop all Products</a></div>
	</section>
	<section id="home-grid">
		<div class="container grid-border">
			<div class="row clearfix">
				<div class="col-md-7 left-boxes no-padding">
					<div class="latest-recipes">
						<h2>Latest Recipes</h2>
						<div class="recipe-image image">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/latest-recipes.jpg" alt="Recipe name" />
							<div class="home-cat-name"><p class="home-sub-heading">inner recipes</p></div>
						</div>
					</div>
					<div class="latest-blog">
						<h2>Latest Blog</h2>
						<div class="blog-image image">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/latest-blog.jpg" alt="Blog name" />
							<div class="home-cat-name"><p class="home-sub-heading">Beauty</p></div>
						</div>
					</div>
				</div>
				<div class="col-md-5 right-boxes no-padding">
					<div class="home-testimonial">
						<div class="owl-carousel testimonial-slider">
							<?php 
								$query = new WP_Query( array(
									 'order'        => 'ASC',
									 'post_type'    => 'testimonials',
									 'posts_per_page'  => -1,
									 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
								  ));
									if ( $query->have_posts() ) :
										while ( $query->have_posts() ) : $query->the_post();
											$writer_name = get_field('writer_name');
											$other_text = get_field('other_text');
										?>
										<div class="item">
											<?php the_content();?>
												<div class="writer-name">
													<h6> -  <?php if(!empty($writer_name)){ echo $writer_name;}?><br/>
													<span class="other-text"><?php if(!empty($other_text)){ echo $other_text;}?></span></h6>
												</div>
										</div>
										<?php endwhile;
									else : 
										_e( 'Nothing published so far.');
									endif; 
								wp_reset_postdata();
								?>
						</div>
					</div>
					<div class="home-find-match">
						<div class="find-match-img">
							<img src="<?php echo $find_match[0];?>" alt="Find Your Match" />
							<div class="find-title">
								<p class="home-sub-heading"><?php echo $find_match_heading; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="bottom-banner">
		<div class="container-fluid no-padding">
			<div class="col-md-6 no-padding">
				<div class="banner-img" style="background:url('<?php echo $bottom_banner[0];?>">
				</div>
			</div>
			<div class="col-md-4 no-padding">
				<div class="banner-content">
					<h2 class="banner-title"><?php echo $bottom_banner_heading; ?></h2>
					<div class="banner-text"><?php echo $bottom_banner_subheading; ?></div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();

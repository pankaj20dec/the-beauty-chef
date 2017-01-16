<?php
/**
 *	Template Name: Home Page	
 */

get_header(); ?>
	<section class="intro-section">
		<div id="intro" class="intro-width">
			<div class="intro-slider-container">
				<ul class="intro-slider">
					<li><img src="<?php echo get_template_directory_uri();?>/assets/images/slide.jpg" alt="Home slide" />
						<div class="caption">
							<h2>enhance + boost + radiate</h2>
							<h6 class="alt-sub-heading">bio-fermented probiotic elixirs for extra support</h6>
						</div>
						</li>
					<li><img src="<?php echo get_template_directory_uri();?>/assets/images/slide.jpg" alt="Home slide" />
						<div class="caption">
							<h2>enhance + boost + radiate</h2>
							<h6 class="alt-sub-heading">bio-fermented probiotic elixirs for extra support</h6>
						</div>
					</li>
					<li><img src="<?php echo get_template_directory_uri();?>/assets/images/slide.jpg" alt="Home slide" />
						<div class="caption">
							<h2>enhance + boost + radiate</h2>
							<h6 class="alt-sub-heading">bio-fermented probiotic elixirs for extra support</h6>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="intro-text">
			<div class="container">
				<div class="row clerfix">
					<div class="col-sm-9 centered">
						<?php $introText = get_field('intro_text');?>
						<h1> Bio-fermented whole food nutrition and probiotics of inner and outer beauty. Beauty begins in the belly. Living beauty from the inside out.</h1>
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
							<div class="item"><h3>1This is a testimonial.Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempo. </h3>
							<h6 class="alt-heading">- The collective magazine</h6>
							</div>
							<div class="item"><h3>2This is a testimonial.Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempo. </h3></div>
							<div class="item"><h3>3This is a testimonial.Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempo. </h3></div>
							<div class="item"><h3>4This is a testimonial.Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua sed do eiusmod tempo. </h3></div>
						</div>
					</div>
					<div class="home-find-match">
						<div class="find-match-img">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/home-find-match.jpg" alt="Find Your Match" />
							<div class="find-title">
								<p class="home-sub-heading">Find Your Match</p>
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
				<div class="banner-img" style="background:url('<?php echo get_template_directory_uri();?>/assets/images/home-bottom.jpg');">
				</div>
			</div>
			<div class="col-md-4 no-padding">
				<div class="banner-content">
					<h2 class="banner-title">what is floraculture & the bio-fermentation process?</h2>
					<div class="banner-text"><p>Find out more about The Beauty Chef’s <br/> unique and natural bio-fermentation process.</p></div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();

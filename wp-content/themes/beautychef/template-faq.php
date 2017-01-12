<?php 
/*
 * Template Name: Faq Page
 */
get_header(); 
?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
		<div class="faq-container">
			<div class="row clearfix">
				<div class="col-md-2 col-sm-2">	
					<div class="faq-categories">
						<h6>Categories:</h6>
						<ul class="alt-sub-heading faq-cat">
							<?php 
							$terms = get_terms( array(
								'taxonomy' => 'faq_cat',
								'hide_empty' => false,
							) ); 
							foreach($terms as $term){
								$term_get = get_term_link($term);
								$term_slug = $term->slug;
								echo '<li><a href="#'.$term_slug.'">'.$term->name.'</a></li>';
							}
							?>
						</ul>
						<div class="search">
							<form class="search" action="<?php echo home_url( '/' ); ?>">
							  <input type="search" name="s" placeholder="Search&hellip;">
							  <input type="submit" value="Search">
							  <input type="hidden" name="post_type" value="faqs">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-10 col-sm-10">
					<ul class="faq-ul">
					<?php 
						$custom_terms = get_terms('faq_cat');

					foreach($custom_terms as $custom_term) {
						wp_reset_query();
						$args = array(
							'post_type' => 'faqs',
							'posts_per_page'=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'faq_cat',
									'field' => 'slug',
									'terms' => $custom_term->slug,
									'include_children'=> false
								),
							),
						 );
						?>
						<div class="category-posts" id="<?php echo $custom_term->slug; ?>">
							<?php
							 $loop = new WP_Query($args);
							 if($loop->have_posts()) {?>
								<?php 
								echo '<h2>'.$custom_term->name.'</h2>';
								
								while($loop->have_posts()) : $loop->the_post();
								?>
									<div class="ques-ans">		
										<h6 class="question"><?php echo get_the_title();?><span class="plus">+</span></h6>
										<div class="answer">
											<?php the_content(); ?> 
										</div>
									</div>
								
								<?php
								endwhile;
							 }
							 ?>
						 </div>
						<?php } ?>
					</ul>
				</div>
			</div>	
		</div>
	</div>
<?php	
get_footer();
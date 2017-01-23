<div class="blog-page_wrapper"> 	
	<div class="product_details_content"> 								
		 <h3 class="archer-Light_fonts"> related posts</h3>	
		 <p class="didot_fonts">We think you might also enjoy these! </p>
	</div>	  
	<div class="related-post-slider owl-carousel products-slider2 clearfix"> 											
	<!-- product slider first -->
	<?php 
		$original_post = $post;
		global $post;
		$categories = get_the_category($post->ID);
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> -1, // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);
			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) {
				
				while( $my_query->have_posts() ) {
				$my_query->the_post(); ?>
				<div class="slip_hyegine_slider">  
				   <div class="slider_img_first"> 
					 <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
				   </div> 
				   <div class="rotation_text rotation_text-3"> <span class="blog-date"><?php the_time('m.y'); ?></span>
						<?php $categories = get_the_category();
								if ( ! empty( $categories ) ) {
								echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
						} ?>  
					</div>
					<div class="slider_img_content">
						  <div class="content_Section_of_hormones text-center wt-4"> 
								 <div class="common_heading_of_harmones"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
								 <div class="common_paragaraph_of_harmones pt-4">
									<?php the_excerpt();?>	
								</div>
								 <div class="read_more_button"> <a href="<?php the_permalink(); ?>" class="btn read_more_button_link"> read more </a> </div>
						  </div>
				   </div>
				</div>
				<?php
				}
				
				}
			}
			$post = $original_post;
			wp_reset_query(); 
	?>
						  						  						  
	</div>
</div>		

	<div class="slide_content text-center">
			<div class="slide_direction_key"> 
				 <span class="leftarrow-direction"> </span>
				 <span class="rightarrow-direction"> </span>
			</div>
			<div class="read_more_button"> 
				 <a href="<?php echo site_url();?>/the-kit" class="btn read_more_button_link pd-12"> back to the kit </a> 
		   </div>								
	</div>
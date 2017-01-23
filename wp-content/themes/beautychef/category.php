	<?php
get_header(); ?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo $current_category = single_cat_title("", false); ?></span></h1>
		<div class="blog-cat-container">
			<div class="row clearfix">
				<div class="col-md-3 col-sm-3">	
					<div class="category_Section">
						<h6>Categories:</h6>
						 <ul class="category-sidebar"> 
							<li class="active"><a href="<?php echo site_url();?>/the-kit">all</a></li>
							<?php 
								$get_parent_cats = array(
									'parent' => '0'
								); 
								$all_categories = get_categories( $get_parent_cats ); 
								foreach( $all_categories as $single_category ){
									$catID = $single_category->cat_ID;
									echo '<li><a href="'. get_category_link( $catID ) .'">' . $single_category->name . '</a>'; 
									$get_children_cats = array(
										'child_of' => $catID 
									);
									$child_cats = get_categories( $get_children_cats );
									echo '<ul class="children">';
										foreach( $child_cats as $child_cat ){
											$childID = $child_cat->cat_ID;
											echo '<li><a href="'. get_category_link( $childID ) .'">' . $child_cat->name . '</a></li>';
										}
									echo '</ul></li>';
								} ?>
						</ul>
						<div class="blog-sort-by">	
								<h6> sort by: </h6>
								<?php
									$year_prev = null;
									$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
															YEAR( post_date ) AS year,
															COUNT( id ) as post_count FROM $wpdb->posts
															WHERE post_status = 'publish' and post_date <= now( )
															and post_type = 'post'
															GROUP BY month , year
															ORDER BY post_date DESC");
									foreach($months as $month) :
										$year_current = $month->year;
										if ($year_current != $year_prev){
											if ($year_prev != null){?>
											</ul>
											<?php }} ?>
										<ul class="archive-list">
											<li>
												<a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
													<span class="archive-month"><?php echo date("M", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></span>
													<span class="archive-year"><?php echo date("y", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></span>
												</a>
											</li>
											<li><?php echo $month->year; ?></li>
										<?php $year_prev = $year_current;
										endforeach; ?>
									</ul>
							</div>
					</div>
				</div>
						<div class="col-md-9 col-sm-9">
							<div class="row clearfix">
							 <div class="blog-cat grid">
								<div class="grid-sizers"> </div>
									<?php 
										if ( have_posts() ) :
											
											while ( have_posts() ) : the_post();
											?>
												 <div class="content_image_part grid-items"> 							
													   <div class="separate_content_part"> 
														  <div class="skin_fix"> 
															   <div class="glowing_harmones_images"> 
																   <?php the_post_thumbnail(); ?>
															  <div class="rotation_text"> <span class="blog-date"><?php the_time('m.y'); ?></span> 
															   <?php $categories = get_the_category();
																	if ( ! empty( $categories ) ) {
																		echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
																} ?>    
															</div>
															</div>
														  </div>
														  <div class="content_Section_of_hormones text-center"> 
																 <div class="common_heading_of_harmones"> <?php the_title();?> </div>
																 <div class="common_paragaraph_of_harmones">
																	<?php echo the_excerpt(); ?>	
																</div>
																 <div class="read_more_button"> <a href="<?php the_permalink();?>" class="btn read_more_button_link"> read more </a> </div>
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
					</div>		
					<div class="category-loadmore">
						<?php
							if( get_next_posts_link() ) :
								next_posts_link( 'See more', 0 );
							endif;  
						?>
					</div>
					<div class="paginate">
						<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
					</div>
				</div>
			</div>	
		</div>
<?php 

get_footer();
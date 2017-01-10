<?php
get_header(); ?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
		<div class="press-container">
			<div class="row clearfix">
				<div class="col-md-2 col-sm-2">	
					<div class="press-categories">
						<h6>Categories:</h6>
						<ul class="alt-sub-heading press-cat">
							<li class="active"><a href="<?php echo site_url();?>/press-post">All</a></li>
							<?php 
							$terms = get_terms( array(
								'taxonomy' => 'press_cat',
								'hide_empty' => false,
							) ); 
							foreach($terms as $term){
								$term_get = get_term_link($term);
								echo '<li><a href="'.$term_get.'">'.$term->name.'</a></li>';
							}
							?>
						</ul>
					</div>
				</div>
				<div class="col-md-10 col-sm-10">
					<ul class="press-cat-ul">
					<?php 
							if ( have_posts() ) :
								
								while ( have_posts() ) : the_post();
								$date = get_field('date');
								$article_url = get_field('article_url');
								?>
									<li class="press-box">
										<div class="press-content">
											<div class="press-image">
												<?php the_post_thumbnail('press-img'); ?>
												<div class="cat-name">
													<span class="alt-sub-heading">
													<?php $categories = get_the_terms( $post->ID, 'press_cat' );
														foreach( $categories as $category ) {
															$term_link = get_term_link($category);
															echo '<a href="'.$term_link.'">'.$category->name.'</a>';
														}
													?>
													</span>
												</div>
											</div>
											<h5><?php the_title(); ?><br/>
											<?php echo date("F y", strtotime($date)); ?></h5>
											 <h6 class="alt-sub-heading"><a href="<?php echo $article_url ?>">read article</a></h6>
										</div>
									</li>
								<?php endwhile;
									
													
							else : 
								_e( 'Nothing published so far.');
							endif; 
						wp_reset_query();
						?>
					</ul>
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
	</div>
<?php 

get_footer();
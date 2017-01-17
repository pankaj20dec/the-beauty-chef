<?php
get_header(); ?>
	<div class="container">
		<h1 class="entry-title"><span>International Stockists</span></h1>
		<div class="int-stockists-container">
			<div class="row clearfix">
				<div class="col-md-3 col-sm-3">	
					<div class="int-stockists-categories left-categories">
						<h6>International:</h6>
						<ul class="alt-sub-heading int-stockists-cat">
							<?php 
							$terms = get_terms( array(
								'taxonomy' => 'int_stockists_cat',
								'hide_empty' => false,
							) ); 
							foreach($terms as $term){
								$term_get = get_term_link($term);
								echo '<li><a href="'.$term_get.'">'.$term->name.'</a></li>';
							}
							?>
						</ul>
						<div class="int-stockists-search faq-search">
							<form class="search" action="<?php echo home_url( '/' ); ?>">
								<input type="search" name="s" placeholder="Search">
								<span class="int-stockists-search-button faq-search-button"><input type="submit" value=""></span>
							  <input type="hidden" name="post_type" value="int_stockists">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-9">
					<div class="cat-title">
						<h2><?php single_term_title(); ?></h2>
					</div>
					<ul class="int-stockists-cat-ul col-md-offset-1">
					<?php 
							if ( have_posts() ) :
								
								while ( have_posts() ) : the_post();
								?>
									<li class="int-stockists-box">
										<div class="int-stockists-content">
											<h5><?php the_title(); ?></h5>
											<?php the_content();?>
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
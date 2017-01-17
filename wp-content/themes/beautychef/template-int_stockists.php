<?php 
/*
 * Template Name: International Stockists Page
 */
get_header(); 
?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
		<div class="int-stockists-container">
			<div class="row clearfix">
				<div class="col-md-3 col-sm-3">	
					<div class="int-stockists-categories">
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
					<ul class="int-stockists-ul col-md-offset-1">
					<?php 
						$query = new WP_Query( array(
							 'order'        => 'ASC',
							 'post_type'    => 'int_stockists',
							 'posts_per_page'  => 4,
							 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
						  ));
							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
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
					<?php 
					if (  $query->max_num_pages > 1 ) : ?>
						<div class="view-more-container">
							<ul class="next-prev">
								<li><?php next_posts_link( 'See more', $query->max_num_pages ); ?></li>
							</ul>
						</div>
					<?php endif;
					?>
				</div>
			</div>	
		</div>
	</div>
 
<?php 
	if (function_exists("pagination")) {
		pagination($query->max_num_pages);
	} 
get_footer();
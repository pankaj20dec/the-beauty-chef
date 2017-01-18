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
						<ul class="stockists-toggle">
							<li><a href="<?php echo site_url(); ?>/australian-stockists">Australian</a></li>
							<li class="active"><a href="<?php echo site_url(); ?>/international-stockists">International</a></li>
						</ul>
						<ul class="alt-sub-heading int-stockists-cat">
							
						<?php $term = get_term_by( 'slug', 'international', 'stockists_cat'); 
							$term_id = $term->term_id;
							$taxonomy_name = 'stockists_cat';
							$termchildren = get_term_children( $term_id, $taxonomy_name );
							 
							foreach ( $termchildren as $child ) {
								$term = get_term_by( 'id', $child, $taxonomy_name );
								echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
							}

							?> 
						</ul>
						<div class="int-stockists-search faq-search">
							<form class="search" action="<?php echo home_url( '/' ); ?>">
								<input type="search" name="s" placeholder="Search">
								<span class="int-stockists-search-button faq-search-button"><input type="submit" value=""></span>
							  <input type="hidden" name="post_type" value="stockists">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-9">
					<ul class="int-stockists-ul col-md-offset-1">
					<?php 
					$term = get_term_by( 'slug', 'international', 'stockists_cat'); 
					$term_id = $term->term_id;
						$query = new WP_Query( array(
							 'order'        => 'ASC',
							 'post_type'    => 'stockists',
							 'posts_per_page'  => 35,
							 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
							 'tax_query' => array(
								array(
									'taxonomy' => 'stockists_cat',
									'field' => 'term_id',
									'terms' => $term_id
								)
							)
						  ));
							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
								$ID = $post->ID;
								$company_name = carbon_get_post_meta( $ID, 'crb_company_name' );
								$address = carbon_get_post_meta( $ID, 'crb_company_address' );
								$company_city  	= carbon_get_post_meta( $ID, 'crb_company_city' );
								$company_state = carbon_get_post_meta( $ID, 'crb_company_state' );
								$phone      	= carbon_get_post_meta( $ID, 'crb_company_phone' );
								$company_zipcode= carbon_get_post_meta( $ID, 'crb_company_zipcode' );
								$company_website= carbon_get_post_meta( $ID, 'crb_company_website' );
								
								?>
									<li class="int-stockists-box">
										<div class="int-stockists-content">
											<h5><strong><?php the_title(); ?></strong></h5>
											<p>
											<?php 
											if(!empty($address)){ echo nl2br($address);}
											?>
											</p>
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
<?php
get_header(); ?>
	<div class="container">
		<h1 class="entry-title"><span>International Stockists</span></h1>
		<div class="int-stockists-container">
			<div class="row clearfix">
				<div class="col-md-3 col-sm-3">	
					<div class="int-stockists-categories left-categories">
						<ul class="stockists-toggle">
							<li><a href="<?php echo site_url(); ?>/australian-stockists">Australian</a></li>
							<li class="active"><a href="<?php echo site_url(); ?>/international-stockists">International</a></li>
						</ul>
						<ul class="alt-sub-heading int-stockists-cat">
							<?php 
							$term = get_term_by( 'slug', 'international', 'stockists_cat'); 
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
					<div class="cat-title">
						<h2><?php single_term_title(); ?></h2>
					</div>
					<ul class="int-stockists-cat-ul col-md-offset-1">
					<?php 
							if ( have_posts() ) :
								
								while ( have_posts() ) : the_post();
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
											if(!empty($address)){ echo $address.'</br>';}
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
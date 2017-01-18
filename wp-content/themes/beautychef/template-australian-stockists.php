<?php 
/*
 * Template Name: Australian Stockists Page
 */
get_header(); 
?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
		<div class="aus-stockists-container">
			<div class="row clearfix">
				<div class="col-md-2 col-sm-2">	
					<div class="aus-stockists-categories">
						<ul>
							<li class="active"><a href="<?php echo site_url(); ?>/australian-stockists">Australian</a></li>
							<li><a href="<?php echo site_url(); ?>/international-stockists">International</a></li>
						</ul>						
						<div class="aus-stockists-search faq-search">
							<form class="search" action="<?php echo home_url( '/' ); ?>">
								<input type="search" name="s" placeholder="Search">
								<span class="int-stockists-search-button faq-search-button"><input type="submit" value=""></span>
							  <input type="hidden" name="post_type" value="stockists">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-10 col-sm-10">
					<div class="searchform-wrap text-center">
						<form id="postcodesearch" class="searchform postcodesearch">
								<!--label for="postcode" class="hide-label">Search by postcode:</label-->
								<input type="text" name="name" placeholder="Search by postcode" class="searchfield" id="postcode" name="postcode" required/>
								<button type="submit" value="Search" id="searchsubmit">
									<svg version="1.1" class="icon-search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										width="15px" height="15px" viewBox="0 0 15 15" enable-background="new 0 0 15 15" xml:space="preserve">
										<g>
											<g>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M14.18,12.637l-3.646-3.649c0.574-0.865,0.906-1.901,0.906-3.019
													c0-3.022-2.447-5.474-5.469-5.474C2.949,0.495,0.5,2.946,0.5,5.969c0,3.024,2.449,5.476,5.471,5.476
													c1.115,0,2.15-0.335,3.016-0.908l3.646,3.649c0.213,0.214,0.492,0.319,0.773,0.319c0.279,0,0.559-0.105,0.773-0.319
													C14.607,13.758,14.607,13.064,14.18,12.637z M5.97,9.987c-2.214,0-4.016-1.803-4.016-4.019c0-2.215,1.802-4.018,4.016-4.018
													c2.215,0,4.016,1.803,4.016,4.018C9.986,8.185,8.185,9.987,5.97,9.987z"/>
											</g>
										</g>
									</svg>
								</button>
						</form>
					</div>
					<h6 class="stockists-ttl alt-heading"><strong>Stockists in '<span id="displaypc">2000</span>'</strong></h6>
					<div id="stockistmap" style="height: 300px;" class="stockistmap"></div>
					<?php
					$stockists_country_terms = array();
					$stockists_country_terms[] = get_term_by( "slug", "australian", "stockists_cat");
					?>
					<div class="row switch">
						<div class="col-md-4 columns pull-right">
							<div class="data-stockist-details-wrap">
								<?php
								foreach ($stockists_country_terms as $key => $country_term)
								{	
									
									$term_id 	= trim($country_term->term_id);
									$term_name 	= trim($country_term->name);

									$args = array(
										'numberposts' => -1,
										'posts_per_page' => -1,
										'orderby' => 'post_date',
										'order' => 'DESC',
										'post_type' => 'stockists',
										'post_status' => 'publish',
										'suppress_filters' => true ,
										'tax_query' => array(
											'relation' => 'AND',
											array(
												'taxonomy' => 'stockists_cat',
												'field' => 'term_id',
												'terms' => $term_id
											)
										)
									);
									$loop = new WP_Query( $args );
									if ( $loop->have_posts() ) :
										while ( $loop->have_posts() ) : $loop->the_post();
											$ID         	= $loop->post->ID;
											$Slug         	= $loop->post->post_name;
											$stockist_title	= get_the_title();
											$company_name   = carbon_get_post_meta( $ID, 'crb_company_name' );
											$address    	= carbon_get_post_meta( $ID, 'crb_company_address' );
											$company_city  	= carbon_get_post_meta( $ID, 'crb_company_city' );
											$phone      	= carbon_get_post_meta( $ID, 'crb_company_phone' );
											$company_zipcode= carbon_get_post_meta( $ID, 'crb_company_zipcode' );
											$company_website= carbon_get_post_meta( $ID, 'crb_company_website' );

											$stockist_stocking_terms = wp_get_post_terms($ID, 'stockist_stocking', array("fields" => "names"));
											?>
											<div class="data-stockist-details" data-stockist-id="<?php echo $Slug; ?>">
												<h6 class="alt-heading ttl">
													<strong><?php echo $stockist_title; ?></strong>
												</h6>
												<address><?php echo nl2br($address); ?></address>
												
											</div>
											<?php
										endwhile;
									endif;
									wp_reset_postdata();
								}?>
							</div>
						</div>
						<div class="col-md-8 columns pull-left">
							<div id="stockist-list" class="stockist-list">
								<?php
								$markers = array();
								if ( $loop->have_posts() ) :
									while ( $loop->have_posts() ) : $loop->the_post();
										$ID         	= $loop->post->ID;
										$Slug         	= $loop->post->post_name;
										$stockist_title	= get_the_title();
										$company_name   = carbon_get_post_meta( $ID, 'crb_company_name' );
										$address    	= carbon_get_post_meta( $ID, 'crb_company_address' );
										$company_city  	= carbon_get_post_meta( $ID, 'crb_company_city' );
										$phone      	= carbon_get_post_meta( $ID, 'crb_company_phone' );
										$company_zipcode= carbon_get_post_meta( $ID, 'crb_company_zipcode' );
										$company_website= carbon_get_post_meta( $ID, 'crb_company_website' );
										$company_location = carbon_get_post_meta( $ID, 'crb_company_location','map' );

										$stockist_stocking_terms = wp_get_post_terms($ID, 'stockist_stocking', array("fields" => "names"));
										$markers[] = array("address" => $address, "lat" => $company_location['lat'], "lng" => $company_location['lng'], "slug" => $Slug, "extra" => ""); 
										?>
										<a href="<?php echo get_the_permalink(); ?>" class="data-stockist-btn" data-stockist-id="<?php echo $Slug; ?>" data-lat="<?php echo $company_location['lat'];?>" data-lng="<?php echo $company_location['lng'];?>">
											<span class="ttl">
												<strong><span><?php echo $stockist_title; ?></span></strong>
												<span><?php echo @implode(" + ", $stockist_stocking_terms); ?></span>
											</span>
											<span class="subttl"><?php echo $company_city; ?></span>
											<span class="txt-details">details ></span>
										</a>
										<?php
									endwhile;
								endif;
								wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
<script>
	var themePath = "";
</script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc_v4HXtKL7SsPsrChdZdKXJWQMqFxzi0"></script>
<script>
	var markers = [
		<?php
		foreach ($markers as $key => $markerArr)
		{
			$address = $markerArr['address'];
			$address = preg_replace("/(\/[^>]*>)([^<]*)(<)/","\\1\\3",$address);
			$address = preg_replace("/[\r\n]*/","",$address);
			$address = str_replace(array("\r","\n"),"",$address);
			?>
			["<?php echo $address; ?>", <?php echo $markerArr['lat']; ?>, <?php echo $markerArr['lng']; ?>, "<?php echo $markerArr['slug']; ?>", "<?php echo $markerArr['extra']; ?>"],
			<?php
		}
		?>
		
		];
		</script>
 <script src="<?php echo get_template_directory_uri();?>/assets/js/stockistlocator.js"></script>
<?php 
get_footer();
<?php 
/*
 * Template Name: Press Page
 */
get_header(); 
?>
	<div class="container">
		<h1 class="entry-title"><span><?php echo the_title(); ?></span></h1>
		<div class="press-container">
			<div class="row clearfix">
				<div class="col-md-2 col-sm-2">	
					<div class="press-categories">
						<h6>Categories:</h6>
						<ul class="alt-sub-heading">
							<li class="active"><a href="#">All</a></li>
							<li><a href="#">magazines</a></li>
							<li><a href="#">online</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-10 col-sm-10">
					<ul>
					<?php 
						$query = new WP_Query( array(
							 'order'        => 'ASC',
							 'post_type'    => 'press',
							 'posts_per_page'  => -1
						  ));
							if ( $query->have_posts() ) :
								$i = 1;	
								while ( $query->have_posts() ) : $query->the_post();
								$date = get_field('date');
								$article_url = get_field('article_url');
								?>
									<li class="press-box <?php if($i%3 == 0){ echo "last-press"; }?>">
										<div class="press-content">
											<div class="press-image">
												<?php the_post_thumbnail('press-img'); ?>
												<div class="cat-name">
													<span class="alt-sub-heading">
													<?php $categories = get_the_terms( $post->ID, 'press_cat' );
														foreach( $categories as $category ) {
															echo '<a href="'.$category->slug.'">'.$category->name;'</a>';
														}
													?>
													</span></div>
											</div>
											<h5><?php the_title(); ?><br/>
											<?php echo date("F y", strtotime($date)); ?></h5>
											 <h6 class="alt-sub-heading"><a href="<?php echo $article_url ?>">read article</a></h6>
										</div>
									</li>
								<?php $i++; endwhile;
							else : 
								_e( 'Nothing published so far.');
							endif; 
						wp_reset_query();
						?>
					</ul>
				</div>
			</div>	
		</div>
	</div>
 
<?php get_footer();
<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo beautychef_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header single-post">
		<?php
			if ( is_single() ) {
				the_title( '<h2>', '</h2>' );
				if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						beautychef_posted_on();
						beautychef_entry_footer();
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;
			} else {
				the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			}
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<!--<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php //the_post_thumbnail( 'beautychef-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
				$blog_image_id = get_field('image');
				$size = 'blog-left-img';
				$vartical_size = 'blog-vertical-img';
				$blog_detail_right_content = get_field('blog_detail_right_content');
				$simple_content = get_field('simple_content');
				$layout_simple_content = get_field('layout_simple_content');
				$after_images_simple_content = get_field('after_images_simple_content');
			
				
			?>
			<?php if(!empty($blog_image_id['sizes'][$size]) && !empty($blog_detail_right_content && !empty($simple_content))){ ?>
				<div class="row clearfix layout-one">
					<div class="col-md-6 col-sm-6">
						<div class="post-image">
						   <img src="<?php echo $blog_image_id['sizes'][$size]; ?>" alt="<?php the_title();?>" />	
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="post-right-content">
							<?php echo $blog_detail_right_content; ?>
						</div>
					</div>	
				</div>
				<div class="simple-content">
					<?php echo $simple_content; ?>
				</div>
			<?php }else if(!empty($layout_simple_content) && !empty($after_images_simple_content)){ ?>
			<div class="layout-two">
				<div class="above-content">
					<?php echo $layout_simple_content; ?>
				</div>
				<div class="images">
					<ul>
						<?php 
							if( have_rows('blog_detail_left_right_images') ):

						while ( have_rows('blog_detail_left_right_images') ) : the_row();

							// Your loop code
							$image = get_sub_field('image');
							?>
							<li>
								<img src="<?php echo $image['url'];?>" alt="<?php the_title(); ?>" />
							</li>
							<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</ul>	
				</div>
				<div class="below-content">
					<?php echo $after_images_simple_content; ?>
				</div>
			</div>
			<?php }else{ ?>
			<?php 			
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'beautychef' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'beautychef' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			
		?>
		<?php }?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

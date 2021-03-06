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
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h2>', '</h2>' );
				if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta">';
					if ( is_single() ) :
						beautychef_posted_on();
						beautychef_entry_footer();
					else :
						echo beautychef_time_link();
						beautychef_edit_link();
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
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php beautychef_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->

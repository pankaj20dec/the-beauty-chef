<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
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

	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
					echo beautychef_time_link();
					beautychef_edit_link();
				?>
			</div><!-- .entry-meta -->
		<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
			<div class="entry-meta">
				<?php beautychef_edit_link(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h5 class=""><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->

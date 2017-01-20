<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container single-page">
				<div class="row clearfix">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/single-post', get_post_format() );
							
							?>
								<div class="share">Share </div>
							<?php 
							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'beautychef' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'beautychef' ) . '</span>',
							) );
							
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							
								
						endwhile; // End of the loop.
						include(get_template_directory() . "/template-parts/post/related-posts.php");
					?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();

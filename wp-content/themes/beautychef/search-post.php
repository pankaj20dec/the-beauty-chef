<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Beauty_chef
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12">	
				<header class="page-header">
					<?php if ( have_posts() ) : ?>
						<h4 class="page-title"><?php printf( __( 'Search Results for: %s', 'beautychef' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
					<?php else : ?>
						<h1 class="page-title"><?php _e( 'Nothing Found', 'beautychef' ); ?></h1>
					<?php endif; ?>
				</header><!-- .page-header -->

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/post/content', 'excerpt' );

							endwhile; // End of the loop.

							the_posts_pagination( array(
								'prev_text' => beautychef_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'beautychef' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'beautychef' ) . '</span>' . beautychef_get_svg( array( 'icon' => 'arrow-right' ) ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'beautychef' ) . ' </span>',
							) );

						else : ?>

							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'beautychef' ); ?></p>
							<?php
								

						endif;
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>	
</div><!-- .wrap -->

<?php get_footer();

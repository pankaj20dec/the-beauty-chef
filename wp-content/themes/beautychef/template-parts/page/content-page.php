<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */
$sub_heading = get_field('sub_heading');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><span><?php if($sub_heading){echo $sub_heading;}else{the_title();} ?></span></h1>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

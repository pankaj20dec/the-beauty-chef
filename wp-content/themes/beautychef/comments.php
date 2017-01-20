<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beauty_Chef
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'beautychef' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'beautychef'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>
		<h2>Comments</h2>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => beautychef_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'beautychef' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => beautychef_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'beautychef' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'beautychef' ) . '</span>' . beautychef_get_svg( array( 'icon' => 'arrow-right' ) ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'beautychef' ); ?></p>
	<?php
	endif;
	?>
<div class="row clearfix">
	<div class="col-md-6">
		<?php
			$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );

				$comments_args = array(
					// change the title of send button
					'label_submit'=>'Submit',
					// change the title of the reply section
					'title_reply'=>'Leave Comment',
					// remove "Text or HTML to be displayed after the set of comment fields"
					//'comment_notes_after' => '<p><small>Your comment may be subject to editorial review.</small></p>',
					// redefine your own textarea (the comment body)
					'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="Comment" class="form-control" rows="7" cols="37" wrap="hard"></textarea></p>',
					'fields' => apply_filters( 'comment_form_default_fields', array(

					'author' =>
					  '<p class="comment-form-author">' .
					  '<input id="author" class="form-control" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					  '" size="30"' . $aria_req . ' required="required"/>' . ( $req ? '<span style="color:red" class="required">*</span>' : '' ) . '</p>',

					'email' =>
					  '<p class="comment-form-email">' .
					  '<input id="email" class="form-control" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					  '" size="30"' . $aria_req . ' required="required" />' . ( $req ? '<span style="color:red" class="required">*</span>' : '' ) . '</p>',
					  
					'subject' => '<p class="comment-form-subject">' . '<input id="subject" class="form-control" placeholder="Subject" name="subject" type="text" value="' . esc_attr($commenter['comment_author_subject']) . '" size="30" /></p>',
					
					'url' =>
					  '<p class="comment-form-url">' .
					  '<input id="url" class="form-control" placeholder="Website" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
					  '" size="30" /></p>'
					)
				  ),
				);
				comment_form($comments_args);
			?>
		</div>
	</div>
</div><!-- #comments -->

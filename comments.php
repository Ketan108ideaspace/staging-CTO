<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
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

	<?php if ( have_comments() ) : ?>
		<h2><?php $comments_count = wp_count_comments( $post->ID ); echo $comments_count->total_comments; ?> COMMENTS</h2>
		<?php the_comments_navigation(); ?>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ul><!-- .comment-list -->
		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<div>
	<?php
		comment_form( array(
			'comment_notes_before' => '',
			'title_reply' => '',
			
			'fields' => apply_filters( 'comment_form_default_fields', array(
				
			'author' => '<div class="comment-name">' .
				'<input id="author" name="author" maxlength="20" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' placeholder="Your Name *" /></div>',

			'email' => '<div class="comment-email">' .
				'<input id="email" name="email" maxlength="50" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="35"' . $aria_req . ' placeholder="Email Address *" />'.'</div>',

			'url' => '<div class="comment-website">' .
				'<input id="url" name="url" maxlength="50" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="35"' . $aria_req . ' placeholder="Website" />'.'</div>',
				) ),
				
			'comment_field' => '<div>' .
				'<textarea id="comment" name="comment" placeholder="Your comment *" aria-required="true"></textarea>' .
				'</div>',
			'class_submit' => '',
			'label_submit'=>'Send Comment',
			'logged_in_as' => ''

		) );
	?>
	</div>
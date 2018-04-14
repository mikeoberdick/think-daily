<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package understrap
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

<div class="comments-area" id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-above">
				
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'understrap' ); ?></h1>
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'understrap' ) ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'understrap' ) ); ?></div>
				<?php } ?>

			</nav><!-- #comment-nav-above -->

		<?php endif; // check for comment navigation. ?>
		
		<div class="commentlist">
			<?php wp_list_comments( 'style=div&type=comment&callback=d4tw_comments' ); ?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-below">
				
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'understrap' ); ?></h1>
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
					'understrap' ) ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;',
					'understrap' ) ); ?></div>
				<?php } ?>

			</nav><!-- #comment-nav-below -->
			
		<?php endif; // check for comment navigation. ?>

	<?php endif; // endif have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'understrap' ); ?></p>

	<?php endif; ?>

	<?php
	$comments_args = array(
        // change the title of the reply section
        'title_reply'=>'Leave a Comment',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    );

    comment_form($comments_args); // Render comments form. ?>

</div><!-- #comments -->

<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package numbat
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'numbat' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'numbat' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'numbat' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<div class="comment-list comments-area numbat_comments comments">
			<h2 class="heading-bottom">
				<?php
					printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'numbat' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h2>
			
			<?php wp_list_comments( 'type=comment&callback=numbat_custom_comments' ); ?>

			<?php if ( numbat_post_has( 'pings', get_the_ID() ) ) { ?>
				<!-- PINGBACKS and TRACEBACKS -->
				<div class="comments-pingbacks-tracebacks">
					<h2 class="heading-bottom">
						<?php
							echo esc_html__('Pingbacks & Tracebacks', 'numbat');
						?>
					</h2>
					<?php wp_list_comments( array('type'=> 'pingback') ); ?>
				</div>
			<?php } ?>
		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'numbat' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'numbat' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'numbat' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'numbat' ); ?></p>
	<?php endif; ?>

	<?php 
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => esc_html__( 'Leave a comment', 'numbat' ),
			'title_reply_to'    => esc_html__( 'Leave a reply to %s', 'numbat' ),
			'cancel_reply_link' => esc_html__( 'Cancel reply', 'numbat' ),
			'label_submit'      => esc_html__( 'Post comment', 'numbat' ),

			'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'numbat' ) .
				'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
				'</textarea></p>',

			'must_log_in' => '<p class="must-log-in">' .
				sprintf(
					esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.', 'numbat' ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',

			'must_log_in' => '<p class="must-log-in">' .
				sprintf(
					esc_html__( 'You must be ','numbat') . '<a href="%s">'.esc_html__('logged in','numbat').'</a>' . esc_html__('to post a comment.', 'numbat' ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',

			'comment_notes_before' => 
			'<p class="comment-notes">' . esc_html__( '', 'numbat' ) . '</p>',

		    'comment_field' =>
		    	'<div class="col-md-6 form-comment">' .
		    	'<p class="comment-form-author relative">' .
		    	'<textarea cols="45" rows="5" aria-required="true" placeholder="' . esc_html__( 'Your comment', 'numbat' ) . '" name="comment" id="comment"></textarea></div>',

			'fields' => apply_filters( 'comment_form_default_fields', array(
			    'author' =>
			    	'<div class="col-md-6 form-fields">' .
			    	'<p class="comment-form-author relative">' .
			    	'<input class="focus-me" placeholder="' . esc_html__( 'Your name', 'numbat' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			    	'" size="30" /><i class="fa fa-user absolute"></i></p>',
			    'email' =>
			    	'<p class="comment-form-author relative">' .
			    	'<input class="focus-me" placeholder="' . esc_html__( 'Your email', 'numbat' ) . '" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			    	'" size="30" /><i class="fa fa-envelope absolute"></i></p>',
			    'url' =>
			    	'<p class="comment-form-author relative">' .
			    	'<input class="focus-me" placeholder="' . esc_html__( 'Your website', 'numbat' ) . '" id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) .
			    	'" size="30" /><i class="fa fa-comments absolute"></i></p></div>'
			)
		  ),
		);
		 
		comment_form($args);
	?>

</div>
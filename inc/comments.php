<?php

function d4tw_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>

    <div class="comment-author vcard"><?php
            printf( __( '<div class="fn">%s</div>' ), get_comment_author() ); ?>
        </div>

		<?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
        <div class="comment-meta commentmetadata">
            <?php printf( _x( '%s ago', '%s = human-readable time difference', 'understrap' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
        </div>

        <?php comment_text(); ?>
<?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}
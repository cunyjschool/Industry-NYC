<?php
function newsport_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-author vcard">
			<?php echo get_avatar($comment,$size='40',$default=$myavatar ); ?>

			<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
     
			<?php if ($comment->comment_approved == '0') : ?>
             <em><?php _e('Your comment is awaiting moderation.') ?></em>
             <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata">Commented on <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__(' | Edit'),'  ','') ?>
 | <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
    </div>
	<?php comment_text() ?>

     </div>
<?php
}
?>
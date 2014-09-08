<div class="media-body">
    <h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>
    <?php edit_comment_link(__('(Edit)', 'roots'), '', ''); ?>

    <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
            <?php _e('Your comment is awaiting moderation.', 'roots'); ?>
        </div>
    <?php endif; ?>

    <?php comment_text(); ?>
    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

<?php
/**
 * Display next/previous post. This would work in a singular page such as single.php.
 *
 * The code below was copied from TwentyTwenty theme.
 * 
 * @package bootstrap-basic4
 * @since 1.2.6
 */


$next_post = get_next_post();
$prev_post = get_previous_post();

$author_id_next = $next_post->post_author;
$author_id_prev = $prev_post->post_author;

if ($next_post || $prev_post) {

	$pagination_classes = '';

	if ( ! $next_post ) {
            $pagination_classes = ' only-one only-prev';
	} elseif ( ! $prev_post ) {
            $pagination_classes = ' only-one only-next';
	}

    ?> 
    <nav class="pagination-single section-inner<?php echo esc_attr( $pagination_classes ); ?>" aria-label="<?php esc_attr_e('Post', 'bootstrap-basic4'); ?>" role="navigation">
        <ul class="pagination justify-content-between">
            <?php if ($prev_post) { ?> 
            <li class="post-item">
              <span><?php _e('Previous post', 'teslatradeltd'); ?></span>
              <a class="previous-post post-link" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                <img src="<?= get_the_post_thumbnail_url($prev_post->ID,'full'); ?>" alt="<?php echo wp_kses_post(get_the_title($prev_post->ID)); ?>">
                <div class="infromtion">
                  <time datetime="<?php echo get_the_date('c', $prev_post->ID); ?>" itemprop="datePublished"><?php echo get_the_date('M d, Y', $prev_post->ID); ?></time>
                  <span><?php _e('by', 'teslatradeltd'); ?> <?php the_author_meta( 'user_nicename' , $author_id_prev ); ?> </span>
                </div>
                <p><?php echo wp_kses_post(get_the_title($prev_post->ID)); ?></p>
              </a>
            </li>
            <?php
            }// endif; $prev_post

            if ($next_post) {
            ?> 
            <li class="post-item">
              <span><?php _e('Next post', 'teslatradeltd'); ?></span>
              <a class="next-post post-link" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                <img src="<?= get_the_post_thumbnail_url($next_post->ID,'full'); ?>" alt="<?php echo wp_kses_post(get_the_title($next_post->ID)); ?>">
                <div class="infromtion">
                  <time datetime="<?php echo get_the_date('c', $next_post->ID); ?>" itemprop="datePublished"><?php echo get_the_date('M d, Y', $next_post->ID); ?></time>
                  <span><?php _e('by', 'teslatradeltd'); ?> <?php the_author_meta( 'user_nicename' , $author_id_next ); ?> </span>
                </div>                  
                <p><?php echo wp_kses_post(get_the_title($next_post->ID)); ?></p>
              </a>
            </li>
            <?php }// endif; $next_post ?> 
        </ul>
    </nav><!-- .pagination-single -->
    <?php
}

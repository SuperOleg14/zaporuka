Більше дописів
<div class="related-posts__content gallery-slider">

    <?php
    $current_post_id = get_the_ID();
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'post__not_in' => array($current_post_id),
    );

    $query = new WP_Query($args);

    if ($query -> have_posts()) :
        while ( $query -> have_posts()) : $query -> the_post(); ?>

            <article id="post-<?php the_ID(); ?>" class="single-post__item d-flex --dir-col --just-space --align-stretch --basis-3">
                <a href="<?php the_permalink() ?>" class="single-post__item_link"></a>
                <div class="single-post__item_photo d-flex --jc-center --align-center">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post__content_photo">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="single-post__item_title">
                    <?php the_title(); ?>
                </div>
                <div class="single-post__item_date">
                    <?php echo get_the_date( 'F j, Y' ); ?>
                </div>
            </article>
        <?php endwhile;
        wp_reset_postdata();
    endif; ?>
</div>

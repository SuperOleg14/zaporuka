<div class="news-grid">
    <?php
    $standartPost = array_merge(
        [
            'post_type' => 'post',
            'orderby' => 'date',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => -1,
        ],
        $args['var_name'] ?? []
    );

    $loopPost = new WP_Query( $standartPost );
    ?>
    <?php if ($loopPost -> have_posts()) :
        while ($loopPost -> have_posts()) : $loopPost -> the_post(); ?>
            <a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" class="item">
<!--                <a href="--><?php //the_permalink() ?><!--" class="item-link"></a>-->
                <div class="item-title"><?php the_title(); ?></div>
                <div class="item-text">
                    <?php
                    $excerpt = get_the_excerpt();
                    $short_excerpt = custom_short_excerpt($excerpt, 7);
                    echo $short_excerpt;
                    ?>
                </div>
                <div class="item-date">
                    <?php echo get_the_date('m.d.Y'); ?>
                </div>
            </a>
        <?php endwhile;
        wp_reset_postdata();
    endif; ?>
</div>

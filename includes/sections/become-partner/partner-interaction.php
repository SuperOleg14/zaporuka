<div class="latest-news m-150">
    <div class="container">
        <h2 class="title">Партнерська взаємодія</h2>
        <div class="post__block d-flex --just-space f-wrap">
            <?php if( $partner_interaction_state = get_sub_field('partner_interaction_state') ): ?>
                <?php foreach( $partner_interaction_state as $post ): setup_postdata($post); ?>
                    <article id="post-<?php the_ID(); ?>" class="single-post__item --basis-4">
                        <a href="<?php the_permalink(); ?>" class="single-post__item_link"></a>
                        <div class="single-post__item_photo d-flex --jc-center --align-center">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post__content_photo">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="single-post__item--info">
                            <div class="single-post__item_title">
                                <?php the_title(); ?>
                            </div>
                            <div class="single-post__item_date">
                                <?php echo get_the_date( 'F j, Y' ); ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

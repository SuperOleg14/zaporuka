<div class="latest-news m-150">
    <div class="container">
        <h2 class="title">Новини волонтерської діяльності</h2>
        <div class="post__block d-flex --just-space f-wrap">
            <?php if( $news_volunteer = get_sub_field('news_volunteer_state') ): ?>
                <?php foreach( $news_volunteer as $post ): setup_postdata($post); ?>
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
        <?php $newsVolunteerLink = get_sub_field('news_volunteer_link'); ?>
        <?php if ( $newsVolunteerLink ): ?>
            <a href="<?php echo esc_url( $newsVolunteerLink['url']) ?>" class="btn btn-transparent btn-content">
                Показати більше
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M18 6L10 14L2 6" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>
</div>

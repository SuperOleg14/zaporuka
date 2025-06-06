<div class="history-heroes m-150">
    <div class="container">
        <div class="history-heroes__content d-flex --just-space f-wrap">
            <div class="history-heroes__content_info">
                <?php echo get_sub_field( 'history_heroes_info'); ?>
            </div>
            <div class="history-heroes__content_block">
                <?php if ( have_rows( 'history_heroes_block') ): ?>
                    <?php while ( have_rows( 'history_heroes_block') ) : the_row(); ?>
                        <div class="history-heroes__content_block--item">
                            <div class="history-heroes__content_block--photo">
                                <img src="<?php echo get_sub_field('history_heroes_block_photo') ?>"/>
                            </div>
                            <div class="history-heroes__content_block--container">
                                <div class="history-heroes__content_block--text">
                                    <?php echo get_sub_field( 'history_heroes_block_text'); ?>
                                </div>
                                <?php $historyHeroesBlockUrl = get_sub_field('history_heroes_block_url'); ?>
                                <?php if ( $historyHeroesBlockUrl ): ?>
                                    <a class="history-heroes__content_block--link" href="<?php echo esc_attr(get_sub_field('block_video_url')); ?>" target="_blank">
                                        Детальніше
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="history-heroes m-150">
    <div class="container">
        <div class="history-heroes__content d-flex --just-space f-wrap">
            <div class="history-heroes__content_info">
                <?php echo get_sub_field( 'heroes_info'); ?>
            </div>
            <div class="history-heroes__content_block">
                <?php if ( have_rows( 'heroes_block') ): ?>
                    <?php while ( have_rows( 'heroes_block') ) : the_row(); ?>
                        <div class="history-heroes__content_block--item">
                            <div class="history-heroes__content_block--photo">
                                <img src="<?php echo get_sub_field('heroes_block_photo') ?>"/>
                            </div>
                            <div class="history-heroes__content_block--container">
                                <div class="history-heroes__content_block--title">
                                    <?php echo get_sub_field( 'heroes_block_title'); ?>
                                </div>
                                <div class="history-heroes__content_block--text strong">
                                    <?php echo get_sub_field( 'heroes_block_text'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

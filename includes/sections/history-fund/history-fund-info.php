<div class="history-fund-info">
    <div class="history-fund__block">
        <?php if ( have_rows( 'history_fund_block' ) ): ?>
            <?php while ( have_rows( 'history_fund_block' ) ) : the_row(); ?>
                <div class="history-fund__block_item m-150 <?php echo get_sub_field('history_fund_block_gray') ? 'item-gray' : ''; ?>">
                    <div class="container">
                        <?php if ( have_rows( 'history_fund_block_item' ) ): ?>
                            <?php while ( have_rows( 'history_fund_block_item' ) ) : the_row(); ?>
                                <div class="history-fund__block_subitem d-flex --just-space f-wrap">
                                    <div class="history-fund__block_title">
                                        <?php if (get_sub_field('history_fund_block_item_icon')) : ?>
                                            <div class="history-fund__block_icon visible-mob">
                                                <?php echo get_sub_field( 'history_fund_block_item_icon'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <h2 class="title">
                                            <?php echo get_sub_field( 'history_fund_block_item_title'); ?>
                                        </h2>
                                        <?php if (get_sub_field('history_fund_block_item_photo')) : ?>
                                            <div class="history-fund__block_image visible-desktop">
                                                <img src="<?php echo get_sub_field('history_fund_block_item_photo') ?>"/>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="history-fund__block_text">
                                        <?php echo get_sub_field( 'history_fund_block_item_text'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

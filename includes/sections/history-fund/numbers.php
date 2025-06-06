<div class="numbers mb-150">
    <div class="container">
        <div class="numbers__content d-flex --just-space f-wrap">
            <h2 class="title"><?php echo get_sub_field( 'numbers_title'); ?></h2>
            <div class="numbers__content_info">
                <?php echo get_sub_field( 'numbers_info'); ?>
                <div class="numbers__content_text">
                    <?php echo get_sub_field( 'numbers_text'); ?>
                </div>
                <div class="numbers__content_block d-flex --just-space f-wrap">
                    <?php if ( have_rows( 'numbers_block' ) ): ?>
                        <?php while ( have_rows( 'numbers_block' ) ) : the_row(); ?>
                            <div class="numbers__content_block--item --basis-2">
                                <span>
                                    <?php echo get_sub_field( 'numbers_block_title'); ?>
                                </span>
                                <?php echo get_sub_field( 'numbers_block_text'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

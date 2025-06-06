<div class="guarantee m-150">
    <div class="container">
        <div class="guarantee__content grey-block">
            <h2 class="title"><?php echo get_sub_field( 'guarantee_title'); ?></h2>
            <div class="guarantee__content_info d-flex --just-space f-wrap">
                <?php if ( have_rows( 'guarantee_info' ) ): ?>
                    <?php while ( have_rows( 'guarantee_info' ) ) : the_row(); ?>
                        <div class="guarantee__content_info--item --basis-3">
                            <div class="guarantee__content_info--icon">
                                <?php echo get_sub_field( 'guarantee_info_icon'); ?>
                            </div>
                            <div class="guarantee__content_info--title">
                                <?php echo get_sub_field( 'guarantee_info_title'); ?>
                            </div>
                            <div class="guarantee__content_info--text">
                                <?php echo get_sub_field( 'guarantee_info_text'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="need activity m-150">
    <div class="container">
        <div class="need__content d-flex --just-space f-wrap">
            <div class="need__content_info">
                <h2 class="title">
                    <?php echo get_sub_field( 'activity_title'); ?>
                </h2>
                <?php if (get_sub_field( 'activity_text')) : ?>
                    <div class="text">
                        <?php echo get_sub_field( 'activity_text'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="need__content_block d-flex --just-space --align-stretch f-wrap">
                <?php if ( have_rows( 'activity_content') ): ?>
                    <?php while ( have_rows( 'activity_content') ) : the_row(); ?>
                        <div class="need__content_block--item --basis-2">
                            <div class="d-flex --align-center">
                                <?php echo get_sub_field( 'activity_content_icon'); ?>
                                <div class="need__content_block--title">
                                    <?php echo get_sub_field( 'activity_content_title'); ?>
                                </div>
                            </div>
                            <div class="need__content_block--text">
                                <?php echo get_sub_field( 'activity_content_text'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

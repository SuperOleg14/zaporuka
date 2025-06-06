<div class="info">
    <div class="container">
        <div class="result__content d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'info_content') ): ?>
                <?php while ( have_rows( 'info_content') ) : the_row(); ?>
                    <div class="about-volunteering__content_item --basis-3">
                        <div class="d-flex --align-center">
                            <?php echo get_sub_field( 'info_content_icon'); ?>
                            <div class="about-volunteering__content_title">
                                <?php echo get_sub_field( 'info_content_title'); ?>
                            </div>
                        </div>
                        <div class="about-volunteering__content_text">
                            <?php echo get_sub_field( 'info_content_text'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

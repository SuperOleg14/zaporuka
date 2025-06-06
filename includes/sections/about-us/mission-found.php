<div class="mission-found m-150">
    <div class="container">
        <div class="mission-found__content d-flex --just-space f-wrap">
            <h2 class="title"><?php echo get_sub_field( 'mission_found_title'); ?></h2>
            <div class="mission-found__block">
                <?php if ( have_rows( 'mission_found_content') ): ?>
                    <?php while ( have_rows( 'mission_found_content') ) : the_row(); ?>
                        <div class="mission-found__block_item d-flex --just-space --align-center">
                            <div class="text">
                                <?php echo get_sub_field( 'mission_found_content_text'); ?>
                            </div>
                            <div class="mission-found__block_icon">
                                <?php echo get_sub_field( 'mission_found_content_icon'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

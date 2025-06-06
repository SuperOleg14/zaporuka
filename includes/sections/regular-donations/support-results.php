<div class="support-results m-150">
    <div class="container">
        <h2 class="title --text-align">
            <?php echo get_sub_field( 'support_results_title' ); ?>
        </h2>
        <div class="support-results__content d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'support_results_content' ) ): ?>
                <?php while ( have_rows( 'support_results_content' ) ) : the_row(); ?>
                    <div class="support-results__content_item d-flex --just-space --align-center">
                        <div class="support-results__content_text">
                            <?php echo get_sub_field( 'support_results_content_text' ); ?>
                        </div>
                        <div class="support-results__content_icon">
                            <?php echo get_sub_field( 'support_results_content_icon' ); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

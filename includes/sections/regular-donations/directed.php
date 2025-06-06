<div class="directed m-150">
    <div class="container">
        <h2 class="title --text-align">
            <?php echo get_sub_field( 'directed_title' ); ?>
        </h2>
        <div class="directed__content d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'directed_content' ) ): ?>
                <?php while ( have_rows( 'directed_content' ) ) : the_row(); ?>
                    <div class="directed__content_item --basis-3">
                        <div class="directed__content_icon">
                            <?php echo get_sub_field( 'directed_content_icon' ); ?>
                        </div>
                        <div class="small-title">
                            <?php echo get_sub_field( 'directed_content_title' ); ?>
                        </div>
                        <div class="text">
                            <?php echo get_sub_field( 'directed_content_text' ); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

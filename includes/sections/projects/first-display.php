<div class="first-display">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-display__content d-flex --just-space">
            <div class="first-display__info">
                <h1 class="main-title">
                    <?php echo get_sub_field( 'first_screen_title'); ?>
                </h1>
                <div class="first-display__text">
                    <?php echo get_sub_field( 'first_screen_text'); ?>
                </div>
            </div>
            <div class="first-display__block d-flex --align-stretch">
                <?php if ( have_rows( 'first_screen_block') ): ?>
                    <?php while ( have_rows( 'first_screen_block') ) : the_row(); ?>
                        <div class="first-display__block_item">
                            <div class="first-display__block_title">
                                <?php echo get_sub_field( 'first_screen_block_title'); ?>
                            </div>
                            <div class="text">
                                <?php echo get_sub_field( 'first_screen_block_text'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="first-display__image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="first-display mb-150">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <?php if (has_post_thumbnail()) : ?>
            <div class="first-display__image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <h2 class="main-title"><?php echo get_sub_field( 'our_team_title'); ?></h2>
        <div class="text"><?php echo get_sub_field( 'our_team_text'); ?></div>
        <div class="first-display__content d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'our_team_content') ): ?>
                <?php while ( have_rows( 'our_team_content') ) : the_row(); ?>
                    <div class="first-display__content_item --basis-4">
                        <div class="d-flex --align-center">
                            <?php echo get_sub_field( 'our_team_content_icon'); ?>
                            <div class="first-display__content_title">
                                <?php echo get_sub_field( 'our_team_content_title'); ?>
                            </div>
                        </div>
                        <div class="text">
                            <?php echo get_sub_field( 'our_team_content_text'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

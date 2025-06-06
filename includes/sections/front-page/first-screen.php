<div class="first-screen">
    <div class="container">
        <div class="first-screen__content">
            <?php if (has_post_thumbnail()) : ?>
                <div class="image">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <div class="text-content">
                <h1 class="main-title">
                    <?php echo get_sub_field( 'first_screen_title' ); ?>
                </h1>
                <div class="text">
                    <?php echo get_sub_field( 'first_screen_text' ); ?>
                </div>
            </div>
            <?php get_template_part('includes/modules/first-screen-form'); ?>
        </div>
    </div>
</div>

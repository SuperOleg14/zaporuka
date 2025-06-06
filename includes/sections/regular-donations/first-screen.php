<div class="first-screen">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-screen__content">
            <div class="image">
                <img src="<?php echo get_sub_field('first_screen_photo') ?>"/>
            </div>
            <div class="text-content">
                <h1 class="main-title"><?php echo get_sub_field( 'first_screen_title'); ?></h1>
                <div class="text"><?php echo get_sub_field( 'first_screen_text'); ?></div>
            </div>
            <?php get_template_part('includes/modules/first-screen-form'); ?>
        </div>
    </div>
</div>
<?php

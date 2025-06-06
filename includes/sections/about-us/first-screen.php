<div class="first-screen">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-screen__content d-flex --just-space">
            <div class="first-screen__content_info">
                <?php echo get_sub_field( 'first_screen_info'); ?>
                <div class="first-screen__content_links d-flex --align-center">
                    <a href="https://www.facebook.com/Zaporuka" class="link" target="_blank"></a>
                    <a href="https://www.instagram.com/zaporuka/" class="link inst" target="_blank"></a>
                    <a href="https://www.linkedin.com/company/charitable-foundation-zaporuka/ " class="link ln" target="_blank"></a>
                </div>
            </div>
            <div class="first-screen__content_video">
                <iframe width="100%" height="420" src="<?php echo esc_attr(get_sub_field('first_screen_video')); ?>" title="Благодійний фонд “Запорука”" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

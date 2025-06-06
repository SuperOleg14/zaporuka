<div class="first-screen">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-screen__content">
            <div class="image">
                <img src="<?php echo get_sub_field('first_screen_photo') ?>"/>
            </div>
            <div class="text-content">
                <?php echo get_sub_field( 'first_screen_info'); ?>
                <?php if (is_page_template('pages/page-history-fund.php')): ?>
                    <a href="<?php echo home_url('/dopomohti/'); ?>" class="btn btn-content">
                        Підтримати
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

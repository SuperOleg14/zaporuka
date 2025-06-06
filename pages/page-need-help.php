<?php /* Template Name: Page Need Help */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_need_help')) {
        while (have_rows('page_flexible_need_help')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/need-help/first-screen',
                    'result' => 'includes/sections/about-us/result',
                    'hospitals' => 'includes/sections/need-help/hospitals',
                    'info_block' => 'includes/sections/need-help/info-block-slider',
                    'guarantee' => 'includes/sections/need-help/guarantee',
                    'contacts' => 'includes/sections/need-help/contacts',
                    'seo_block' => 'includes/modules/seo-block',
                    default => '',
                },
            );
        }
    }
    ?>
</div>

<?php get_footer(); ?>

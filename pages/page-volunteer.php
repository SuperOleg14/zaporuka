<?php /* Template Name: Page Volunteer */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_volunteer')) {
        while (have_rows('page_flexible_volunteer')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/volunteer/first-display',
                    'join_volunteer' => 'includes/sections/volunteer/join-volunteer',
                    'join' => 'includes/sections/team/join',
                    'third_block' => 'includes/modules/third-block',
                    'about_volunteering' => 'includes/modules/about-volunteering',
                    'current_fees' => 'includes/modules/current-fees',
                    'news_volunteer' => 'includes/sections/volunteer/news-volunteer',
                    'block_subscribe' => 'includes/sections/blog/block-subscribe',
                    'faq' => 'includes/modules/faq',
                    'block_report' => 'includes/modules/block-report',
                    'seo_block' => 'includes/modules/seo-block',
                    default => '',
                },
            );
        }
    }
    ?>
</div>

<?php get_footer(); ?>

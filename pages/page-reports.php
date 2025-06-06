<?php /* Template Name: Page Reports */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_reports')) {
        while (have_rows('page_flexible_reports')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_display' => 'includes/sections/reports/first-display',
                    'all_reports' => 'includes/sections/reports/all-reports',
                    'block_report' => 'includes/modules/block-report',
                    'our_partners' => 'includes/modules/our-partners',
                    'latest_news' => 'includes/modules/latest-news',
                    'current_fees' => 'includes/modules/current-fees',
                    'donation_module' => 'includes/modules/donation-module',
                    'join' => 'includes/sections/team/join',
                    'about_volunteering' => 'includes/modules/about-volunteering',
                    'media' => 'includes/modules/media',
                    'seo_block' => 'includes/modules/seo-block',
                    default => '',
                },
            );
        }
    }
    ?>
</div>

<?php get_footer(); ?>

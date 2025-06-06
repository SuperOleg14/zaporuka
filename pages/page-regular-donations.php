<?php /* Template Name: Page Regular Donations */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_regular_donations')) {
        while (have_rows('page_flexible_regular_donations')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/regular-donations/first-screen',
                    'info' => 'includes/sections/regular-donations/info',
                    'important' => 'includes/sections/regular-donations/important',
                    'support_results' => 'includes/sections/regular-donations/support-results',
                    'friends' => 'includes/sections/regular-donations/friends',
                    'directed' => 'includes/sections/regular-donations/directed',
                    'children' => 'includes/modules/children',
                    'block_report' => 'includes/modules/block-report',
                    'donation_module' => 'includes/modules/donation-module',
                    'faq' => 'includes/modules/faq',
                    'seo_block' => 'includes/modules/seo-block',
                    default => '',
                },
            );
        }
    }
    ?>
</div>

<?php get_footer(); ?>

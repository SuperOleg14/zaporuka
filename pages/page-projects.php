<?php /* Template Name: Page Projects */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_projects')) {
        while (have_rows('page_flexible_projects')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/projects/first-display',
                    'areas_activity' => 'includes/modules/areas-activity',
                    'current_fees_project' => 'includes/modules/current-fees-project',
                    'donation_module' => 'includes/modules/donation-module',
                    'join' => 'includes/sections/team/join',
                    'our_partners' => 'includes/modules/our-partners',
                    'about_volunteering' => 'includes/modules/about-volunteering',
                    'block_report' => 'includes/modules/block-report',
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

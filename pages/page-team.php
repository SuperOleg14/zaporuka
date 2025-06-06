<?php /* Template Name: Page Team */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_team')) {
        while (have_rows('page_flexible_team')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/team/first-display',
                    'team_department' => 'includes/sections/team/team-department',
                    'donation_module' => 'includes/modules/donation-module',
                    'join' => 'includes/sections/team/join',
                    'our_partners' => 'includes/modules/our-partners',
                    'latest_news' => 'includes/modules/latest-news',
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

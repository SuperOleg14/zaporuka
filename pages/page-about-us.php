<?php /* Template Name: Page About Us */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_about_us')) {
        while (have_rows('page_flexible_about_us')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/about-us/first-screen',
                    'mission_found' => 'includes/sections/about-us/mission-found',
                    'key_values' => 'includes/sections/about-us/key-values',
                    'areas_activity' => 'includes/modules/areas-activity',
                    'info_block' => 'includes/modules/info-block',
                    'result' => 'includes/sections/about-us/result',
                    'documents' => 'includes/sections/about-us/documents',
                    'about_volunteering' => 'includes/modules/about-volunteering',
                    'our_partners' => 'includes/modules/our-partners',
                    'media' => 'includes/modules/media',
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

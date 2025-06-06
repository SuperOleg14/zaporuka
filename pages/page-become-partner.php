<?php /* Template Name: Page Become Partner */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_become_partner')) {
        while (have_rows('page_flexible_become_partner')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/need-help/first-screen',
                    'arguments' => 'includes/sections/become-partner/arguments',
                    'our_partners' => 'includes/modules/our-partners',
                    'third_block' => 'includes/modules/third-block',
                    'advantages' => 'includes/sections/become-partner/advantages',
                    'partner_interaction' => 'includes/sections/become-partner/partner-interaction',
                    'block_report' => 'includes/modules/block-report',
                    'block_subscribe' => 'includes/sections/blog/block-subscribe',
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

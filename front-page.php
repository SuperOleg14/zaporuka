<?php /* Template Name: Front Page */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_front_page')) {
        while (have_rows('page_flexible_front_page')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/front-page/first-screen',
                    'history_fund' => 'includes/sections/front-page/history-fund',
                    'areas_activity' => 'includes/modules/areas-activity',
                    'main_current_fees' => 'includes/modules/main-current-fees',
                    'block_subscribe' => 'includes/sections/blog/block-subscribe',
                    'donation_module' => 'includes/modules/donation-module',
                    'info_block' => 'includes/modules/info-block',
                    'third_block' => 'includes/modules/third-block',
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

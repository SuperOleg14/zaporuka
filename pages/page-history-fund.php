<?php /* Template Name: Page History Fund */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    if (have_rows('page_flexible_history_fund')) {
        while (have_rows('page_flexible_history_fund')) {
            the_row();
            $layout = get_row_layout();
            get_template_part(
                slug: match ($layout) {
                    'first_screen' => 'includes/sections/need-help/first-screen',
                    'numbers' => 'includes/sections/history-fund/numbers',
                    'direct_speech' => 'includes/sections/history-fund/direct-speech',
                    'history_fund_info' => 'includes/sections/history-fund/history-fund-info',
                    'info_years' => 'includes/sections/history-fund/info-years',
                    'block_subscribe' => 'includes/sections/blog/block-subscribe',
                    'seo_block' => 'includes/modules/seo-block',
                    default => '',
                },
            );
        }
    }
    ?>
</div>

<?php get_footer(); ?>

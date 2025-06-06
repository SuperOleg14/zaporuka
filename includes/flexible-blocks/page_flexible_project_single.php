<?php
while (have_rows('page_flexible_project_single')) {
    the_row();
    $layout = get_row_layout();

    get_template_part(
        match ($layout) {
            'first_screen_single_project' => 'includes/sections/single-projects/first-screen-single-project',
            'single_project_info' => 'includes/sections/single-projects/single-project-info',
            'block_video' => 'includes/sections/single-projects/block-video',
            'history_heroes' => 'includes/sections/single-projects/history-heroes',
            'heroes' => 'includes/sections/single-projects/heroes',
            'important' => 'includes/sections/single-projects/slider',
            'need' => 'includes/sections/single-projects/need',
            'activity' => 'includes/sections/single-projects/activity',
            'block_subscribe' => 'includes/sections/single-projects/block-subscribe',
            'current_fees' => 'includes/modules/current-fees',
            'donation_module' => 'includes/modules/donation-module',
            'join' => 'includes/options/join',
            'partners_project' => 'includes/sections/single-projects/partners-project',
            'our_partners' => 'includes/modules/our-partners',
            'about_volunteering' => 'includes/modules/about-volunteering',
            'block_report' => 'includes/modules/block-report',
            'faq' => 'includes/modules/faq',
            'seo_block' => 'includes/modules/seo-block',
            default => null,
        }
    );
}

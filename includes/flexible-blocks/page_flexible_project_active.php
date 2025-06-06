<?php
while (have_rows('page_flexible_project_active')) {
    the_row();
    $layout = get_row_layout();

    get_template_part(
        match ($layout) {
            'first_screen_active_project' => 'includes/sections/single-projects/first-screen-active-project',
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

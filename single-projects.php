<?php /* Template Name: Single Projects */?>

<?php get_header(); ?>

<div class="main-wrapper">
    <?php
    $project_id = get_the_ID();

    $total_amount = get_field('total-amount', $project_id);
    $total_collected = get_field('total-collected', $project_id);
    $completed_date = get_field('project_completed_date', $project_id);

    $project_type = get_field('single_project_type');

    if ($project_type !== 'single') {
        if ($total_collected >= $total_amount) {
            update_field('single_project_type', 'completed', $project_id);
            update_field('project_completed_date', current_time('d.m.Y  '), $project_id);
        } else {
            update_field('single_project_type', 'active', $project_id);
            update_field('project_completed_date', null, $project_id);
        }
    }

    $flex_field = match ($project_type) {
        'single' => 'page_flexible_project_single',
        'active', 'completed', 'endless' => 'page_flexible_project_active',
        default => null,
    };

    if ($flex_field && have_rows($flex_field)) {
        include get_template_directory() . '/includes/flexible-blocks/' . $flex_field . '.php';
    }

    ?>
</div>

<?php get_footer(); ?>

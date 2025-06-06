<?php
$term = get_queried_object();
$term_name = $term->name ?? '';
$term_description = term_description($term->term_id ?? 0, $term->taxonomy ?? '');
?>

<div class="first-screen">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-screen__content">
            <div class="image">
                <img src="<?php echo get_field('projects_category_photo', $term) ?>" alt="<?php echo esc_html($term_name); ?>"/>
            </div>
            <div class="text-content">
                <h1>
                    <?php echo esc_html($term_name); ?>
                </h1>
                <p>
                    <?php echo wp_kses_post($term_description); ?>
                </p>
            </div>
        </div>
    </div>
</div>

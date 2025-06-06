<?php
$term = get_queried_object();

$items = get_field('projects_category_info');
$count = is_array($items) ? count($items) : 0;

$basis_class = $count === 3 ? '--basis-3' : '--basis-4';
?>
<div class="info mb-150">
    <div class="container">
        <div class="result__content d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'projects_category_info', $term) ): ?>
                <?php while ( have_rows( 'projects_category_info', $term) ) : the_row(); ?>
                    <div class="about-volunteering__content_item <?php echo esc_attr($basis_class); ?>">
                        <div class="d-flex --align-center">
                            <?php echo get_sub_field( 'projects_category_info_icon'); ?>
                            <div class="about-volunteering__content_title">
                                <?php echo get_sub_field( 'projects_category_info_title'); ?>
                            </div>
                        </div>
                        <div class="about-volunteering__content_text">
                            <?php echo get_sub_field( 'projects_category_info_text'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="info__text text">
            <?php echo get_field( 'projects_category_text', $term); ?>
        </div>
    </div>
</div>

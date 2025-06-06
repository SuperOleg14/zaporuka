<?php if (is_tax('projects-category')) :
    $term = get_queried_object();
    if ( have_rows( 'projects_category_seo_block', $term) ):
        while ( have_rows( 'projects_category_seo_block', $term) ) : the_row(); ?>
            <div class="seo-block">
                <div class="container">
                    <div class="seo-block__text">
                       <?php echo get_sub_field( 'projects_category_seo_block_content'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;
else :
    if (trim(get_the_content()) !== ''): ?>
        <div class="seo-block">
            <div class="container">
                <div class="seo-block__text">
                    <?php if (have_posts()) :
                        while ( have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

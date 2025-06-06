<div class="first-display mb-150">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <?php if (has_post_thumbnail()) : ?>
            <div class="first-display__image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

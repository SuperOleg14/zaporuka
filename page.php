<?php get_header(); ?>

<div class="default-wrapper">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <h2 class="title"><?= the_title() ?></h2>
        <div class="default-wrapper__content mb-150">
            <?php if (have_posts()) :
                while ( have_posts()) : the_post();
                    the_content();
                endwhile;
            endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

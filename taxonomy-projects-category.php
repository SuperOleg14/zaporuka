<?php /*
 * Template name: Projects Category
 */ ?>

<?php get_header(); ?>

<div class="projects-taxonomy">
    <?php
    get_template_part('includes/sections/projects/first-screen-category');
    get_template_part('includes/sections/projects/projects-category-info');
    get_template_part('includes/modules/current-fees');
    get_template_part('includes/modules/donation-module');
    get_template_part('includes/options/join');
    get_template_part('includes/modules/our-partners');
    get_template_part('includes/modules/latest-news');
    get_template_part('includes/modules/about-volunteering');
    get_template_part('includes/modules/block-report');
//    get_template_part('includes/modules/faq');
    get_template_part('includes/modules/seo-block');
    ?>
</div>

<?php get_footer(); ?>

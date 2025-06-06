<div class="category-block">
    <div class="container">
        <?php if (!is_paged()) : ?>
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <?php endif; ?>
        <div class="post__block d-flex --just-space --align-stretch f-wrap mb-150">
            <?php
            $postcounter = 0;
            $current_category = get_queried_object();
            $current_tag = get_queried_object();
            ?>
            <?php if (have_posts()) :
                while ( have_posts()) : the_post();
                    $postcounter++; ?>
                    <article id="post-<?php the_ID(); ?>" class="single-post__item --basis-4">
                        <?php if ($postcounter !== 1) : ?>
                            <a href="<?php the_permalink(); ?>" class="single-post__item_link"></a>
                        <?php endif; ?>
                        <div class="single-post__item_photo d-flex --jc-center --align-center">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php if ($postcounter == 1) : ?>
                                    <div class="post__content_photo">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="post__content_photo">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                        <div class="single-post__item--info">
                            <div class="single-post__item_title">
                                <?php the_title(); ?>
                            </div>
                            <div class="single-post__item_date">
                                <?php echo get_the_date( 'F j, Y' ); ?>
                            </div>
                            <?php if ($postcounter == 1) : ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-content">
                                    Дізнатись більше
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>

                    <?php if ( $postcounter == 1 ) : ?>
                    <div class="title">Більше дописів</div>

                        <?php if (is_tag()) : ?>
                            <div class="post-categories d-flex --align-center f-wrap">
                                <?php
                                $current_tag_id = $current_tag->term_id;
                                $tags = get_tags(array(
                                    'exclude' => $current_tag_id
                                ));

                                foreach ($tags as $tag) {
                                    echo '<a class="btn btn-transparent btn-content" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
                                }
                                ?>
                            </div>
                        <?php else : ?>
                            <div class="post-categories d-flex --align-center f-wrap">
                                <?php
                                $current_category_id = $current_category->term_id;
                                $categories = get_categories(array(
                                    'exclude' => $current_category_id
                                ));

                                foreach ($categories as $category) {
                                    echo '<a class="btn btn-transparent btn-content" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> ';
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                    <?php endif ?>

                <?php endwhile;
            endif; ?>
            <?php
            the_posts_pagination(array(
                'show_all' => false,
                'end_size' => 1,
                'mid_size' => 2,
                'prev_next' => true,
                'prev_text' => __(' '),
                'next_text' => __(' '),
                'screen_reader_text' => __( '' ),
            ));
            ?>
        </div>
    </div>
</div>

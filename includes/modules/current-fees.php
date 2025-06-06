<div class="current-fees m-150">
    <div class="container">
        <h2 class="title">Наші проєкти</h2>
        <div class="fees-switch">
            <span class="text first">Реалізовані проєкти</span>
            <label for="fees-toggle" class="fees-switch-label">
                <input type="checkbox" id="fees-toggle" class="fees-toggle">
                <span class="switcher"></span>
            </label>
            <span class="text second">Активні проєкти</span>
        </div>
        <div class="current-fees__tab">
            <div class="current-fees__content f-wrap completed">
                <?php

                $posts_per_page = 3;

                if (is_page_template('pages/page-projects.php')) {
                    $posts_per_page = -1;
                }

                $args = [
                    'post_type'      => 'projects',
                    'posts_per_page' => $posts_per_page,
                    'post_status'    => 'publish',
                    'meta_key'       => 'single_project_type',
                    'meta_value'     => 'completed',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];

                if (is_tax('projects-category')) {
                    $current_term = get_queried_object();
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'projects-category',
                            'field'    => 'term_id',
                            'terms'    => $current_term->term_id,
                        ]
                    ];
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                        $project_id = get_the_ID();
                        $total_amount = get_field('total-amount', $project_id);
                        $total_collected = get_field('total-collected', $project_id);
                        $project_description = get_field('project_description', $project_id);

                        $percent = 0;
                        if ($total_amount > 0) {
                            $percent = round(($total_collected / $total_amount) * 100, 1);
                        }
                        ?>

                        <div class="item --basis-3">
                            <div class="image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                            <div class="bottom">

                                <?php $categories = get_the_terms( get_the_ID(), 'projects-category' );
                                foreach ($categories as $category) : ?>
                                    <div class="item-tag <?php echo $category->slug; ?>">
                                        <?php echo $category->name; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="current-fees__content_info">
                                    <div class="small-title"><?php the_title(); ?></div>
                                    <div class="small-text"><?= $project_description ?></div>
                                </div>
                                <div class="fundraising">
                                    <div class="progress">
                                        <span  style="width: <?= $percent ?>%;" class="progress-bar"></span>
                                    </div>
                                    <div class="info d-flex">
                                        <div class="info-item">
                                            <div class="info-title">Зібрано</div>
                                            <div class="info-sum"><?= $total_collected ?> ₴</div>
                                        </div>
                                        <div class="info-item text-right">
                                            <div class="info-title">Ціль</div>
                                            <div class="info-sum"><?= $total_amount ?> ₴</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-content">
                                    Підтримати
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#ffffff"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="current-fees__content f-wrap active">
                <?php

                $posts_per_page = 3;

                if (is_page_template('pages/page-projects.php')) {
                    $posts_per_page = 6;
                }

                $args = [
                    'post_type'      => 'projects',
                    'posts_per_page' => $posts_per_page,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
//                    'meta_key'       => 'single_project_type',
//                    'meta_value'     => 'active',
                    'meta_query' => [
                        [
                            'key'     => 'single_project_type',
                            'value'   => ['active', 'single'],
                            'compare' => 'IN',
                        ]
                    ],
                ];

                if (is_tax('projects-category')) {
                    $current_term = get_queried_object();
                    $args['tax_query'] = [
                        [
                            'taxonomy' => 'projects-category',
                            'field'    => 'term_id',
                            'terms'    => $current_term->term_id,
                        ]
                    ];
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                        $project_id = get_the_ID();
                        $total_amount = get_field('total-amount', $project_id);
                        $total_collected = get_field('total-collected', $project_id);
                        $project_description = get_field('project_description', $project_id);

                        $percent = 0;
                        $total_amount = floatval(str_replace([' ', '₴'], '', $total_amount));
                        $total_collected = floatval(str_replace([' ', '₴'], '', $total_collected));

                        if ($total_amount > 0) {
                            $percent = round(($total_collected / $total_amount) * 100, 1);
                        }
                        ?>

                        <div class="item --basis-3">
                            <div class="image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                            <div class="bottom">
                                <?php $categories = get_the_terms(get_the_ID(), 'projects-category');
                                if ($categories && !is_wp_error($categories)) :
                                    foreach ($categories as $category) : ?>
                                        <div class="item-tag <?php echo esc_attr($category->slug); ?>">
                                            <?php echo esc_html($category->name); ?>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                                <div class="current-fees__content_info">
                                    <div class="small-title"><?php the_title(); ?></div>
                                    <div class="small-text"><?= $project_description ?></div>
                                </div>
                                <?php
                                $project_type = get_field('single_project_type', $project_id);
                                if ($project_type !== 'single') : ?>
                                    <div class="fundraising">
                                        <div class="progress">
                                            <span  style="width: <?= $percent ?>%;" class="progress-bar"></span>
                                        </div>
                                        <div class="info d-flex">
                                            <div class="info-item">
                                                <div class="info-title">Зібрано</div>
                                                <div class="info-sum"><?= $total_collected ?> ₴</div>
                                            </div>
                                            <div class="info-item text-right">
                                                <div class="info-title">Ціль</div>
                                                <div class="info-sum"><?= $total_amount ?> ₴</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-content">
                                    Підтримати
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#ffffff"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <?php if (!is_page_template('pages/page-projects.php')) : ?>
            <a href="<?php echo home_url('/proekti/'); ?>" class="btn btn-transparent btn-content">
                Показати більше
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M18 6L10 14L2 6" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>
</div>

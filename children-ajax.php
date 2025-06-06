<?php
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * 3;
$limit = 3;

if (have_rows('children', 'options')) {
    while (have_rows('children', 'options')) {
        the_row();
        if (have_rows('children_content')) {
            $count = 0;
            $i = 0;

            while (have_rows('children_content')) {
                the_row();
                if ($i++ < $offset) continue;
                if ($count++ >= $limit) break;

                ?>
                <div class="children__content_item --basis-3">
                    <div class="children__content_top d-flex --align-center">
                        <div class="children__content_photo">
                            <img src="<?php echo get_sub_field('children_content_photo'); ?>"/>
                        </div>
                        <div class="children__content_info">
                            <div><?php echo get_sub_field('children_content_name'); ?></div>
                            <div><?php echo get_sub_field('children_content_year'); ?></div>
                            <div><?php echo get_sub_field('children_content_region'); ?></div>
                        </div>
                    </div>
                    <div class="children__content_title"><?php echo get_sub_field('children_content_title'); ?></div>
                    <div class="children__content_bottom d-flex --just-space --align-center">
                        Сума допомоги
                        <div class="children__content_price">
                            <?php echo get_sub_field('children_content_price'); ?>₴
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}

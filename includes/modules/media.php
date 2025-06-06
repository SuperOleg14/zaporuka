<?php if (have_rows('media', 'options')): ?>
    <?php while (have_rows('media', 'options')): the_row(); ?>
        <div class="media m-150">
            <div class="container">
                <h2 class="title">БФ “Запорука” у ЗМІ</h2>
                <div class="media__content d-flex --just-space --align-stretch f-wrap">
                    <?php if (have_rows('media_content')): ?>
                        <?php
                        $media_items = [];
                        while (have_rows('media_content')): the_row();
                            $media_items[] = [
                                'media_content_link'  => get_sub_field('media_content_link'),
                                'media_content_title' => get_sub_field('media_content_title'),
                                'media_content_logo'  => get_sub_field('media_content_logo'),
                            ];
                        endwhile;

                        if (!is_page_template('pages/page-media.php')) {
                            $media_items = array_slice($media_items, 0, 3);
                        }
                        ?>

                        <?php foreach ($media_items as $media_item): ?>
                            <div class="media__content_item d-flex --just-space --dir-col --basis-3">
                                <a href="<?php echo esc_attr($media_item['media_content_link'] ?? '#'); ?>" class="media__content_link" target="_blank"></a>
                                <div class="media__content_title">
                                    <?php echo esc_html($media_item['media_content_title'] ?? ''); ?>
                                </div>
                                <div class="media__content_info d-flex d-flex --just-space --align-center">
                                    <div class="media__content_logo">
                                        <img src="<?php echo esc_url($media_item['media_content_logo'] ?? ''); ?>"/>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                        <path d="M13.7022 2.05685C13.3602 1.71542 12.8058 1.71542 12.4638 2.05685C12.1218 2.39828 12.1218 2.95185 12.4638 3.29328L20.3095 11.1265H2.57489C2.09127 11.1265 1.69922 11.5179 1.69922 12.0008C1.69922 12.4836 2.09127 12.8751 2.57489 12.8751H20.3095L12.4638 20.7083C12.1218 21.0497 12.1218 21.6033 12.4638 21.9447C12.8058 22.2861 13.3602 22.2861 13.7022 21.9447L23.0427 12.619C23.2137 12.4483 23.2992 12.2245 23.2992 12.0008C23.2992 11.8822 23.2756 11.7692 23.2328 11.6661C23.19 11.563 23.1267 11.4664 23.0427 11.3826L13.7022 2.05685Z" fill="#303339"/>
                                    </svg>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php if (!is_page_template('pages/page-media.php')): ?>
                    <a href="<?php echo home_url('/zmi/'); ?>" class="btn btn-transparent btn-content">
                        Показати більше
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#171717"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

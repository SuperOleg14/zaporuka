<div class="block-subscribe m-150">
    <div class="container">
        <div class="block-subscribe__content --text-align">
            <?php if (is_front_page()) : ?>
                <div class="block-subscribe__content_title">
                    <?php echo get_sub_field( 'block_subscribe_title'); ?>
                </div>
                <div class="block-subscribe__content_text">
                    <?php echo get_sub_field( 'block_subscribe_text'); ?>
                </div>
                <?php $blockSubscribeLink = get_sub_field('block_subscribe_link'); ?>
                <?php if ( $blockSubscribeLink ): ?>
                    <a href="<?php echo esc_url( $blockSubscribeLink['url']) ?>" class="btn btn-content --content-margin btn-white">
                        <?php echo esc_html( $blockSubscribeLink['title']) ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#171717"/>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php elseif(is_page_template('pages/page-history-fund.php')) : ?>
                <div class="block-subscribe__content_title">
                    <?php echo get_sub_field( 'block_subscribe_title'); ?>
                </div>
                <div class="block-subscribe__content_text">
                    <?php echo get_sub_field( 'block_subscribe_text'); ?>
                </div>
                <?php $blockSubscribeLink = get_sub_field('block_subscribe_link'); ?>
                <?php if ( $blockSubscribeLink ): ?>
                    <a href="<?php echo esc_url( $blockSubscribeLink['url']) ?>" class="btn btn-content --content-margin btn-white">
                        <?php echo esc_html( $blockSubscribeLink['title']) ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#171717"/>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php elseif(is_page_template('pages/page-become-partner.php')) : ?>
                <div class="block-subscribe__content_title">
                    <?php echo get_sub_field( 'block_subscribe_title'); ?>
                </div>
                <div class="block-subscribe__content_text">
                    <?php echo get_sub_field( 'block_subscribe_text'); ?>
                </div>
                <?php $blockSubscribeLink = get_sub_field('block_subscribe_link'); ?>
                <?php if ( $blockSubscribeLink ): ?>
                    <a href="<?php echo esc_url( $blockSubscribeLink['url']) ?>" class="btn btn-content --content-margin btn-white">
                        <?php echo esc_html( $blockSubscribeLink['title']) ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#171717"/>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php elseif(is_page_template('pages/page-volunteer.php')) : ?>
                <div class="block-subscribe__content_title">
                    <?php echo get_sub_field( 'block_subscribe_title'); ?>
                </div>
                <div class="block-subscribe__content_text">
                    <?php echo get_sub_field( 'block_subscribe_text'); ?>
                </div>
                <?php $blockSubscribeLink = get_sub_field('block_subscribe_link'); ?>
                <?php if ( $blockSubscribeLink ): ?>
                    <a href="<?php echo esc_url( $blockSubscribeLink['url']) ?>" class="btn btn-content --content-margin btn-white" target="_blank">
                        <?php echo esc_html( $blockSubscribeLink['title']) ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#171717"/>
                        </svg>
                    </a>
                <?php endif; ?>
            <?php elseif(is_page_template('pages/page-contacts.php')) : ?>
                <?php if ( have_rows( 'block_subscribe') ): ?>
                    <?php while ( have_rows( 'block_subscribe') ) : the_row(); ?>
                        <div class="block-subscribe__content_title">
                            <?php echo get_sub_field( 'block_subscribe_title'); ?>
                        </div>
                        <div class="block-subscribe__content_text">
                            <?php echo get_sub_field( 'block_subscribe_text'); ?>
                        </div>
                        <?php $blockSubscribeLink = get_sub_field('block_subscribe_link'); ?>
                        <?php if ( $blockSubscribeLink ): ?>
                            <a href="<?php echo esc_url( $blockSubscribeLink['url']) ?>" class="btn btn-content --content-margin btn-white" target="_blank">
                                <?php echo esc_html( $blockSubscribeLink['title']) ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="#171717"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php else : ?>
                <div class="block-subscribe__content_title">Підпишіться та слідкуйте за новинами</div>
                <div class="block-subscribe__content_text">Будьте в курсі наших важливих ініціатив, надихаючих історій та
                    корисної інформації. Підписавшись, ви зможете першими дізнаватися про можливості долучитися до
                    змін і допомогти тим, хто потребує!</div>
                <div class="post__content_sidebar--info-links d-flex --align-center --jc-center">
                    <a href="https://www.facebook.com/Zaporuka" class="link" target="_blank"></a>
                    <a href="" class="link x" target="_blank"></a>
                    <a href="https://www.instagram.com/zaporuka/" class="link inst" target="_blank"></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

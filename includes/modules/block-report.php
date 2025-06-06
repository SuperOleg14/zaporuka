<?php if( have_rows('block_report' , 'options') ): ?>
    <?php while( have_rows('block_report', 'options') ): the_row(); ?>
        <div class="block-report m-150">
            <div class="container">
                <div class="block-report__content grey-block d-flex --just-space f-wrap">
                    <div class="block-report__tab_header">
                        <h2 class="title"><?php echo get_sub_field( 'block_report_title'); ?></h2>
                        <?php if ( have_rows( 'block_report_tab' ) ): ?>
                            <?php
                            $index = 0;
                            while ( have_rows( 'block_report_tab' ) ) : the_row(); ?>
                                <div class="tab d-flex --just-space --align-center <?php echo $index === 0 ? 'tab--active' : ''; ?>">
                                    <?php echo get_sub_field( 'block_report_tab_header'); ?>
                                    <div class="item-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                            <path d="M11.5025 1.71339C11.2175 1.42887 10.7555 1.42887 10.4705 1.71339C10.1855 1.99792 10.1855 2.45922 10.4705 2.74375L17.0085 9.27143H2.22973C1.82671 9.27143 1.5 9.59762 1.5 10C1.5 10.4024 1.82671 10.7286 2.22973 10.7286H17.0085L10.4705 17.2562C10.1855 17.5408 10.1855 18.0021 10.4705 18.2866C10.7555 18.5711 11.2175 18.5711 11.5025 18.2866L19.2863 10.5152C19.4288 10.3729 19.5 10.1865 19.5 10C19.5 9.90121 19.4803 9.80702 19.4446 9.72111C19.409 9.63518 19.3562 9.55467 19.2863 9.48482L11.5025 1.71339Z" fill="#171717"/>
                                        </svg>
                                    </div>
                                </div>
                                <?php
                                $index++;
                            endwhile; ?>
                        <?php endif; ?>
                        <a href="<?php echo home_url('/zviti/'); ?>" class="btn btn-content">
                            Завантажити звіт
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                <path d="M11.5025 1.71339C11.2175 1.42887 10.7555 1.42887 10.4705 1.71339C10.1855 1.99792 10.1855 2.45922 10.4705 2.74375L17.0085 9.27143H2.22973C1.82671 9.27143 1.5 9.59762 1.5 10C1.5 10.4024 1.82671 10.7286 2.22973 10.7286H17.0085L10.4705 17.2562C10.1855 17.5408 10.1855 18.0021 10.4705 18.2866C10.7555 18.5711 11.2175 18.5711 11.5025 18.2866L19.2863 10.5152C19.4288 10.3729 19.5 10.1865 19.5 10C19.5 9.90121 19.4803 9.80702 19.4446 9.72111C19.409 9.63518 19.3562 9.55467 19.2863 9.48482L11.5025 1.71339Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="block-report__tab_body">
                        <?php if ( have_rows( 'block_report_tab' ) ): ?>
                            <?php
                            $index = 0;
                            while ( have_rows( 'block_report_tab' ) ) : the_row(); ?>
                                <div class="content <?php echo $index === 0 ? 'content--active' : ''; ?>">
                                    <?php echo get_sub_field( 'block_report_tab_content_description'); ?>
                                    <div class="block-report__tab_body--price">
                                        <?php echo get_sub_field( 'block_report_tab_content_price'); ?>
                                    </div>
                                    <div class="block-report__tab_body--info">
                                        <?php if ( have_rows( 'block_report_tab_content_info' ) ): ?>
                                            <?php while ( have_rows( 'block_report_tab_content_info' ) ) : the_row(); ?>
                                                <div class="block-report__tab_body--info-item">
                                                    <div class="small-title d-flex --align-center">
                                                        <?php echo get_sub_field( 'block_report_tab_content_info_icon'); ?>
                                                        <?php echo get_sub_field( 'block_report_tab_content_info_title'); ?>
                                                    </div>
                                                    <div class="text">
                                                        <?php echo get_sub_field( 'block_report_tab_content_info_text'); ?>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php
                                $index++;
                            endwhile; ?>
                        <?php endif; ?>
                        <a href="<?php echo home_url('/zviti/'); ?>" class="btn btn-content">
                            Завантажити звіт
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                <path d="M11.5025 1.71339C11.2175 1.42887 10.7555 1.42887 10.4705 1.71339C10.1855 1.99792 10.1855 2.45922 10.4705 2.74375L17.0085 9.27143H2.22973C1.82671 9.27143 1.5 9.59762 1.5 10C1.5 10.4024 1.82671 10.7286 2.22973 10.7286H17.0085L10.4705 17.2562C10.1855 17.5408 10.1855 18.0021 10.4705 18.2866C10.7555 18.5711 11.2175 18.5711 11.5025 18.2866L19.2863 10.5152C19.4288 10.3729 19.5 10.1865 19.5 10C19.5 9.90121 19.4803 9.80702 19.4446 9.72111C19.409 9.63518 19.3562 9.55467 19.2863 9.48482L11.5025 1.71339Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


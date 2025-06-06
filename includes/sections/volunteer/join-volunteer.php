<div class="join-volunteer m-150">
    <div class="container">
        <h2 class="title">
            <?php echo get_sub_field( 'join_volunteer_title'); ?>
        </h2>
        <div class="join-volunteer__content">
            <?php if ( have_rows( 'join_volunteer_content' ) ):
                while ( have_rows( 'join_volunteer_content' ) ) : the_row(); ?>
                <div class="join-volunteer__content_item d-flex --just-space f-wrap">
                    <div class="join-volunteer__content_info">
                        <div class="d-flex --align-center">
                            <div class="join-volunteer__content_info--number">
                                <?php echo get_sub_field( 'join_volunteer_content_number'); ?>
                            </div>
                            <div class="join-volunteer__content_info--title">
                                <?php echo get_sub_field( 'join_volunteer_content_title'); ?>
                            </div>
                        </div>
                        <div class="join-volunteer__content_info--text">
                            <?php echo get_sub_field( 'join_volunteer_content_text'); ?>
                        </div>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeW_P-ZdwJ9ONblKtRVX7V73L-06eGdkUctOFG1U4gyONOHxw/viewform" class="btn btn-content" target="_blank">
                            Стати волонтером
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="join-volunteer__content_photo">
                        <img src="<?php echo get_sub_field('join_volunteer_content_photo') ?>"/>
                    </div>
                </div>
                <?php endwhile;
            endif; ?>
        </div>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeW_P-ZdwJ9ONblKtRVX7V73L-06eGdkUctOFG1U4gyONOHxw/viewform" class="btn btn-content visible-mob" target="_blank">
            Стати волонтером
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
            </svg>
        </a>
    </div>
</div>

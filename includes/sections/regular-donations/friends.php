<div class="friends m-150">
    <div class="container">
        <div class="friends__content">
            <div class="friends__content_photo d-flex --just-space --align-stretch">
                <?php
                $friends_info = get_sub_field('friends_info');
                if ( have_rows( 'friends_photo' ) ):
                    $index = 0;
                    while ( have_rows( 'friends_photo' ) ) : the_row();
                        $index++;
                        $photo = get_sub_field('friends_photo_item');
                        if ( $index === 1 ) : ?>
                            <div class="friends__content_photo--item first">
                                <img src="<?php echo $photo; ?>" />
                            </div>
                            <div class="friends__content_block d-flex --just-space --align-stretch f-wrap">
                            <div class="friends__content_info">
                                <?php echo $friends_info; ?>
                            </div>
                            <?php else : ?>
                                <div class="friends__content_photo--item">
                                    <img src="<?php echo $photo; ?>" />
                                </div>
                            <?php endif; ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeW_P-ZdwJ9ONblKtRVX7V73L-06eGdkUctOFG1U4gyONOHxw/viewform?pli=1" class="btn btn-content" target="_blank">
                Приєднатися
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                </svg>
            </a>
        </div>
    </div>
</div>

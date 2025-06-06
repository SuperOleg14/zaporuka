<div class="info-years m-150">
    <div class="container">
        <div class="info-years__content d-flex --just-space --align-stretch f-wrap">
            <div class="info-years__content_photo">
                <?php if (get_sub_field('info_years_icon')) : ?>
                    <div class="info-years__content__icon visible-mob">
                        <?php echo get_sub_field( 'info_years_icon'); ?>
                    </div>
                <?php endif; ?>
                <h2 class="title">
                    <?php echo get_sub_field( 'info_years_title'); ?>
                </h2>
                <div class="info-years__content_photo--block visible-desktop">
                    <?php if ( have_rows( 'info_years_photo' ) ): ?>
                        <?php while ( have_rows( 'info_years_photo' ) ) : the_row(); ?>
                            <div class="info-years__content_photo--item">
                                <img src="<?php echo get_sub_field('info_years_photo_item') ?>"/>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="info-years__content_text">
                <?php echo get_sub_field( 'info_years_text'); ?>
            </div>
        </div>
    </div>
</div>

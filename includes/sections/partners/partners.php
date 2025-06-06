<?php if( have_rows('partners') ): ?>
    <?php while( have_rows('partners') ): the_row(); ?>
        <div class="our-partners partners mb-150">
            <div class="container">
                <h1 class="title">Наші партенри</h1>
                <div class="our-partners__content d-flex --just-space --align-stretch f-wrap">
                    <?php if ( have_rows( 'partners_content' ) ): ?>
                        <?php while ( have_rows( 'partners_content' ) ) : the_row(); ?>
                            <div class="our-partners__content_item d-flex --dir-col --jc-center --align-center">
                                <a href="<?php echo get_sub_field('partners_content_link') ?>" class="our-partners__content_link" target="_blank" rel="nofollow" ></a>
                                <div class="our-partners__content_logo d-flex --jc-center --align-center">
                                    <img src="<?php echo get_sub_field('partners_content_logo') ?>"/>
                                </div>
                                <div class="small-title --text-align">
                                    <?php echo get_sub_field( 'partners_content_title'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>



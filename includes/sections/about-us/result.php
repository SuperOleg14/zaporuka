<div class="result m-150">
    <div class="container">
        <?php if (get_sub_field( 'result_title')) : ?>
            <h2 class="title --text-align"><?php echo get_sub_field( 'result_title'); ?></h2>
        <?php endif; ?>
        <div class="result__content d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'result_content') ): ?>
                <?php while ( have_rows( 'result_content') ) : the_row(); ?>
                    <div class="about-volunteering__content_item --basis-3">
                        <div class="d-flex --align-center">
                            <?php echo get_sub_field( 'result_content_icon'); ?>
                            <div class="about-volunteering__content_title">
                                <?php echo get_sub_field( 'result_content_title'); ?>
                            </div>
                        </div>
                        <div class="about-volunteering__content_text">
                            <?php echo get_sub_field( 'result_content_text'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php if (get_sub_field( 'result_reward_info')) : ?>
            <div class="result__reward d-flex --jc-center">
                <div class="result__reward_info">
                    <?php echo get_sub_field( 'result_reward_info'); ?>
                </div>
                <div class="result__reward_photo">
                    <img src="<?php echo get_sub_field('result_reward_photo') ?>"/>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

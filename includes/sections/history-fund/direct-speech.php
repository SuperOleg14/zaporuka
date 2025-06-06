<div class="direct-speech m-150">
    <div class="container">
        <div class="direct-speech__content d-flex --just-space --align-center f-wrap">
            <div class="direct-speech__content_text">
                <div class="direct-speech__content_position">
                    <?php echo get_sub_field( 'direct_speech_position'); ?>
                </div>
                <div class="direct-speech__content_name">
                    <?php echo get_sub_field( 'direct_speech_name'); ?>
                </div>
                <div class="direct-speech__content_quote">
                    <?php echo get_sub_field( 'direct_speech_quote'); ?>
                </div>
            </div>
            <div class="direct-speech__content_photo">
                <img src="<?php echo get_sub_field('direct_speech_photo') ?>"/>
            </div>
        </div>
    </div>
</div>

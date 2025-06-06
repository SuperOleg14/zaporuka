<div class="first-display">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <div class="first-display__content d-flex --just-space --align-stretch f-wrap">
            <div class="left">
                <h1 class="main-title">
                    <?php echo get_sub_field( 'first_screen_title'); ?>
                </h1>
                <div class="text">
                    <?php echo get_sub_field( 'first_screen_text'); ?>
                </div>
            </div>
            <div class="right">
                <div class="small-text">
                    <?php echo get_sub_field( 'first_screen_received_text'); ?>
                </div>
                <div class="sum-number --first">
                    <?php echo get_sub_field( 'first_screen_received_price'); ?>
                </div>
                <div class="small-text">
                    <?php echo get_sub_field( 'first_screen_costs_text'); ?>
                </div>
                <div class="sum-number --second">
                    <?php echo get_sub_field( 'first_screen_costs_price'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

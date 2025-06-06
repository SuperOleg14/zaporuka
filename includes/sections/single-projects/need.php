<div class="need m-150">
    <div class="container">
        <div class="need__content">
            <?php if ( have_rows( 'need_content') ): ?>
                <?php while ( have_rows( 'need_content') ) : the_row(); ?>
                    <div class="need__content_item d-flex --just-space f-wrap">
                        <h2 class="title">
                            <?php echo get_sub_field( 'need_content_title'); ?>
                        </h2>
                        <div class="need__content_block d-flex --just-space">
                            <?php
                                $items = get_sub_field('need_content_block');
                                $count = is_array($items) ? count($items) : 0;

                                $basis_class = $count === 2 ? '--basis-2' : '';
                            ?>
                            <?php if ( have_rows( 'need_content_block') ): ?>
                                <?php while ( have_rows( 'need_content_block') ) : the_row(); ?>
                                    <div class="need__content_block--item <?php echo esc_attr($basis_class); ?>">
                                        <div class="d-flex --align-center">
                                            <?php echo get_sub_field( 'need_content_block_icon'); ?>
                                            <div class="need__content_block--title">
                                                <?php echo get_sub_field( 'need_content_block_title'); ?>
                                            </div>
                                        </div>
                                        <div class="need__content_block--text">
                                            <?php echo get_sub_field( 'need_content_block_text'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

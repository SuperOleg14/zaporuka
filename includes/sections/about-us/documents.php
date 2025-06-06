<div class="documents m-150">
    <div class="container">
        <div class="documents__content d-flex --just-space">
            <h2 class="title"><?php echo get_sub_field( 'documents_title'); ?></h2>
            <div class="documents__content_block">
                <?php if ( have_rows( 'documents_block') ): ?>
                    <?php while ( have_rows( 'documents_block') ) : the_row(); ?>
                        <div class="documents__content_block--item">
                            <?php echo get_sub_field( 'documents_block_name'); ?>
                            <?php $documents = get_sub_field('documents_block_file'); ?>
                            <?php if ( $documents ): ?>
                                <a href="<?php echo esc_url( $documents['url']) ?>" class="d-flex --align-center" target="_blank">
                                    Завантажити
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M8.80277 1.36993C8.57479 1.14231 8.20515 1.14231 7.97717 1.36993C7.74919 1.59755 7.74919 1.9666 7.97717 2.19422L13.2076 7.41636H1.38456C1.06215 7.41636 0.800781 7.67732 0.800781 7.99922C0.800781 8.32112 1.06215 8.58208 1.38456 8.58208H13.2076L7.97717 13.8042C7.74919 14.0318 7.74919 14.4009 7.97717 14.6285C8.20515 14.8561 8.57479 14.8561 8.80277 14.6285L15.0298 8.41136C15.1438 8.29755 15.2008 8.14839 15.2008 7.99922C15.2008 7.92019 15.185 7.84483 15.1565 7.77611C15.128 7.70737 15.0858 7.64296 15.0298 7.58708L8.80277 1.36993Z" fill="#7C8395"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

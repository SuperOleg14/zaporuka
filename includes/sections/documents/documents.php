<div class="documents">
    <div class="container">
        <?php get_template_part('includes/modules/breadcrumbs'); ?>
        <h1 class="main-title"><?= the_title() ?></h1>
        <div class="documents__content d-flex --just-space f-wrap">
            <div class="documents__content_info">
                Благодійний фонд «Запорука» працює прозоро й відкрито, тож тут ви знайдете
                необхідні документи та інформацію про нашу діяльність.
            </div>
            <div class="documents__content_document list">
                <?php if ( have_rows( 'documents_content' ) ):
                    while ( have_rows( 'documents_content' ) ) : the_row(); ?>
                        <div class="list-item">
                            <div class="item-title"><?php echo get_sub_field( 'documents_content_title' ); ?></div>
                            <?php $documentsLink = get_sub_field('documents_content_link'); ?>
                            <?php if ( $documentsLink ): ?>
                                <a href="<?php echo esc_url( $documentsLink['url']) ?>" class="item-link" target="_blank">
                                    Завантажити
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M8.80277 1.37091C8.57479 1.14329 8.20515 1.14329 7.97717 1.37091C7.74919 1.59853 7.74919 1.96757 7.97717 2.19519L13.2076 7.41734H1.38456C1.06215 7.41734 0.800781 7.67829 0.800781 8.0002C0.800781 8.3221 1.06215 8.58305 1.38456 8.58305H13.2076L7.97717 13.8052C7.74919 14.0328 7.74919 14.4019 7.97717 14.6295C8.20515 14.8571 8.57479 14.8571 8.80277 14.6295L15.0298 8.41234C15.1438 8.29853 15.2008 8.14936 15.2008 8.0002C15.2008 7.92117 15.185 7.84581 15.1565 7.77709C15.128 7.70834 15.0858 7.64394 15.0298 7.58805L8.80277 1.37091Z" fill="#7C8395"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div>

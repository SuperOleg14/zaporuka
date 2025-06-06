<div class="contacts m-150">
    <div class="container">
        <h2 class="title --text-align"><?php echo get_sub_field( 'contacts_title'); ?></h2>
        <div class="text --text-align"><?php echo get_sub_field( 'contacts_text'); ?></div>
        <div class="contacts__block d-flex --just-space --align-stretch f-wrap">
            <?php if ( have_rows( 'contacts_block' ) ): ?>
                <?php while ( have_rows( 'contacts_block' ) ) : the_row(); ?>
                    <div class="contacts__block_item --basis-2">
                        <div class="contacts__block_title">
                            <?php echo get_sub_field( 'contacts_block_title'); ?>
                        </div>
                        <div class="contacts__block_text">
                            <?php echo get_sub_field( 'contacts_block_text'); ?>
                        </div>
                        <div class="contacts__block_email d-flex --align-center">
                            <div class="copy-text">
                                <?php echo get_sub_field( 'contacts_block_email'); ?>
                            </div>
                            <div class="copy-text-btn d-flex">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 13.1465H8.75C8.44063 13.1465 8.1875 12.8934 8.1875 12.584V3.58398C8.1875 3.27461 8.44063 3.02148 8.75 3.02148H13.6754L16.0625 5.40859V12.584C16.0625 12.8934 15.8094 13.1465 15.5 13.1465ZM8.75 14.834H15.5C16.741 14.834 17.75 13.825 17.75 12.584V5.40859C17.75 4.96211 17.5707 4.5332 17.2543 4.2168L14.8707 1.82969C14.5543 1.51328 14.1254 1.33398 13.6789 1.33398H8.75C7.50898 1.33398 6.5 2.34297 6.5 3.58398V12.584C6.5 13.825 7.50898 14.834 8.75 14.834ZM4.25 5.83398C3.00898 5.83398 2 6.84297 2 8.08398V17.084C2 18.325 3.00898 19.334 4.25 19.334H11C12.241 19.334 13.25 18.325 13.25 17.084V15.959H11.5625V17.084C11.5625 17.3934 11.3094 17.6465 11 17.6465H4.25C3.94062 17.6465 3.6875 17.3934 3.6875 17.084V8.08398C3.6875 7.77461 3.94062 7.52148 4.25 7.52148H5.375V5.83398H4.25Z" fill="#171717"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

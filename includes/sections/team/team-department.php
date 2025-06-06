<div class="team-department m-150">
    <div class="container">
        <?php if ( have_rows( 'team_department_item') ): ?>
            <?php while ( have_rows( 'team_department_item') ) : the_row(); ?>
                <div class="team-department__item">
                    <h2 class="title">
                        <?php echo get_sub_field( 'team_department_item_title'); ?>
                    </h2>
                    <div class="team-department__person d-flex --align-stretch f-wrap">
                        <?php if ( have_rows( 'team_department_item_person') ): ?>
                            <?php while ( have_rows( 'team_department_item_person') ) : the_row(); ?>
                                <div class="team-department__person_item --basis-3">
                                    <div class="team-department__person_photo">
                                        <img src="<?php echo get_sub_field('team_department_item_person_photo') ?>"/>
                                    </div>
                                    <div class="team-department__person_name d-flex --just-space --align-center">
                                        <?php echo get_sub_field( 'team_department_item_person_name'); ?>
                                        <a href="mailto:<?php echo get_sub_field( 'team_department_item_person_email'); ?>" class="team-department__person_email">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M3.1237 4.99967C2.80859 4.99967 2.55078 5.24967 2.55078 5.55523V6.32259L8.72754 11.2393C9.46875 11.8295 10.5322 11.8295 11.2734 11.2393L17.4466 6.32259V5.55523C17.4466 5.24967 17.1888 4.99967 16.8737 4.99967H3.1237ZM2.55078 8.47884V14.4441C2.55078 14.7497 2.80859 14.9997 3.1237 14.9997H16.8737C17.1888 14.9997 17.4466 14.7497 17.4466 14.4441V8.47884L12.362 12.5275C10.987 13.6212 9.00684 13.6212 7.63542 12.5275L2.55078 8.47884ZM0.832031 5.55523C0.832031 4.32954 1.8597 3.33301 3.1237 3.33301H16.8737C18.1377 3.33301 19.1654 4.32954 19.1654 5.55523V14.4441C19.1654 15.6698 18.1377 16.6663 16.8737 16.6663H3.1237C1.8597 16.6663 0.832031 15.6698 0.832031 14.4441V5.55523Z" fill="#7C8395"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="team-department__person_position">
                                        <?php echo get_sub_field( 'team_department_item_person_position'); ?>
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

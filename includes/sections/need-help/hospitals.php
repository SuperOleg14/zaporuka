<div class="hospitals m-150">
    <div class="container">
        <div class="hospitals__content d-flex --just-space f-wrap">
            <div class="hospitals__content_info">
                <h2 class="title"><?php echo get_sub_field( 'hospitals_title'); ?></h2>
                <div class="text"><?php echo get_sub_field( 'hospitals_text'); ?></div>
                <select name="city">
                    <option disabled="disabled" selected="selected">Оберіть місто</option>
                    <option value="Kyiv">Київ</option>
                    <option value="Lviv">Львів</option>
                </select>
            </div>
            <div class="hospitals__content_hospital">
                <?php if ( have_rows( 'hospitals_content') ): ?>
                    <?php while ( have_rows( 'hospitals_content') ) : the_row(); ?>
                        <div class="hospital-item d-flex --just-space f-wrap" data-value="<?php echo get_sub_field( 'hospitals_content_city'); ?>">
                            <div class="hospital-item__info">
                                <div class="hospital-item__title">
                                    <?php echo get_sub_field( 'hospitals_content_medical_institution'); ?>
                                </div>
                                <div class="hospital-item__department"><?php echo get_sub_field( 'hospitals_content_medical_department'); ?></div>
                            </div>
                            <div class="hospital-item__place">
                                <?php $hospitalsContentMedicalPlace = get_sub_field('hospitals_content_medical_place'); ?>
                                <?php if ( $hospitalsContentMedicalPlace ): ?>
                                    <a href="<?php echo esc_url( $hospitalsContentMedicalPlace['url']) ?>" target="_blank">
                                        <?php echo esc_html( $hospitalsContentMedicalPlace['title']) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

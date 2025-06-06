<div class="key-values m-150">
    <div class="container">
         <div class="key-values__content">
             <h2 class="title title-color"><?php echo get_sub_field( 'key_values_title'); ?></h2>
             <div class="key-values__block d-flex --just-space f-wrap">
                 <?php if ( have_rows( 'key_values_content') ): ?>
                     <?php while ( have_rows( 'key_values_content') ) : the_row(); ?>
                         <div class="key-values__block_item --basis-3">
                             <div class="key-values__block_icon">
                                 <?php echo get_sub_field( 'key_values_content_icon'); ?>
                             </div>
                             <div class="small-title title-color">
                                 <?php echo get_sub_field( 'key_values_content_title'); ?>
                             </div>
                             <div class="text title-color">
                                 <?php echo get_sub_field( 'key_values_content_text'); ?>
                             </div>
                         </div>
                     <?php endwhile; ?>
                 <?php endif; ?>
             </div>
         </div>
    </div>
</div>

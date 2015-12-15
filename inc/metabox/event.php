<p class="wpo_section">
   <?php 
      $event_room = array(
            'id'    => 'event_room',
            'title' => 'Room',
            'des'   => '(Address Room)'
        );
        $mb->addTextElement( $event_room );
   ?>
</p>

 <p class="wpo_section is_featured">
    <?php
        $_is_featured = array('id'=>'is_featured', 'title'=>esc_html__('Is Featured Event', 'training') );
        $mb->getCheckboxElement($_is_featured); 
    ?>
  </p>

<p class="wpo_section wpo-event-speaker">
   <label><b><?php esc_html_e( 'Speaker Avata', 'training')?></b></label>
   <?php
       wp_enqueue_media();
       wp_enqueue_style( 'WPO_admin_metabox_css', WPO_FRAMEWORK_ADMIN_STYLE_URI.'css/metabox.css');
       wp_enqueue_script('WPO_gallery_upload', WPO_FRAMEWORK_ADMIN_STYLE_URI.'js/gallery_upload.js');
   ?>
   <span class="add_product_images hide-if-no-js">
       <a href="#" class="button" data-choose="<?php esc_html_e( 'Add Speaker', 'training' ); ?>" data-update="<?php esc_html_e( 'Add Speaker', 'training' ); ?>" data-delete="<?php esc_html_e( 'Delete Speaker Avata', 'training'); ?>" data-text="<?php esc_html_e( 'Delete', 'training'); ?>"><i class="fa fa-upload"></i><?php esc_html_e(' Add Speaker', 'training'); ?></a>
   </span> 
   <div id="product_images_container">
       <ul class="product_images">
       <?php
           $mb->the_field( 'post_gallery');
           $galleries = $mb->get_the_value();
           $attachments = array_filter( explode( ',', $galleries ) );

           if ( $attachments ) {
               foreach ( $attachments as $attachment_id ) {
                   echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                       ' . wp_get_attachment_image( $attachment_id, 'lookbook-slide' ) . '
                       <ul class="actions">
                           <li><a href="#" class="delete tips" data-tip="' . esc_html__( 'Delete image', 'training' ) . '"><i class="fa fa-times"></i></a></li>
                       </ul>
                   </li>';
               }
           }
       ?>
       </ul>
       <input type="hidden" id="product_image_gallery" name="<?php $mb->the_name(); ?>" value="<?php echo esc_attr( $mb->get_the_value() ); ?>" />
   </div>
</p>
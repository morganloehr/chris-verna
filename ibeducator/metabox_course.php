<p class="wpo_section is_featured">
  <?php
      $_is_featured = array('id'=>'is_featured', 'title'=>esc_html__('Is Featured Course', 'training') );
      $mb->getCheckboxElement($_is_featured); 
  ?>
</p>

<p class="wpo_section is_certificates">
  <?php
      $_is_certificates = array(
          'id'=>'is_certificates',
          'title'=>esc_html__('Is certificates Course', 'training'),
          'data' => array(
            array('id' => '0', 'name' => esc_html__('No','training')),
            array('id' => '1', 'name' => esc_html__('Yes','training')),
          ),
          'default' => '1'
          );
      $mb->getSelectElement($_is_certificates); 
  ?>
</p>
 

<p class="wpo_section duration">
  <?php
      $_duration = array('id'=>'duration', 'title'=>esc_html__('Duration Time', 'training'), 'des'=>'' );
      $mb->addTextElement( $_duration );
  ?>
</p>


<div class="fatures-panel action-panel">

    <div class="action-heading">  
       
        <h3><?php esc_html_e( 'Features', 'training' ); ?></h3>  <div class="action-button addnew"><?php esc_html_e( 'Add Item', 'training' );?></div> 
    </div>    
    <?php
 
     global $post; 
     $data = get_post_meta( $post->ID, '_features' );

     if( empty($data) ){
        $data = array(0=>array(0=> "") );
     }
     if($data){
        $data = $data[0]; 
    ?> 
    <?php foreach(  $data  as  $key => $item ){

    ?>

    <div class="fatures-item action-item">
        <div class="label"><?php echo trim($key+1); ?></div>
        <div class="inner wpo_section "> 
            <label for="teacher_linkedin"><?php esc_html_e( 'Feature', 'training' );?></label>
            <input type="text" name="features[]"   value="<?php echo esc_attr( $item ); ?>" style="width:70%"/>
           
        </div>
        <div class="action-button remove"><?php esc_html_e( 'Remove', 'training' );?></div>
    </div>

    <?php } ?>
 
    <?php } ?>
     <p><em><?php esc_html_e( '','training' ); ?></em></p>
</div>

<script>

    jQuery(document).ready( function($){
        $('.action-panel .addnew').click( function() {
             var $p = $(this).parent();
            $item = $('.action-item',$p.parent() ).first().clone();
            $p.parent().append( $item );
            $('input , textarea', $item ).val( '' );
            $('.action-item',$p.parent() ).each( function (i) {
                $('.label',this).html(i+1);
            } );
        } );

         $('.action-panel').delegate( '.remove', 'click',  function() {
            var $p = $(this).parent();  
            var $pp = $p.parent();
            if( $( '.action-item', $pp ).length  > 1 ){
                if( confirm("<?php esc_html_e('Are you sure to delete this?','training'); ?>") ){
                    $p.remove();
                    $('.action-item',$pp ).each( function (i) {
                        $('.label',this).html(i+1);
                    } );
                }
            }else {
                $('input , textarea', $p ).val( '' );
            }
        } );
    } );
</script>
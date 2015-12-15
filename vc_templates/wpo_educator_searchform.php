<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$_id = training_wpo_makeid();
$categories = array(''=>esc_html__('Category', 'training'));
$terms = get_terms('ib_educator_category',array('orderby'=>'id'));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
   foreach ( $terms as $term ) {
     $categories[$term->slug] =  $term->name;  
   }
}
?>

<div class="widget wpo-educator-searchform <?php echo esc_attr($el_class); ?> <?php echo esc_attr($style); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
         <div class="form">
               <div class="form-wrapper text-center">
                  <div class="search-label space-padding-top-15 hidden-sm hidden-xs"><?php esc_html_e('Search courses', 'training') ?></div>
                  <div class="form-inner">
                    <select class="list-category wpo-select2" name="ib_educator_category" id="wpo_category_<?php echo esc_attr($_id)?>">
                       <?php 
                          foreach ($categories as $key => $value) {
                             echo "<option value='$key'>$value</option>";
                          }
                       ?>
                    </select>
                    <input class="input_search" name="wpo_search_input" require="require" id="wpo_input_<?php echo esc_attr($_id)?>" value="" placeholder="<?php esc_html_e('Keyword', 'training'); ?>"/>
                    <a name="wpo_search_submit" class="btn btn-outline btn-primary radius-4x wpo-search-submit" ><?php esc_html_e('Search', 'training') ?></a>
                  </div>
               </div>
         </div>
    </div>
</div>

<script type="text/javascript">
   jQuery(document).ready(function(){
      var action = "<?php echo esc_url( home_url() ); ?>";
      jQuery(".wpo-search-submit").bind('click', function(){
         var url = action + '?post_type=ib_educator_course&s=' + jQuery("#wpo_input_<?php echo esc_attr($_id) ?>").val();
         if(jQuery('#wpo_category_<?php echo esc_attr($_id) ?>').val()){
            url += '&ib_educator_category=' + jQuery('#wpo_category_<?php echo esc_attr($_id) ?>').val();
         }
         window.location = url;
      })
   })
</script>
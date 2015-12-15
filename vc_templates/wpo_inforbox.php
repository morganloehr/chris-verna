<?php
$size= 'font-size-lg';
$title_align = 'separator_align_center';
$inforbox_style = '';
$style_display = '';
 $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="widget widget-vc nopadding">
	<div class="wpo-inforbox <?php echo esc_attr($style_display); ?> <?php echo esc_attr($el_class);?> clearfix <?php echo esc_attr($inforbox_style); ?> <?php echo esc_attr($inforbox_alight); ?>">
		<div class="inforbox-content">
			<div class="inforbox-inner">
				<div class="inforbox-heading">
					<?php if($sub_title!=''){ ?>
						<small class="subheading"><?php echo esc_attr($sub_title); ?></small>
					<?php } ?>	
					<?php if($title!=''): ?>
				    	<h2 class="<?php echo esc_attr($title_align); ?>">
							<span class="<?php echo esc_attr($size); ?>"><?php echo trim($title); ?></span>
						</h2>
			    <?php endif; ?>
				</div>
			    <div class="information">
				    <?php if( $information ){ ?>
				    	<p><?php echo trim($information); ?></p>
				    <?php } ?>
			    </div>
			</div>
		</div>		
	</div>	
</div>
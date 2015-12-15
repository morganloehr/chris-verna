<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 
switch ($columns_count) {
	case '6': 
		$class_column = 'col-lg-2 col-md-4 col-sm-4 col-xs-12';
		break;
	case '4':
		$class_column='col-md-3 col-sm-6 col-xs-12';
		break;
	case '3':
		$class_column='col-md-4 col-sm-4 col-xs-12';
		break;
	case '2':
		$class_column='col-md-6 col-sm-6';
		break;
	default:
		$class_column='col-md-12 col-sm-12';
		break;
}



if( !isset($load_more) ){
	$load_more = false; 
} 
global $woocommerce;

$_id = training_wpo_makeid();
$_count = 1;
$list_query = $this->getListQuery($atts);

if(count($list_query)>0){
?>
	<div class="widget widget-products widget-product-tabs products <?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<div class=" tabs-container text-center clearfix">
			<?php if($title!=''):?>
				<h3 class="widget-title <?php echo esc_attr($size).' '.esc_attr($title_align).' '; ?>">
            		<span><?php echo trim($title); ?></span>
				</h3>
			<?php endif; ?>
			<div class="tab-v6 text-center space-10">
				<ul class="tabs-list nav nav-tabs">
					<?php $__count=0; ?>
					<?php foreach ($list_query as $key => $li) { ?>
						<li <?php echo ($__count==0)?' class="active"':''; ?>><a href="#<?php echo esc_attr($key.'-'.$_id); ?>" data-toggle="tab" data-title="<?php echo esc_attr($li['title']);?>"><?php echo esc_html($li['title_tab']);?></a></li>
						<?php $__count++; ?>
					<?php } ?>
				</ul>
			</div>	
		</div>
		<div class="widget-content tab-content">
			<?php $__count=0; ?>
			<?php foreach ($list_query as $key => $li) { ?>
				<div class="tab-pane<?php echo ($__count==0)?' active':''; ?>" id="<?php echo esc_attr($key).'-'.$_id; ?>">
					<div class="wpo-content">
							<?php
								$loop = training_wpo_woocommerce_query($key,$number);
								if( $number == -1 )
									$_post_per_page = $loop->found_posts;
								else
									$_post_per_page = $number;

								if($loop->have_posts()){
									wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$loop,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$number ) );
								}
							?>
					</div>

					<?php if($style=='grid' || $style=='list' && $loop->found_posts > $_post_per_page):?>
						<?php if($load_more): ?>
							<div class="load-more">
								<a href="#" data-loading-text="<?php echo esc_html__('Loading...', 'training'); ?>" data-loadmore="true" data-class-column="<?php echo esc_attr($class_column); ?>" data-number="<?php echo esc_attr($number); ?>"
								data-paged="1" data-link="#<?php echo esc_attr($key).'-'.$_id; ?>" data-key="<?php echo esc_attr($key); ?>" class="btn btn-primary" data-style="<?php echo esc_attr($style); ?>" data-cols="<?php echo esc_attr($columns_count); ?>">
									<?php echo esc_html__('Load More', 'training'); ?>
								</a>
							</div>	
						<?php endif; ?>
					<?php endif; ?>

				</div>
				<?php $__count++; ?>
			<?php } ?>
		</div>
	</div>

	<script>
	jQuery(document).ready(function($) {
		jQuery('.widget-products a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			jQuery('.widget-products .widget-title visual-title').text(jQuery(this).data('title'));
		});
	});
	</script>
<?php } ?>


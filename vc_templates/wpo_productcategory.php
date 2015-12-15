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
	case '4':
		$class_column='col-sm-3 col-md-3';
		break;
	case '3':
		$class_column='col-sm-4';
		break;
	case '2':
		$class_column='col-sm-6';
		break;
	default:
		$class_column='col-sm-12';
		break;
}
$_id = training_wpo_makeid();
if($category=='') return;
$_count = 1;


$loop = training_wpo_woocommerce_query('',$number,$category);


if($title!=''){ ?>
	<h3 class="widget-title visual-title">
       <span><?php echo trim($title); ?></span>
	</h3>
<?php }
if ( $loop->have_posts() ) : ?>
	<div class="woocommerce<?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<div class="widget-content <?php echo esc_attr($style); ?>">
			<?php wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$loop,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$number ) ); ?>
		</div>
	</div>
<?php endif; ?>
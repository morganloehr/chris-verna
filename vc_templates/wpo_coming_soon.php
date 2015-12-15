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


$timestamp = strtotime($date_comingsoon);
if( $timestamp < time())
    return;

?>

<?php
    //register countdown js
    add_action( 'wp_enqueue_scripts', 'training_enqueue_script_coundown' );
?>

<div class="widget countdown wpo-coming-soon <?php echo esc_attr($el_class.' '.$style); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>
        <div class="description-countdown">
            <?php echo trim( $description ); ?>
        </div>
       <div class="coming-soon-time">
            <div class="pts-countdown clearfix" data-countdown="countdown"
                 data-date="<?php echo date('m',$timestamp).'-'.date('d',$timestamp).'-'.date('Y',$timestamp).'-'. date('H',$timestamp) . '-' . date('i',$timestamp) . '-' .  date('s',$timestamp) ; ?>">
            </div>
        </div>
</div>
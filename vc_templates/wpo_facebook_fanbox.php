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
?>
<div class="widget wpo-facebook-fanbox <?php echo ($el_class ? $el_class : ''); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

<iframe scrolling="no" data-border-color="#ccc" frameborder="0" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" src="http://www.facebook.com/connect/connect.php?id=<?php echo esc_attr($profile_id); ?>&amp;connections=<?php echo esc_attr($connections); ?>&amp;stream=<?php echo ($stream ? 'true' : 'false'); ?>&amp;header=<?php echo ($header ? 'true' : 'false'); ?>&amp;locale="></iframe>

</div>
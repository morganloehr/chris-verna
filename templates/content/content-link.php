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
$link_url = array('type' => 'wpo_postconfig', 'format' =>'link_url');
$link_title = array('type' => 'wpo_postconfig', 'format' =>'link_title');
?>

<?php if( training_wpo_getcontent( $link_url) ){ ?>
	<a class="post-link" href="<?php echo esc_url(training_wpo_getcontent( $link_url)) ?>" title="<?php echo esc_attr(training_wpo_getcontent( $link_title)) ?>">
		<?php echo esc_url(training_wpo_getcontent( $link_url)) ?>
	</a>
<?php }

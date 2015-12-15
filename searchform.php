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
?>
<form method="get" class="searchform wpo-search" action="<?php echo esc_url( home_url() ); ?>" role="search">
	<div class="input-group">
			<input name="s" maxlength="40" class="form-control input-large input-search" type="text" size="20" placeholder="<?php esc_html_e( 'Search...','training'); ?>">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-inverse radius-6x">
	         	<i class="fa fa-search"></i>
	        	</button> 
	      </span>
	</div>
</form>



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

<?php

	$_imgs = training_wpo_gallieries();
	$galleries = array();
	foreach( $_imgs as $val){
		if( $val ) $galleries[] = $val;
	}
?>
	<?php if(count($galleries) > 1) { ?>
			<div id="post-slide-<?php the_ID(); ?>" class="owl-carousel-play" data-ride="carousel">
				<div class="owl-carousel" data-slide="1"  data-singleItem="true" data-navigation="true" data-pagination="false">
					<?php foreach ($galleries as $key => $_img) {
						echo '<div class="item '.(($key==0)?'active':'').'">';
							echo '<img src="'.$_img.'" alt="">';
						echo '</div>';
					} ?>
				</div>
				<a class="left carousel-control carousel-xs radius-x" data-slide="prev" href="#post-slide-<?php the_ID(); ?>">
					<span class="fa fa-angle-left"></span>
				</a>
				<a class="right carousel-control carousel-xs radius-x" data-slide="next" href="#post-slide-<?php the_ID(); ?>">
					<span class="fa fa-angle-right"></span>
				</a>
			</div>
		<?php } elseif (count($galleries) == 1){ ?>
					<?php foreach ($galleries as $key => $_img) {
						echo '<div class="item '.(($key==0)?'active':'').'">';
							echo '<img src="'.$_img.'" alt="">';
						echo '</div>';
					} ?>
		<?php }?>

<?php
/* $Desc
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
<div id="wpo-templates">
    <p class="wpo_section">
        <?php $mb->the_field('count'); ?>
        <label for="pf_number"><?php echo esc_html__( "Pages show at most:", 'training'  );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="pf_number" value="<?php $mb->the_value(); ?>" />
    </p>

    <p class="wpo_section">
        <?php $mb->the_field('el_class'); ?>
        <label for="pf_number"><?php echo esc_html__( "Extra class name:", 'training'  );?></label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="pf_number" value="<?php $mb->the_value(); ?>" />
    </p>

    <p class="wpo_section">
        <?php $mb->the_field('blog_layout'); ?>
        <label for="pf_number"><?php echo esc_html__( "Blog Layout:", 'training'  );?></label>
        <select  name="<?php $mb->the_name(); ?>">
            <option value="default" <?php $mb->the_select_state('default'); ?>><?php echo esc_html__('Blog Default','training'); ?></option>
            <option value="masonry" <?php $mb->the_select_state('masonry'); ?>><?php echo esc_html__('Blog Masonry','training'); ?></option>
            <option value="list" <?php $mb->the_select_state('list'); ?>><?php echo esc_html__('Blog List','training'); ?></option>
        </select>
    </p>

    <p class="wpo_section">
        <?php $mb->the_field('header_skin'); ?>
        <label for="pf_number"><?php echo esc_html__( "Header Skin:", 'training'  );?></label>
        <select  name="<?php $mb->the_name(); ?>">
	    	<option value="1" <?php $mb->the_select_state('1'); ?>><?php echo esc_html__('Use Global','training'); ?></option>
	    	<option value="2" <?php $mb->the_select_state('2'); ?>><?php echo esc_html__('Skin 1','training'); ?></option>
	    	<option value="3" <?php $mb->the_select_state('3'); ?>><?php echo esc_html__('Skin 2','training'); ?></option>
	    </select>
    </p>

    <p class="wpo_section">
        <?php $mb->the_field('footer_skin'); ?>
        <label for="pf_number"><?php echo esc_html__( "Footer Skin:", 'training'  );?></label>
        <select  name="<?php $mb->the_name(); ?>">
            <option value="1" <?php $mb->the_select_state('1'); ?>><?php echo esc_html__('Use Global','training'); ?></option>
            <option value="2" <?php $mb->the_select_state('2'); ?>><?php echo esc_html__('Skin 1','training'); ?></option>
            <option value="3" <?php $mb->the_select_state('3'); ?>><?php echo esc_html__('Skin 2','training'); ?></option>
        </select>
    </p>
</div>
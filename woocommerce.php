<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http:/wpopal.com
 * @support  http://wpopal.com
 */
global $trainingconfig;
 
get_header( training_wpo_theme_options('headerlayout', '') ); 

if(is_single()){
	$trainingconfig = training_wpo_config_layout(training_wpo_theme_options('woocommerce-single-layout','fullwidth'));
	wc_get_template( 'single-product.php' , array( 'config'=>$trainingconfig ) );
}else{
	$trainingconfig = training_wpo_config_layout(training_wpo_theme_options('woocommerce-archive-layout','fullwidth'));
	wc_get_template( 'archive-product.php' , array( 'config' => $trainingconfig ) );
}

get_footer( );
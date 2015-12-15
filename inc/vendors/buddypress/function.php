<?php
add_filter( 'bp_core_fetch_avatar_no_grav', '__return_true' );
if( WPO_PUDDYPRESS_ACTIVED && function_exists("bp_is_user_activity") ){
		function training_wpo_layout_breadcrumbs_buddypress(){
			global $trainingconfig;
			if( is_front_page() ){
				return ;
			}
			$style = training_wpo_layout_breadcrumbs_bg();
	?>
		    <div class="wpo-breadcrumbs" style="<?php echo ($style);?>">
		        <?php training_wpo_breadcrumb(); ?>
		    </div>
	<?php 
		}
		add_action( 'wpo_layout_breadcrumbs_buddy_render', 'training_wpo_layout_breadcrumbs_buddypress' );


	function training_wpo_buddypress_user_header( $show=1 ){  
		 
	?>
	
		<div id="item-header" class="pb-user-activity pb-item-header">
		    <div class="container">
		          <?php bp_get_template_part( 'members/single/member-header' ) ?>
		    </div>
		</div>  
	<?php  
		
	}

	function training_wpo_buddypress_group_header(){
		global $groups_template;
?>
	<div id="item-header" class="pb-group pb-item-header" role="complementary">
		<div class="container">
				<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>
				<?php bp_get_template_part( 'groups/single/group-header' ); ?>
			<?php endwhile; endif; ?>
		</div>
	</div><!-- #item-header -->


<?php	
	}
	
	function training_wpo_buddypress_init(){  
		if(  bp_is_user_activity() ){ 
			remove_action('wpo_layout_breadcrumbs_buddy_render','training_wpo_layout_breadcrumbs_buddypress');
			add_action('wpo_layout_breadcrumbs_buddy_render', 'training_wpo_buddypress_user_header' );

		}
		if( bp_is_group () ){
			remove_action('wpo_layout_breadcrumbs_buddy_render','training_wpo_layout_breadcrumbs_buddypress');
			add_action('wpo_layout_breadcrumbs_buddy_render', 'training_wpo_buddypress_group_header' );

		}
	}

	add_action( 'init', 'training_wpo_buddypress_init', 1000 );
}
?>
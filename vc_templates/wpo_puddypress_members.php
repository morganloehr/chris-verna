<?php
	
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$members_args = array(
	'user_id'         => 0,
	'type'            => $member_default,
	'per_page'        => $max_members,
	'max'             => $max_members,
	'populate_extras' => true,
	'search_terms'    => false,
);

$current_time  = strtotime( bp_core_current_time() );
$cols = $style == 'inline' ?  array(3,9) : array(12,12);
?>
<?php if ( bp_has_members( $members_args ) ) : ?>
<div class="widget style-<?php echo esc_attr($style); ?> widget-buddypress-members row">
	<div class="widget-title col-sm-<?php echo esc_attr($cols[0]);?>"><span><?php echo esc_attr( $title ); ?></span></div>
	<div class="widget-content-v1 col-sm-<?php echo esc_attr($cols[1]);?>">	
		<ul class="list-inline">
			<?php while ( bp_members() ) : bp_the_member();  global $members_template; 
					
					$last_activity = strtotime( $members_template->member->last_activity );
					$still_online  = strtotime( '+5 minutes', $last_activity );

			?>

				<li class="list-unstyled">
					<div class="item-avatar <?php echo esc_attr( $avatar_size ); ?> radius-x">
						<a href="<?php bp_member_permalink() ?>" title="<?php bp_member_name(); ?>"><?php bp_member_avatar(); ?>
							
							<span class="member-status<?php if ( $current_time <= $still_online ) { ?>  online<?php } else { ?> offline<?php } ?>"></span>
							
						</a>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>	
</div>
<?php endif; ?>
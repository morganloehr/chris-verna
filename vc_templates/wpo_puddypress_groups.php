<?php
	
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$group_args = array(
	'user_id'         => 0,
	'type'            => $group_default,
	'per_page'        => $max_group,
	'max'             => $max_group,
	'populate_extras' => true,
	'search_terms'    => false,
);

$current_time  = strtotime( bp_core_current_time() );
 
?>
<?php if (  function_exists("bp_has_groups") &&  bp_has_groups( $group_args )  ) : ?>
<div class="widget widget-buddypress-group">
	<div class="widget-title "><span><?php echo esc_attr( $title ); ?></span></div>
	<div class="widget-content-v1">	
		<ul class="list-inline">
			<?php while ( bp_groups() ) : bp_the_group(); ?>
				<li <?php bp_group_class(); ?>>
					<div class="item-avatar">
						<a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_avatar_thumb() ?></a>
					</div>

					<div class="item">
						<div class="item-title"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a></div>
						<div class="item-meta">
							<span class="activity">
							<?php
								if ( 'newest' == $group_default )
									printf( esc_html__( 'created %s', 'training' ), bp_get_group_date_created() );
								if ( 'active' == $group_default )
									printf( esc_html__( 'active %s', 'training' ), bp_get_group_last_active() );
								elseif ( 'popular' == $group_default  )
									bp_group_member_count();
							?>
							</span>
							<p></p>
						</div>
					</div>
				</li>

			<?php endwhile; ?>
		</ul>
	</div>	
</div>
<?php endif; ?>
<?php
   $config = get_post_meta(get_the_ID(),'wpo_portfolio',true);
   $portfolio_format = (isset( $config['portfolio_format'] ) && !empty( $config['portfolio_format'] )) ? $config['portfolio_format']: 'default';
?>
<?php if($portfolio_format == 'video' || $portfolio_format=='fullscreen') echo '<div class="container">'; ?>
<div class="wpo-post-next">
	<?php 
		previous_post_link('<p class="btn btn-inverse btn-success radius-6x border-2 text-white">%link</p>', 'Pre.', FALSE); 
	   next_post_link('<p class="btn btn-inverse btn-success radius-6x border-2 text-white">%link</p>', 'Next', FALSE); 
	?>
</div>
<?php if($portfolio_format == 'video' || $portfolio_format=='fullscreen') echo '</div>'; ?>
<div class="clearfix"></div>
<?php 
	get_template_part('templates/portfolio/content', $portfolio_format);
?>
<?php if($portfolio_format == 'video' || $portfolio_format=='fullscreen') echo '<div class="container">'; ?>
  <?php
   if(training_wpo_theme_options('show-related-portfolio', 1)){ 
      $relate_count = training_wpo_theme_options('portfolio-items-show', 8);
      training_wpo_related_post($relate_count, 'portfolio', 'category_portfolio');
   }

?>
 <?php if($portfolio_format == 'video' || $portfolio_format=='fullscreen') echo '</div>'; ?>  
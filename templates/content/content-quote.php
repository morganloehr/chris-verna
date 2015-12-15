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
$quote_content = array('type' => 'wpo_postconfig', 'format' =>'quote_content');
$quote_author = array('type' => 'wpo_postconfig', 'format' =>'quote_author');
?>
<div class="entry-thumb">
   <?php if(training_wpo_getcontent( $quote_content)): ?>
      <blockquote class="blockquote border blockquote-success blockquote-left space-20">
      <i class="fa fa-quote-left blockquote-icon bg-success radius-x"></i>
         <div class="blockquote-in">
            <?php echo training_wpo_getcontent( $quote_content); ?>
         </div>
      </blockquote>
   <?php else : ?>
      <blockquote class="blockquote border blockquote-success blockquote-left space-20">
       <i class="fa fa-quote-left blockquote-icon bg-success radius-x"></i>
         <div class="blockquote-in">
            <?php the_excerpt(); ?>
         </div>
      </blockquote>
   <?php endif; ?>
</div>

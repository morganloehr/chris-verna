<?php
$lesson_id = get_the_ID();
$student_can_study = ib_edu_student_can_study( get_the_ID() );
$classes = apply_filters( 'ib_educator_lesson_classes', array( 'ib-edu-lesson' ), $lesson_id );
$options = get_post_meta(get_the_id(), 'wpo_postconfig_other', true );
global $number;
if($number) $number ++; else $number = 1; 

?>
<article id="lesson-<?php the_ID(); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="lesson-heading">
      <span div class="number"><?php echo esc_attr($number) ?></span>
      <a href="<?php the_permalink(); ?>">
         <?php the_title(); ?>
         <?php if($student_can_study){ ?>
            <i class="zmdi zmdi-check"></i>
         <?php }else{ ?>
            <i class="zmdi zmdi-lock-outline"></i>
         <?php } ?> 
         <span class="lesson-icon"><i class="<?php echo training_wpo_related_post(); ?>"></i></span>  
      </a>  
   </div>
      <?php if(isset($options['duration']) && $options['duration']) :?>
         <span class="duration"><?php esc_html_e('Duration: ', 'training') ?> <?php echo esc_attr($options['duration']) ?></span>
   	<?php endif ?>
   <?php
		if ( ib_edu_has_quiz( $lesson_id ) ) {
			echo '<div class="ib-edu-lesson-meta"><span class="quiz">' . esc_html__( 'Quiz', 'training' ) . '</span></div>';
		}
	?>
</article>
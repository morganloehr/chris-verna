<?php
$student_can_study = ib_edu_student_can_study( get_the_ID() );
$classes = array( 'ib-edu-lesson-single' );

$course_id = get_post_meta(get_the_ID(), '_ibedu_course', true);
if ( ! $student_can_study ) {
	$classes[] = 'ib-edu-lesson-locked';
}
 
?>

<div class="clearfix lesson-single-content">
	
	<div class="wpo-list-lesson">
		<div class="content-inner">
			<div class="logo text-center bg-white logo-inner space-padding-tb-30">
				<?php if( training_wpo_theme_options('logo') ) { ?>
				<div class="logo text-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url_raw( training_wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div>
				<?php } else { ?>
				<div class="logo logo-theme text-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url_raw( get_template_directory_uri() . '/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="back-to-course">
				<a href="<?php echo esc_url( get_permalink( ib_edu_get_course_id() ) ) ; ?>"><?php esc_html_e('Back To The Classes','training'); ?></a>
			</div>
			<div class="lesssons">
				<?php training_wpo_get_course_lessons_index( $course_id ); ?>
			</div>
		</div>
	</div>

	<div class="wpo-lesson-content">
		<div class="content-inner">
			<div class="content-lesson">
				<article id="lesson-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
					<h1 class="lesson-title entry-title"><?php the_title(); ?></h1>
					<div class="lesson-content entry-content">
							
						<?php
							if ( $student_can_study ) { ?>
								<div class="preview space-30">
									<?php get_template_part( 'templates/content/content', get_post_format() ); ?> 
								</div>
							<?php	
								the_content();
								Edr_View::template_part( 'quiz' );
							} else {
								echo '<p>';
								printf(
									esc_html__( 'Please register for the %s to view this lesson.', 'training' ),
									'<a href="' . esc_url( get_permalink( ib_edu_get_course_id() ) ) . '">' . esc_html__( 'course', 'training' ) . '</a>'
								);
								echo '</p>';
							}
						?>
					</div>

					<nav class="ib-edu-lesson-nav">
						<?php
							echo ib_edu_get_adjacent_lesson_link( 'previous', '<div class="nav-previous">&laquo; %link</div>', esc_html__( 'Previous Lesson', 'training' ) );
							echo ib_edu_get_adjacent_lesson_link( 'next', '<div class="nav-next">%link &raquo;</div>', esc_html__( 'Next Lesson', 'training' ) );
						?>
					</nav>
				</article>
			</div>
		</div>
		
		<div class="lesson-comment space-padding-tb-30">
			<div class="comment-inner">
				<?php
					if ( $student_can_study
						 && 1 == ib_edu_get_option( 'lesson_comments', 'learning' )
						 && ( comments_open() || get_comments_number() ) ) {
						comments_template();
					}
				?>
			</div>	
		</div>
	</div>	
</div>	


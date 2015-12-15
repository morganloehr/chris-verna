<?php
global $post;
$author_id = $post->post_author;
$teacher_id = training_wpo_the_teacher_id();
$api = IB_Educator::get_instance();
$user_id = get_current_user_id();
$course_id = get_the_ID();
$categories = get_the_term_list( get_the_ID(), 'ib_educator_category', '', esc_html__( ', ', 'training' ) );

$students = training_wpo_get_students_by_course( $post->ID );

$options = get_post_meta(get_the_id(), 'wpo_postconfig', true );

$membership_access = Edr_Memberships::get_instance()->membership_can_access( $course_id, $user_id );

if ( $membership_access ) {
	$register_url = ib_edu_get_endpoint_url( 'edu-action', 'join', get_permalink( $course_id ) );
} else {
	$register_url = ib_edu_get_endpoint_url( 'edu-course', $course_id, get_permalink( ib_edu_page_id( 'payment' ) ) );
}

?>

<article id="course-<?php the_ID(); ?>" <?php post_class( 'ib-edu-course-single' ); ?>>
	<div class="course-content entry-content space-top-20">

		<div class="col-md-4">	
			<div class="course-information">
				<?php
				$access_status = '';
				if ( $user_id ) {
					$access_status = $api->get_access_status( $course_id, $user_id );
				}
					// Output error messages.
					$errors = ib_edu_message( 'course_join_errors' );

					if ( $errors ) {
						$messages = $errors->get_error_messages();

						foreach ( $messages as $message ) {
							echo '<div class="ib-edu-message error">' . $message . '</div>';
						}
					}

					?>

					<div class="course-information-inner">
						<?php 
						if($categories){
							echo '<p class="space-5"><span class="category">' . $categories . '</span></p>';
						}
						?>

						<?php do_action( 'ib_educator_before_course_title' ); ?>
						<h1 class="course-title entry-title"><?php the_title(); ?></h1>
						<?php do_action( 'ib_educator_after_course_title' ); ?>
						<div class="course-rating">
							<?php if(function_exists('the_ratings'))  the_ratings(); ?>
						</div>
						<?php
						$output = '<ul class="list">';
						$price = ib_edu_get_course_price( $course_id );
						$price = ( 0 == $price ) ? esc_html__( 'Free', 'training' ) : ib_edu_format_course_price( $price );
						$register_url = ib_edu_get_endpoint_url( 'edu-course', $course_id, get_permalink( ib_edu_page_id( 'payment' ) ) );
						$output .= '<li class="price"><i class="uicon icon-price"></i><span class="lab">' .esc_html__('Price: ', 'training') . '</span> <span class="val">' . $price . '</span></li>';
						if(isset($options['duration']) && $options['duration']){
							$output .= '<li class="price"><i class="uicon icon-duration"></i><span class="lab">' .esc_html__('Duration: ', 'training') . '</span> <span class="val">' . $options['duration'] . '</span></li>';
						}
						if(isset($options['is_certificates'])){
							$output .= '<li class="price hidden"><i class="uicon icon-certificates"></i><span class="lab">' .esc_html__('Certificates: ', 'training') . '</span> <span class="val">' . ( $options['is_certificates'] ? esc_html__('Yes', 'training') : esc_html__('No', 'training') ) . '</span></li>';
						}

						$output .= '<li class="lesson"><i class="uicon icon-students"></i><span class="lab">'.esc_html__('Students: ', 'training') . '</span> <span class="val">' . count($students) .'</span></li>';

						$output .= '<li class="lesson"><i class="uicon icon-lesson"></i><span class="lab">'.esc_html__('Lesson: ', 'training') . '</span> <span class="val">' .  $api->get_num_lessons(get_the_id()) .'</span></li>';

						$output .= '</ul>';

						echo trim($output);
						?>

						<div class="action">
								<?php
									switch ( $access_status ) {
										case 'inprogress':
										echo '<div class="ib-edu-message info">' . esc_html__( 'You are registered for this course.', 'training' ) . '</div>';
										break;
										case 'pending_entry':
										echo '<div class="ib-edu-message info">' . esc_html__( 'Your registration for this course is pending.', 'training' ) . '</div>';
										break;
										case 'pending_payment':
										echo '<div class="ib-edu-message info">' . esc_html__( 'Your payment for this course is pending.', 'training' ) . '</div>';
										break;
											default: //---------------

											if ( 'closed' == ib_edu_registration( $course_id ) ) {
												break;
											}

											$output = apply_filters( 'ib_educator_course_price_widget', null, $membership_access, $course_id, $user_id );
											
											if ( null !== $output ) {
												return $output;
											}

											if ( $membership_access ) {
												$register_url = ib_edu_get_endpoint_url( 'edu-action', 'join', get_permalink( $course_id ) );
												$output .= '<form class="space-20" action="' . esc_url( $register_url ) . '" method="post">';
												$output .= '<input type="hidden" name="_wpnonce" value="' . wp_create_nonce( 'ib_educator_join' ) . '">';
												$output .= '<input type="submit" class="ib-edu-button" value="' . esc_html__( 'Join', 'training' ) . '">';
												$output .= '</form>';
											} else {
												$output .= '<p class="space-top-30 text-center"><a href="' . esc_url( $register_url ) . '" class="ib-edu-button btn btn btn-success">' . esc_html__( 'join class now', 'training' ) . '</a></p>';
											}

											echo trim( $output );
											break;
										}
								?>
						</div>

					</div>
					<?php if(  $teacher_id ){ ?> 
					<div class="widget course-teacher-information">
						<h3 class="widget-title special visual-title font-size-xs separator_align_left">
							<span><?php esc_html_e('Trainer', 'training') ?></span>
						</h3>
						<div class="widget-content">
							<?php 
							$data = training_wpo_ib_get_teachers_matches( $teacher_id );
							
							?>

							<?php if( !empty($data) ){  $user = get_user_by( 'id', $teacher_id ); ?> 
							
							<div class="teacher-header">
								<div class="teacher-thumbnail">
									<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( (int)$data['teacher_id'] ) ); ?>" alt="<?php echo trim($data['name']); ?>" />
								</div>
								<div class="clearfix"></div>
								<div class="teacher-info">
									<h3 class="teacher-name"><a href="<?php echo esc_html( $data['link'] ); ?>"><?php echo esc_html( $data['name'] ); ?></a></h3>
									<p class="teacher-position"><a href="<?php echo esc_html( $data['link'] ); ?>"><?php echo esc_html($data['job']); ?></a></p>
								</div> 
							</div> 
							
							<div class="teacher-body">
								<div class="clearfix"></div> 
								<div class="teacher-info text-normal">
									<?php echo esc_html( $data['description'] ); ?>
								</div>                     
							</div>  
							<?php } ?> 
						</div>
					</div>	
				</div>	
				<?php } ?>	

			</div>

		<div class="col-md-8">
			<div class="course-thumbnail">
				<?php the_post_thumbnail('full'); ?>
			</div>
			
			<div class="widget course-content entry-content space-top-40">
				
				<?php the_content(); ?>
			</div>
			
			<?php  $data = training_wpo_get_the_course_features();?>

			<?php if( !empty($data) ) : ?>
				<div class="course-features row widget space-30">
					<div class="col-xs-12">
						<h3 class="widget-title font-size-xs separator_align_left"><span><?php esc_html_e( 'objectives', 'training' ); ?></span></h3>
						<div class="widget-content">
							<?php $i=0; foreach( $data as $item ) : $i++; ?>
								<?php if($i%2==1) echo '<div class="row space-20">'; ?>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="fitem">
											<span class="icon zmdi zmdi-star-outline"></span> <?php echo esc_html($item); ?> 
										</div>	
									</div>
								<?php if($i%2==0 || $i==count($data)) echo '</div>'; ?>	
							<?php endforeach; ?>
						</div>	
					</div>
				</div>	
			<?php endif; ?>	

			<div class="row">
				<div class="col-sm-12">
					<?php
					$api = IB_Educator::get_instance();
					$lessons_query = $api->get_lessons( $course_id );
					?>
					<?php if ( $lessons_query && $lessons_query->have_posts() ) : ?>
						<section class="widget ib-edu-lessons">
							<h3 class="widget-title font-size-xs separator_align_left"><span><?php esc_html_e( 'Practice', 'training' ); ?></span></h3>
							<div class="less-content <?php if($lessons_query->found_posts > 4) echo 'content-hidden' ?>">
								<?php
								while ( $lessons_query->have_posts() ) {
									$lessons_query->the_post();
									Edr_View::template_part( 'content', 'lesson' );
								}
								wp_reset_postdata();
								?>
							</div>
							<?php if($lessons_query->found_posts > 4){ ?>
								<div class="btn-view-lesson"><a><?php esc_html_e('View more lessons', 'training') ?></a></div>
							<?php } ?>	
						</section>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 space-padding-top-30">
					<?php comments_template(); ?>
				</div>
			</div>
		</div>

			
			</div>
		</article>





		


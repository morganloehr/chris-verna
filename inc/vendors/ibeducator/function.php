<?php 
	$GLOBALS['Training_WPO_Teachers_matches'] = array();

	/**
	 * Add meta box fields for course and lesson
	 */
	if( is_admin() ){	
    // Save the Metabox Data

   		function training_wpt_save_course_features_meta($post_id, $post) { 
      
		    if( !isset($_POST['post_type']) ){
		       return $post->ID;
		    }
		 
		 		
		      // verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			if ( $_POST['post_type'] != 'ib_educator_course' ) {
				return $post->ID;
			}

			if ( !isset($_POST['features']) ) {
				return $post->ID;
			}
			$data = array();

			foreach( $_POST['features'] as $item ){
				if( !empty($item) ){
					$data[] = $item;
				}	
			}
			


			// Is the user allowed to edit the post or page?
			if ( !current_user_can( 'edit_post', $post->ID ))
			return $post->ID;

				$course_meta = array();

				$course_meta['_features'] = $data;

				foreach ($course_meta as $key => $value) { // Cycle through the $course_meta array!

				if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
					update_post_meta($post->ID, $key, $value);
				} else { // If the custom field doesn't have a value
					add_post_meta($post->ID, $key, $value);
				}
				if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
			}

	    }

	    add_action('save_post', 'training_wpt_save_course_features_meta', 1, 2); // save the custom fields

		function training_wpo_add_metabox_postypes(){
			$path = WPO_THEME_DIR   . '/ibeducator/';
				//Event setting
			/*new WPO_MetaBox(array(
				'id'       => 'wpo_postconfig',
				'title'    => esc_html__('Event Options', 'training'),
				'types'    => array('tribe_events'),
				'priority' => 'high',
				'template' => $path . 'event.php',
			));
			*/
			//Courses setting
			new WPO_MetaBox(array(
				'id'       => 'wpo_postconfig',
				'title'    => esc_html__('Courses Options', 'training'),
				'types'    => array('ib_educator_course'),
				'priority' => 'high',
				'template' => $path . 'metabox_course.php',
			));
				//Post setting
		 	new WPO_MetaBox(array(
				'id'       => 'wpo_postconfig',
				'title'    => esc_html__('Post Configuration' , 'training'),
				'types'    => array('ib_educator_lesson'),
				'priority' => 'high',
				'template' =>WPO_THEME_INC_DIR   . 'metabox/' . 'post.php'
			));
			//Lesson setting
			new WPO_MetaBox(array(
				'id'       => 'wpo_postconfig_other',
				'title'    => esc_html__('Lesson Options', 'training'),
				'types'    => array('ib_educator_lesson'),
				'priority' => 'high',
				'template' => $path . 'metabox_lesson.php',
			));
		}
		add_action( 'init', 'training_wpo_add_metabox_postypes' );
	}

	/**
	 *
	 */
	function training_wpo_get_the_course_features(){
		$data = get_post_meta(  get_the_ID(), '_features' );

		if( isset($data[0]) && !empty($data[0]) ){
			return $data[0];
		}
		return array();
	} 	
	
	/**
	 * get teacher id in the course
	 */
	function training_wpo_the_teacher_id(){
		return get_post_meta(get_the_id(), '_ib_educator_teacher', true );
	}

	/**
	 * storeed maching teacher by id as global which will be used in next
	 */
 
	function training_wpo_ib_get_teachers_matches( $userId ){
		global $Training_WPO_Teachers_matches, $post; 

 		if( !isset($Training_WPO_Teachers_matches[$userId]) ){

 			$data =  array('name'=> '', 'link' => '', 'description' => '' );

 		 
 			$user = get_user_by( 'id', $userId );
  		 
			$args = array(
				'post_type' => 'teacher',
				'posts_per_page'=> 1,
				'meta_query' => array(
			        array(
			          'key' => '_relateduser',
			          'value' =>  $userId,
			        )
			     )
			);
			$loop = new WP_Query($args);
			if( $loop->found_posts ){
				while( $loop->have_posts() ){ 
					$loop->the_post();
					$Training_WPO_Teachers_matches[$userId] = array('teacher_id' => get_the_id(), 'name'=> $user->display_name, 'description'=>training_wpo_excerpt(18, '...') , 'link' => get_permalink( get_the_ID() )  );
					break;
				} 
			}else {
				$Training_WPO_Teachers_matches[$userId] = array('teacher_id' => get_the_id(), 'name'=> $user->display_name, 'description'=>training_wpo_excerpt(18, '...')  , 'link' => get_author_posts_url( $userId )  ); 
			}

		} 
		wp_reset_postdata();
		return $Training_WPO_Teachers_matches[$userId];	
	}	

	add_action( 'wpo_ib_get_teachers_matches_before', 'training_wpo_ib_get_teachers_matches', 10000 );

	/**
	 * render teacher link 
	 */
	function training_wpo_ib_get_teacher(){
		global $post; 

 		$id   = get_post_meta( $post->ID, '_ib_educator_teacher', true );
 		if( $id ){
	 		$link = apply_filters( 'wpo_ibeducator_author_link',  $id );

			return $link;	
		}
		return ;
	}


	/**
	 * get Teacher link by id 
	 */
	add_filter( 'wpo_ibeducator_author_link', 'training_wpo_ib_get_teacher_link' );
	function training_wpo_ib_get_teacher_link($id){
		global $Training_WPO_Teachers_matches; 

		do_action('wpo_ib_get_teachers_matches_before', $id );
		
		if( empty($Training_WPO_Teachers_matches[$id]['link']) ){
			return '';
		}
		return esc_html__('Teacher ', 'training') .' <a href="'.$Training_WPO_Teachers_matches[$id]['link'].'" title="'.$Training_WPO_Teachers_matches[$id]['name'].'">'.$Training_WPO_Teachers_matches[$id]['name'].'</a>';			 
	}
 	
 	/**
 	 * Count Students Registered in a course
 	 */
	function training_wpo_get_payments_count( $id ) {
		global $wpdb;
		$data = $wpdb->get_results(  $wpdb->prepare("SELECT payment_status, count(1) as num_rows FROM {$this->payments} WHERE  course_id=%s and payment_status='complete' GROUP BY payment_status", $id), OBJECT_K );
		$i = 0;
		foreach( $data as $item ){
			$i += $item->num_rows;
		}
		wp_reset_postdata();
		return $i;
	}

 	/**
 	 * get list of students registered in a courses. 
 	 */
 	function training_wpo_get_students_by_course( $id ){  
 		$tables = ib_edu_table_names();

 		global $wpdb;
		$data = $wpdb->get_results( $wpdb->prepare( "SELECT user_id, course_id FROM {$tables['payments']} WHERE  course_id=%s and payment_status='complete'",  $id ), OBJECT_K );
 		
 		$output = array(); 	
 		foreach( $data as $items ){
 			foreach( $items as $item ){
 				$user = get_user_by( 'id', $items->user_id );
 				
 				$output[$items->user_id] = array( 'id' => $items->user_id, 'name' => $user->display_name );
 			}
 		}
 		wp_reset_postdata();
 		return $output;
 	}

 	/**
 	 *
 	 */
 	function training_wpo_get_course_lessons_index( $course_id){
 		
 		$id = get_the_ID();

 		$api = IB_Educator::get_instance();
		$lessons_query = $api->get_lessons($course_id);
		$number = 0;
		if($lessons_query && $lessons_query->have_posts()){
			while ( $lessons_query->have_posts() ) {
				$number++;
				$lessons_query->the_post();
				$student_can_study = ib_edu_student_can_study( get_the_ID() );
				$options = get_post_meta(get_the_ID(), 'wpo_postconfig_other', true );
		?>

			<div class="lesson<?php if( get_the_ID() == $id ){ ?> active<?php } ?>">
				<span class="number"><?php echo esc_attr($number); ?></span>
				<span class="lesson-icon"><i class="<?php echo training_wpo_related_post(); ?>"></i></span>
				<a class="title" href="<?php the_permalink() ?>"><?php the_title() ?>
					<?php if($student_can_study){ ?>
		            <i class="zmdi zmdi-check"></i>
		         <?php }else{ ?>
		            <span class="zmdi zmdi-lock-outline"></span>
		         <?php } ?>
		         <div class="clearfix"></div>
				<?php if(isset($options['duration']) && $options['duration']) :?>
		         <span class="duration"><?php echo esc_attr($options['duration']) ?></span>
		   	<?php endif ?>
				</a>
			</div>
		<?php
			}
			wp_reset_postdata();
		}	 
 	}

 	/**
 	 * Add comment support for course
 	 */
 	function training_wpo_ib_add_support_course_comments( $args ){
 		array_push( $args['supports'] , 'comments' );
 		return $args;
 	}
 	add_filter( 'ib_educator_cpt_course', 'training_wpo_ib_add_support_course_comments' );

 	/**
 	 * Add comment support for course
 	 */
 	function training_wpo_ib_add_support_lesson_formats( $args ){
 		array_push( $args['supports'] , 'post-formats' );
 		return $args;
 	}
 	add_filter( 'ib_educator_cpt_lesson', 'training_wpo_ib_add_support_lesson_formats' );


 	function training_wpo_ib_update_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' ) {
		return update_metadata( 'ib_taxonomy_data', $term_id, $meta_key, $meta_value, $prev_value );
	}

	function training_wpo_ib_get_term_meta( $term_id, $key, $single = true ) {
		return get_metadata( 'ib_taxonomy_data', $term_id, $key, $single );
	}

	function training_wpo_ib_add_term_meta( $term_id, $meta_key, $meta_value, $unique = false ){
		return add_metadata( 'ib_taxonomy_data', $term_id, $meta_key, $meta_value, $unique );
	}
 	/**
 	 * add categories images
 	 */
 	function training_wpo_ib_add_form_fields(){  
 	?>
 	<div class="form-field">
		<label><?php esc_html_e( 'Thumbnail', 'training' ); ?></label>
		<div id="ib_taxonomy_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" /></div>
		<div style="line-height: 60px;">
			<input type="hidden" id="ib_taxonomy_thumbnail_id" name="ib_taxonomy_thumbnail_id" />
			<button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'training' ); ?></button>
			<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'training' ); ?></button>
		</div>
		<script type="text/javascript">

			// Only show the "remove image" button when needed
			if ( ! jQuery( '#ib_taxonomy_thumbnail_id' ).val() ) {
				jQuery( '.remove_image_button' ).hide();
			}

			// Uploading files
			var file_frame;

			jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					file_frame.open();
					return;
				}

				// Create the media frame.
				file_frame = wp.media.frames.downloadable_file = wp.media({
					title: '<?php esc_html_e( "Choose an image", 'training' ); ?>',
					button: {
						text: '<?php esc_html_e( "Use image", 'training' ); ?>'
					},
					multiple: false
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					var attachment = file_frame.state().get( 'selection' ).first().toJSON();
					var url = attachment.sizes.thumbnail? attachment.sizes.thumbnail.url:attachment.sizes.full.url;
					jQuery( '#ib_taxonomy_thumbnail_id' ).val( attachment.id );
					jQuery( '#ib_taxonomy_thumbnail img' ).attr( 'src',  url );
					jQuery( '.remove_image_button' ).show();
				});

				// Finally, open the modal.
				file_frame.open();
			});

			jQuery( document ).on( 'click', '.remove_image_button', function() {
				jQuery( '#ib_taxonomy_thumbnail img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
				jQuery( '#ib_taxonomy_thumbnail_id' ).val( '' );
				jQuery( '.remove_image_button' ).hide();
				return false;
			});

		</script>
		<div class="clear"></div>
	</div>
 	<?php }

	/**
	 *
	 *
	 */
	function training_wpo_ib_edit_form_fields( $term, $taxonomy ) {
		 
		$image 			= '';
		$thumbnail_id 	= absint( training_wpo_ib_add_term_meta( $term->term_id, 'thumbnail_id', true ) );
		if ( $thumbnail_id )
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		else
		{
			$image = "";	
		}
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'training' ); ?></label></th>
			<td>
				<div id="ib_taxonomy_thumbnail" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="ib_taxonomy_thumbnail_id" name="ib_taxonomy_thumbnail_id" value="<?php echo esc_attr($thumbnail_id); ?>" />
					<button type="button" class="upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'training' ); ?></button>
					<button type="button" class="remove_image_button button"><?php esc_html_e( 'Remove image', 'training' ); ?></button>
				</div>
				<script type="text/javascript">

					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#ib_taxonomy_thumbnail_id' ).val() ) {
						jQuery( '.remove_image_button' ).hide();
					}

					// Uploading files
					var file_frame;

					jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

						event.preventDefault();

						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}

						// Create the media frame.
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php esc_html_e( "Choose an image", 'training' ); ?>',
							button: {
								text: '<?php esc_html_e( "Use image", 'training' ); ?>'
							},
							multiple: false
						});

						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							var attachment = file_frame.state().get( 'selection' ).first().toJSON();

		
							var url = attachment.sizes.thumbnail? attachment.sizes.thumbnail.url:attachment.sizes.full.url;

							jQuery( '#ib_taxonomy_thumbnail_id' ).val( attachment.id );
							jQuery( '#ib_taxonomy_thumbnail img' ).attr( 'src', url );
							jQuery( '.remove_image_button' ).show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery( document ).on( 'click', '.remove_image_button', function() {
						jQuery( '#ib_taxonomy_thumbnail img' ).attr( 'src', '<?php echo esc_js( "" ); ?>' );
						jQuery( '#ib_taxonomy_thumbnail_id' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						return false;
					});

				</script>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}


 	
 	function training_wpo_ib_taxonomy_save_data(  $term_id, $tt_id, $taxonomy ){

 		if ( isset( $_POST['ib_taxonomy_thumbnail_id'] ) && 'ib_educator_category' === $taxonomy ) {
			training_wpo_ib_update_term_meta( $term_id, 'thumbnail_id', absint( $_POST['ib_taxonomy_thumbnail_id'] ) );
		}
		
 	}
 	function training_wpo_ib_taxonomy_process(){
 		add_action( 'ib_educator_category_add_form_fields', 'training_wpo_ib_add_form_fields' , 10 );
 		add_action( 'ib_educator_category_edit_form_fields', 'training_wpo_ib_edit_form_fields' ,  10, 2  );
 		add_action( 'created_term',  'training_wpo_ib_taxonomy_save_data' , 10, 3 );
		add_action( 'edit_term',  'training_wpo_ib_taxonomy_save_data' , 10, 3 );
 	}	
 	add_action('admin_init', 'training_wpo_ib_taxonomy_process', 10 );


function training_wpo_template_chooser($template)   
{    
 global $wp_query;   
 $post_type = get_query_var('post_type');   
 if( isset($_GET['s']) && $post_type == 'ib_educator_course' )   
 {
  return locate_template('search-courses.php'); 
 }   
 return $template;   
}
add_filter('template_include', 'training_wpo_template_chooser');
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
class Training_WpoUserLogin{

	/**
	 * @var boolean $ispopup 
	 */
	private $ispopup = true; 

	/**
	 * Constructor 
	 */
	public function __construct(){
		
		add_action('init', array($this,'setup'), 1000);
		add_action( 'wp_ajax_nopriv_wpoajaxlogin',  array($this,'ajaxDoLogin') );
		add_action( 'wp_ajax_nopriv_wpoajaxlostpass',  array($this,'doForgotPassword') );

	}


	/**
	 * process login function with ajax request
	 *
 	 * ouput Json Data with messsage and login status
	 */
	public function ajaxDoLogin(){
		// First check the nonce, if it fails the function will break
   		check_ajax_referer( 'ajax-wpo-login-nonce', 'security' );
   		$result = $this->doLogin($_POST['wpo_username'], $_POST['wpo_password'],  isset($_POST['remember']) ); 
   		
   		echo trim($result);
   		die();
	}


	/**
	 * process user login with username/password
	 *
	 * return Json Data with messsage and login status
	 */
	public function doLogin( $username, $password, $remember=false ){
		$info = array();
   		
   		$info['user_login'] = $username;
	    $info['user_password'] = $password;
	    $info['remember'] = $remember;
		
		$user_signon = wp_signon( $info, false );
	    if ( is_wp_error($user_signon) ){
			return json_encode(array('loggedin'=>false, 'message'=>esc_html__('Wrong username or password. Please try again!!!', 'training')));
	    } else {
			wp_set_current_user($user_signon->ID); 
	        return json_encode(array('loggedin'=>true, 'message'=>esc_html__('Signin successful, redirecting...', 'training')));
	    }
	}


	/**
	 * process user doForgotPassword with username/password
	 *
	 * return Json Data with messsage and login status
	 */	
	public function doForgotPassword(){
	 
		// First check the nonce, if it fails the function will break
	    check_ajax_referer( 'ajax-wpo-lostpassword-nonce', 'security' );
		
		global $wpdb;
		
		$account = $_POST['user_login'];
		
		if( empty( $account ) ) {
			$error = esc_html__( 'Enter an username or e-mail address.', 'training' );
		} else {
			if(is_email( $account )) {
				if( email_exists($account) ) 
					$get_by = 'email';
				else	
					$error = esc_html__( 'There is no user registered with that email address.', 'training' );			
			}
			else if (validate_username( $account )) {
				if( username_exists($account) ) 
					$get_by = 'login';
				else	
					$error = esc_html__( 'There is no user registered with that username.', 'training' );				
			}
			else
				$error = esc_html__(  'Invalid username or e-mail address.', 'training' );		
		}	
		
		if(empty ($error)) {
			$random_password = wp_generate_password();

			$user = get_user_by( $get_by, $account );
				
			$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
				
			if( $update_user ) {
				
				$from = get_option('admin_email'); // Set whatever you want like mail@yourdomain.com
				
				if(!(isset($from) && is_email($from))) {		
					$sitename = strtolower( $_SERVER['SERVER_NAME'] );
					if ( substr( $sitename, 0, 4 ) == 'www.' ) {
						$sitename = substr( $sitename, 4 );					
					}
					$from = 'do-not-reply@'.$sitename; 
				}
				
				$to = $user->user_email;
				$subject = esc_html__( 'Your new password', 'training' );
				$sender = 'From: '.get_option('name').' <'.$from.'>' . "\r\n";
				
				$message = esc_html__( 'Your new password is: ', 'training' ) .$random_password;
					
				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers[] = "X-Mailer: PHP \r\n";
				$headers[] = $sender;
					
				$mail = wp_mail( $to, $subject, $message, $headers );
				if( $mail ) 
					$success = esc_html__( 'Check your email address for you new password.', 'training' );
				else
					$error = esc_html__( 'System is unable to send you mail containg your new password.', 'training' );						
			} else {
				$error =  esc_html__( 'Oops! Something went wrong while updating your account.', 'training' );
			}
		}
	
		if( ! empty( $error ) )
			echo json_encode(array('loggedin'=>false, 'message'=> $error));
				
		if( ! empty( $success ) )
			echo json_encode(array('loggedin'=>false, 'message'=> $success ));	
		die();
	}


	/**
	 * add all actions will be called when user login.
	 */
	public function setup(){
		if ( !is_user_logged_in() ) {
			add_action('wp_footer', array( $this,'signin') );
		}
		add_action( 'wpo-login-button', array( $this, 'button' ) );

	}

	/**
	 * render link login or show greeting when user logined in
	 *
	 * @return String.
	 */
	public function button(){
		if ( !is_user_logged_in() ) {
			echo '<a href="#"  data-toggle="modal" data-target="#modalLoginForm" class="wpo-user-login btn btn-sm btn-inverse btn-success radius-4x">'.esc_html__( 'Login','training' ).'</a>';
		}else {
			return $this->greetingContext();
		}
	}

	/**
	 * check if user not login that showing the form
	 */
	public function signin(){
		if ( !is_user_logged_in() ) {
 			return $this->form();
		}	
	}

	/**
	 * Display greeting words
	 */
	public function greeting(){
		$current_user = wp_get_current_user();
		$link = esc_url(wp_logout_url( home_url() ));
		printf('Greeting %s (%s)', $current_user->user_nicename, '<a href="'.$link.'" title="'.esc_html__( 'Logout', 'training' ).'">'.esc_html__( 'Logout', 'training' ).'</a>' );
	}

	/**
	 *
	 */
	public function greetingContext(){
		$current_user = wp_get_current_user();
		$link = esc_url(wp_logout_url( home_url() ));

		echo ' <div class="account-links dropdown">
				  <a href="#" class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    '.esc_html__( 'Howdy', 'training').', '.$current_user->user_nicename.'
				    <span class="caret"></span>
				  </a>
				 <a class="signout" href="'.$link.'" title="'.esc_html__( 'Logout', 'training' ).'">'.esc_html__( 'Logout', 'training' ).'</a>
				<div class="dropdown-menu">';
				    $args = array(
                        'theme_location'  => 'accountmenu',
                        'container_class' => '',
                        'menu_class'      => 'myaccount-menu'
                    );
                    wp_nav_menu($args);
	 	     
		echo		  '</div>
				</div>';

	}

	/**
	 * render login form
	 */
	public function form(){
		    echo '
			    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog">
				      <div class="modal-dialog" role="document">
						<div class="modal-content"><div class="modal-body">';
			
			echo 		'	<div class="inner">
					    		<a href="'.esc_url(get_site_url()).'">
										<img class="img-responsive center-image" src="'.get_template_directory_uri().'/images/logo.png" alt="" >
								</a>
						   <div id="wpologinform" class="form-wrapper"> <form class="login-form" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
						     
						    	<p class="lead">'.esc_html__("Hello, Welcome Back!", 'training').'</p>
							    <div class="form-group">
								    <input autocomplete="off" type="text" name="wpo_username" class="required form-control"  placeholder="'.esc_html__("Username",'training').'" />
							    </div>
							    <div class="form-group">
								    <input autocomplete="off" type="password" class="password required form-control" placeholder="'.esc_html__("Password",'training').'" name="wpo_password" >
							    </div>
							     <div class="form-group">
							   	 	<label for="wpo-user-remember" ><input type="checkbox" name="remember" id="wpo-user-remember" value="true"> '.esc_html__("Remember Me",'training').'</label>
							    </div>
							    <div class="form-group">
							    	<input type="submit" class="btn btn-primary" name="submit" value="'.esc_html__("Log In",'training').'"/>
							    	<input type="button" class="btn btn-default btn-cancel" name="cancel" value="'.esc_html__("Cancel",'training').'"/>
							    </div>
					';
					    echo '<p><a href="#wpolostpasswordform" class="toggle-links" title="'.esc_html__("Forgot Password",'training').'">'.esc_html__("Lost Your Password?",'training').'</a></p>';	
					    if(get_option('register_page_id')){ 
					    	echo "<p>".esc_html__('Dont not have an account?', 'training' )." <a href='".esc_url(get_permalink( get_option('register_page_id') ))."' title='".esc_html__('Sign Up','themeum')."'>".esc_html__('Sign Up', 'training')."</a></p>";	
					    }
						    do_action('login_form');
						    wp_nonce_field('ajax-wpo-login-nonce', 'security');
		    echo '</form></div>';
		    echo '<div id="wpolostpasswordform" class="form-wrapper">';
		    print $this->resetForm();
		   	echo '</div>';
		    echo '		</div></div></div>
					</div>
				</div>';


	}
 	
 	public function resetForm() {
		$output = sprintf('
				<form name="lostpasswordform" id="lostpasswordform" class="lostpassword-form" action="%s" method="post">
					<p class="lead">%s</p>
					<div class="lostpassword-fields">
					<p class="form-group">
						<label>%s<br />
						<input type="text" name="user_login" class="user_login form-control" value="" size="20" tabindex="10" /></label>
					</p>',
							site_url('wp-login.php?action=lostpassword', 'login_post'),
							esc_html__('Reset Password', 'training'),
							esc_html__('Username or E-mail:', 'training')
						);

						ob_start();
						do_action('lostpassword_form');

						wp_nonce_field('ajax-wpo-lostpassword-nonce', 'security');
						$output .= ob_get_clean();

						$output .= sprintf('
					<p class="submit">
						<input type="submit" class="btn btn-primary" name="wp-submit" value="%s" tabindex="100" />
						<input type="button" class="btn btn-default btn-cancel" value="%s" tabindex="101" />
					</p>
					<p class="nav">
						',
							esc_html__('Get New Password', 'training'),
							esc_html__('Cancel', 'training')
							 
							
						);
						$output .= '
					</p>
					</div>
 					<div class="lostpassword-link"><a href="#wpologinform" class="toggle-links">'.esc_html__('Back To Login', 'training').'</a></div>
				</form>';

		return $output;
	}



}

new Training_WpoUserLogin();
?>
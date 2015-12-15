<?php 

class Training_WPO_Teacher {

	private $postId = 0; 

	private $data = null; 

	private $meta = array(); 

	public function __construct( $post ){
		$this->postId = $post->ID;
		$this->meta =   get_post_meta(get_the_ID(),'wpo_teacher',true);

		$this->meta = array_merge( array(
			'job' 	     => '',
			'phone'	     => '',
			'email'      => '',
			'facebook'   =>'#',
			'twitter'    => '',
			'google'	=> '',
			'linkedin'   => '',
			'experience' => '',
			'specializedin' => '',
			'link'	=> '',
			'teacher_relatedcourses' => ''
		), $this->meta ); 
	}
	
	public static function load( $post ){
		return new self( $post );
	}

	public function meta( $key ){
		if(isset($this->meta[$key]) && $this->meta[$key])
			return $this->meta[$key]; 
		return false;
	}

	public function getCourses(){
		$output = array();

		return $output; 
	}

	public static function getLinkById(){
		
	}
}

?>
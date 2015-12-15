<?php global $post; $teacher = Training_WPO_Teacher::load( $post ); 
	
	$courses = $teacher->getCourses();
?>

<article id="post-<?php the_ID(); ?>" class="post-teacher">
 
    <div class="row">
      <div class="col-lg-5 col-md-6">
          <div class="teacher-header">
              <?php the_post_thumbnail('full'); ?>
          </div> 
      </div>
      <div class="col-lg-7 col-md-6">
          <div class="teacher-body">
             <div class="teacher-body-content">
                <h3 class="teacher-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <p class="teacher-position"><?php echo trim($teacher->meta('job')) ?></p>
             </div>  
             <div class="teacher-info">
               <?php echo training_wpo_excerpt(16, '...'); ?>
             </div>      
             <div class="bo-social-icons text-left">
                <?php if( $teacher->meta( 'facebook' ) ){ ?>
                <a href="<?php echo esc_url($teacher->meta('facebook')); ?>" class="bo-social-facebook bo-social-white"><i class="fa fa-facebook"></i></a>
                <?php } ?>
                <?php if( $teacher->meta( 'twitter' ) ){ ?>
                <a href="<?php echo esc_url($teacher->meta('twitter')); ?>" class="bo-social-twitter bo-social-white"><i class="fa fa-twitter"></i></a>
                <?php } ?>
                <?php if( $teacher->meta( 'linkedin' ) ){ ?>
                <a href="<?php echo esc_url($teacher->meta('linkedin')); ?>" class="bo-social-linkedin bo-social-white"><i class="fa fa-linkedin"></i></a>
                <?php } ?>
                <?php if( $teacher->meta( 'google' ) ){ ?>
                <a href="<?php echo esc_url($teacher->meta('google')); ?>" class="bo-social-google bo-social-white"><i class="fa fa-google"></i></a>
                <?php } ?>  
             </div>                          
          </div>                            
      </div>
    </div>

</article>
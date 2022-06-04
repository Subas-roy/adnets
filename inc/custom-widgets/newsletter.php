<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Create a widget 1
    //
    CSF::createWidget( 'subs_and_gallery', array(
      'title'       => 'Adnets Subs And Gallery',
      'classname'   => 'csf-widget-classname',
      'description' => 'Widget to display the subs form and gallery',
      'fields'      => array(
  
        array(
          'id'      => 'title',
          'type'    => 'text',
          'title'   => 'Title',
        ),
        array(
            'id'      => 'subs-form-shortcode',
            'type'    => 'text',
            'title'   => 'Subs Form Shortcode',
            'desc'   => 'For accurate design use this form
                        <xmp>
                        <form action="#">
                            <input class="subs-input mt-4" placeholder="your email address" type="text">
                            <button class="sign-up mt-4">sign up</button>
                        </form>
                        </xmp>',
        ),
        array(
          'id'      => 'tagline',
          'type'    => 'text',
          'title'   => 'Tagline',
        ), 
        array(
			'id' => 'advertisements',
			'type' => 'repeater',
			'title' => 'Advertisements',
			'fields' => array(
				array(
					'id'      => 'image',
					'type'    => 'media',
					'title'   => 'Ad Image',
				  ),
				  array(
					'id'      => 'image-url',
					'type'    => 'text',
					'title'   => 'Ad URL',
				  ),
			)
		)
    
      )
    ) );
  
    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if( ! function_exists( 'subs_and_gallery' ) ) {
      function subs_and_gallery( $args, $instance ) { ?>
        
        <!-- subs & gallery widget -->
        <div class="mp_single-card sidebar-widget global-card mt-30">
            <div class="gradient-box">
                <span class="float-icon"><i class="fa-solid fa-envelope"></i></span>
                <h5 class="text-uppercase"><?php echo $instance['title']; ?></h5>
				
                <?php echo do_shortcode($instance['subs-form-shortcode']) ?>
                <small><?php echo isset($instance['tagline']) ? $instance['tagline'] : 'We do not spam'; ?></small>
            </div>
            <div class="row">
				
				<?php 
				$advertisements = isset($instance['advertisements']) ? $instance['advertisements'] : array();
				if(is_array( $advertisements ) && count($advertisements) > 0) :
				foreach($advertisements as $ad) : 
				?>
                <div class="col-6 col-md-3 col-lg-6 mt-4">
                  <a href="<?php echo $ad['image-url'] ?>" target="_blank">
                    <img class="h-100" src="<?php echo $ad['image']['url'] ?>" alt="">
                  </a>
                </div>
				<?php endforeach; endif; ?>
                

            </div>
        </div>

        <?php   
      }
    }
  
}
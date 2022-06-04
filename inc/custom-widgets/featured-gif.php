<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Create a widget 1
	//
	CSF::createWidget( 'adnets_featured_gif', array(
	  'title'       => 'Adnets Featured GIF',
	  'classname'   => 'csf-widget-classname',
	  'description' => 'Widget to display featured GIF',
	  'fields'      => array(
  
		array(
		  'id'      => 'featured-gif',
		  'type'    => 'media',
		  'title'   => 'Upload Featured GIF',
		),
		array(
			'id'      => 'gif-url',
			'type'    => 'text',
			'title'   => 'GIF Url',
		  )
  
	  )
	) );
  
	//
	// Front-end display of widget example 1
	// Attention: This function named considering above widget base id.
	//
	if( ! function_exists( 'adnets_featured_gif' ) ) {
	  function adnets_featured_gif( $args, $instance ) { ?>

        <!-- gif widget -->
        <div class="mp_single-card featured-widget sidebar-widget global-card mt-30">
            <a href="<?php echo $instance['gif-url'] ?>" target="_blank">   
                <img src="<?php echo $instance['featured-gif']['url'] ?>" alt="">
            </a>
        </div>

		<?php 
	  }
	}
  
  }

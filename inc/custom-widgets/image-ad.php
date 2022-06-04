<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Create a widget 1
	//
	CSF::createWidget( 'adnets_image_ad', array(
	  'title'       => 'Adnets Image Ad',
	  'classname'   => 'csf-widget-classname',
	  'description' => 'A description for widget example 1',
	  'fields'      => array(
  
		array(
		  'id'      => 'ad-image',
		  'type'    => 'media',
		  'title'   => 'Upload Image Ad',
		),
		array(
			'id'      => 'ad-url',
			'type'    => 'text',
			'title'   => 'Ad Url',
		  )
  
	  )
	) );
  
	//
	// Front-end display of widget example 1
	// Attention: This function named considering above widget base id.
	//
	if( ! function_exists( 'adnets_image_ad' ) ) {
	  function adnets_image_ad( $args, $instance ) { ?>
		<!-- ads widget -->
		<div class="mt-30">
			<a href="<?php echo $instance['ad-url'] ?>" target="_blank">
				<img src="<?php echo $instance['ad-image']['url'] ?>" alt="">
			</a>
		</div>

		<?php 
	  }
	}
  
  }


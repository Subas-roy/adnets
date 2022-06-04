<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Create a widget 1
    //
    CSF::createWidget( 'adnets_fretured_networks', array(
      'title'       => 'Adnets Featured Networks',
      'classname'   => 'csf-widget-classname',
      'description' => 'Widget to display featured networks',
      'fields'      => array(
  
        array(
          'id'      => 'title',
          'type'    => 'text',
          'title'   => 'Title',
        ),

        array(
          'id'     => 'featured-networks',
          'type'   => 'repeater',
          'title'  => 'Network',
          'fields' => array(
            array(
              'id'      => 'network-image',
              'type'    => 'media',
              'title'   => 'Network Image',
            ),array(
              'id'      => 'network-title',
              'type'    => 'text',
              'title'   => 'Network Title',
            ),
            array(
              'id'      => 'rating-amnt',
              'type'    => 'text',
              'title'   => 'Rating Amount',
            ),
            array(
              'id'      => 'btn-text',
              'type'    => 'text',
              'title'   => 'Button Text',
            ),
            array(
              'id'      => 'network-url',
              'type'    => 'text',
              'title'   => 'Network URL',
            ),
          )
        ),
      )
    ) );
  
    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if( ! function_exists( 'adnets_fretured_networks' ) ) {
      function adnets_fretured_networks( $args, $instance ) { ?>
        <div class="mp_single-card featured-widget sidebar-widget global-card mt-30">
            <h6 class="section-title mb-30"><?php echo $instance['title']; ?></h6>
            
                <?php 
                $networks = isset($instance['featured-networks']) ? $instance['featured-networks'] : array();
                if(is_array( $networks ) && count($networks) > 0) :
                foreach($networks as $network) : 
                ?>
                <div class="fea-wrapper mt-4">
                <ul class="list-item ">
                    <li class="me-3"><img class="img" src="<?php echo $network['network-image']['url'] ?>" alt=""></li>

                    <li class="me-3" i><a class="title" href="<?php echo $network['network-url'] ?>"><?php echo $network['network-title'] ?></a></li>

                    <li class="me-3"><span class="rating-amnt"><?php echo $network['rating-amnt'] ?></span></li>

                    <li><a href="<?php echo $network['network-url'] ?>" class="btn1"><?php echo $network['btn-text'] ?></a></li>
                </ul>
                </div>
                <?php endforeach; endif; ?>
            
        </div>  
        <?php 
        
      }
    }
  
}

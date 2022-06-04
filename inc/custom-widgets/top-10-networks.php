<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Create a widget 1
  //
  CSF::createWidget( 'top_10_networks', array(
    'title'       => 'Adnets Top 10 Rate Networks',
    'classname'   => 'top-10-networks',
    'description' => 'Widget to display Top 10 Rate Networks',
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => 'Title',
        ),
        array(
            'id'      => 'top-10-networks',
            'type'    => 'repeater',
            'title'   => 'Add Network',
            'fields'    =>  array(
                array(
                    'id'      => 'sl-no',
                    'type'    => 'text',
                    'title'   => 'Serial Number',
                ),
                array(
                    'id'      => 'network-title',
                    'type'    => 'text',
                    'title'   => 'Network Title',
                ),
                array(
                    'id'      => 'reviews',
                    'type'    => 'text',
                    'title'   => 'Reviews',
                    'default'   =>  '0',
                ),
                array(
                    'id'      => 'rating',
                    'type'    => 'text',
                    'title'   => 'Rating',
                ),
                array(
                    'id'      => 'network-url',
                    'type'    => 'text',
                    'title'   => 'Network URLs',
                )
        )
    )
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'top_10_networks' ) ) {
    function top_10_networks( $args, $instance ) { ?>

      <!-- top 10 networks widget -->
        <div class="mp_single-card top-rate-networks sidebar-widget global-card mt-30 mt-30">
            <h6 class="section-title text-start mb-30"><?php echo $instance['title']; ?></h6>
            <?php
            $networks = isset($instance['top-10-networks']) ? $instance['top-10-networks'] : array();
            if( is_array($networks) && count($networks) > 0 ) :
            foreach( $networks as $network) :
            ?>
            <ul>
                <li class="d-flex align-items-center flex-wrap mt-4">
                    <span class="sl active"><?php echo $network['sl-no']; ?></span>
                    <a href="<?php echo $network['network-url'] ?>" class="list"><?php echo $network['network-title']; ?></a>
                    <span class="total">(<?php echo isset($network['reviews']) ? $network['reviews'] : ''; ?>)</span>
                    <span class="rating"><?php echo $network['rating']; ?></span>
                </li>
            </ul>
            <?php endforeach; endif; ?>
        </div>
    <?php

    }
  }
}



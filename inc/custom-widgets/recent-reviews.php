<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Create a widget 1
  //
  CSF::createWidget( 'adnets_recent_reviews', array(
    'title'       => 'Adnets Recent Reviews',
    'classname'   => 'csf-widget-classname',
    'description' => 'Widget to display recent reviews',
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => 'Title',
      ),

      array(
        'id'     => 'recent-reviews',
        'type'   => 'repeater',
        'title'  => 'Review',
        'fields' => array(
          array(
            'id'    => 'reviewer',
            'type'  => 'media',
            'title' => 'Image of reviewer',
          ),
          array(
            'id'    => 'review-title',
            'type'  => 'text',
            'title' => 'Review Title',
          ),
          array(
            'id'    => 'review-username',
            'type'  => 'text',
            'title' => 'Username',
          ),
          array(
            'id'    => 'review-time',
            'type'  => 'text',
            'title' => 'Time of review',
          ),
          array(
            'id'    => 'content',
            'type'  => 'textarea',
            'title' => 'Content of review',
          ),
          array(
            'id'    => 'review-url',
            'type'  => 'text',
            'title' => 'Review URL',
          ),
        ),
      ),
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'adnets_recent_reviews' ) ) {
    function adnets_recent_reviews( $args, $instance ) { ?>
    
        <div class="mp_single-card recent-review sidebar-widget global-card mt-30">
            <h6 class="section-title mb-30"><?php echo $instance['title']; ?></h6>
            <?php 
            $reviews = isset($instance['recent-reviews']) ? $instance['recent-reviews'] : array();
            if(is_array( $reviews ) && count($reviews) > 0) :
            foreach($reviews as $review) : 
            ?>
            <div class="single-review mt-4">
                <img class="user-img" src="<?php echo $review['reviewer']['url']; ?>" alt="">
                <div>
                    <span class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo $review['review-url']; ?>">
                            <h6 class="title"><?php echo $review['review-title']; ?></h6>
                        </a>
                        <a class="title-tag" href="<?php echo $review['review-url']; ?>">
                        <?php echo $review['review-username']; ?>
                        </a>
                    </span>
                    <span class="d-flex align-items-center">
                        <span class="ratings-wrapper">
                            <a href="#"> <i class="fa-solid fa-star"></i></a>
                            <a href="#"> <i class="fa-solid fa-star"></i></a>
                            <a href="#"> <i class="fa-solid fa-star"></i></a>
                            <a href="#"> <i class="fa-solid fa-star"></i></a>
                            <a href="#"><i class="fa-solid fa-star-half-stroke"></i></a>
                        </span>
                        <span class="day ms-4">
                            <?php echo $review['review-time']; ?>
                        </span>
                    </span>
                    <p class="extra-small mt-2">
                        <?php echo $review['content']; ?>
                    </p>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div> 
    <?php

    }
  }
}


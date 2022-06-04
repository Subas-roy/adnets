<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Create a widget 1
  //
  
  $all_networks = new WP_Query(array(
    'post_type' => 'network',
    'posts_per_page' => -1
  ));

  $networks = array();

  while($all_networks->have_posts()) {
    $all_networks->the_post();

    $networks[get_the_ID()] = get_the_title();
  } 
  CSF::createWidget( 'adnets_network_of_the_month', array(
    'title'       => 'Adnets Network of the month',
    'classname'   => 'csf-widget-classname',
    'description' => 'Widget to display the network of the month',
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => 'Title',
      ),
      array(
            'title' => __('Network of the month ', 'adnets'),
            'type'  => 'select',
            'id'    =>  'top-network',
            'placeholder' => 'Select a network',
            'options' => $networks
      )
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'adnets_network_of_the_month' ) ) {
    function adnets_network_of_the_month( $args, $instance ) { 
    ?>
    
        <!-- network widget -->
        <div class="mp_single-card sidebar-widget global-card">
            <?php
            $network = new WP_Query(array(
                'post_type' => 'network',
                'posts_per_page' => 1,
                'p' => $instance['top-network']
            ));

            while($network->have_posts()) : $network->the_post();
            $meta = get_post_meta(get_the_ID(), '_adnets_network_options', true);

            $rating = isset($meta['rating']) ? $meta['rating'] : 0;

            $total_comments = get_comments_number();

            $comments = get_comments(array(
                'post_id' => get_the_ID(),
            ));
            $total_rating = 0;
            foreach($comments as $comment) {
                $comment_id = $comment->comment_ID;
                $comment_rating = get_comment_meta( $comment_id, 'ic_review_rating', true);

                $total_rating += $comment_rating;
            }

            $average_rating = get_comments_number() > 0 ? number_format( (float)$total_rating/get_comments_number(), 2, '.', '' ) : 0;
            ?>
            <h6 class="section-title mb-30">
              <?php echo $instance['title']; ?>
            </h6>
            <?php the_post_thumbnail(' m-img mx-auto'); ?>   
            <span class="d-flex align-items-center mt-20">
                <span class="ratings-wrapper me-4">
                    <?php for($i = 0; $i < round( $average_rating ); $i++) : ?>
                        <a href=""> <i class="fa-solid fa-star"></i></a>
                    <?php endfor; ?>
                </span>
                <a href="<?php the_permalink(); ?>">
                    <h6 class="title me-4"><?php the_title(); ?></h6>
                </a>
            </span>
            <p class="mt-10">
              <?php echo wp_trim_words( get_the_content(), 20, ''); ?>
            </p>
        </div>
        <?php endwhile; ?>
  <?php 
    }
  }

}

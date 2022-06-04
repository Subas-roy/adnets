<?php get_header();
/*
Template name: All Offers
*/
?>



<!-- section divider   -->
    <div class="container mt-30">
        <div class="row">
            <!-- right side content -->
            <div class="col-lg-10 offset-lg-1">
                <!-- hero section -->
                <div class="row">
                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => 'post',
                );

                // The Query
                $query = new WP_Query( $args );

            

                // Restore original Post Data
                wp_reset_postdata();

                ?>
                

              
                <div class="premium-networks affiliate-section global-card mt-30">
                    <!-- title box -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-20 px-4">
                        <h6 class="section-title">affiliate offers</h6>

                    </div>

                    <!-- single card -->
                    <?php 
                    $offers = new WP_Query(array(
                        'post_type' => 'offers',
                        'posts_per_page' => -1
                    ));

                    while($offers->have_posts()) : $offers->the_post();

                    $offer_meta = get_post_meta( get_the_ID(), '_adnets_offer_options', true );
                    ?>

                    <div
                        class="mp_single-card mp_single-card_2 d-flex align-items-center justify-content-between flex-wrap mt-30 mx-4">
                        <span class="d-flex align-items-center flex-column flex-md-row">
                            <span class="me-md-4">
                                <?php the_post_thumbnail(); ?>
                            </span>
                            <span>
                                <a href="<?php the_permalink(); ?>">
                                    <h6 class="title mt-4 mb-3 mt-md-0"><?php the_title(); ?>
                                    </h6>
                                </a>
                                <!-- <p class="mt-10"><?php echo wp_trim_words( get_the_content(), 10, '' ); ?></p> -->
                                <span
                                    class="d-flex justify-content-md-start align-items-center flex-wrap justify-content-center mt-10">
                                    
                                    <!-- <span class="tags me-3"><?php echo get_the_title( $offer_meta['offer-network'] ); ?></span> -->
                                    <span class="tags me-3">
                                    <?php 
                                        $types = get_the_terms( $post->ID, 'offer-type' );
                                        $total_type = count( $types );
                                        for($i = 0; $i < $total_type; $i++){
                                            
                                            echo $types[$i]->name;
                                            if( $i != ($total_type-1) ){
                                                echo ', ';
                                            }
                                        }
                                    ?>
                                    </span>
                                    <span class="ratings-number me-3">% <?php echo number_format( (float)$offer_meta['commission-percentage'], 2, '.', '' ); ?></span>
                                    <h6><?php echo $offer_meta['extra-text']; ?></h6>
                                </span>
                            </span>
                        </span>

                        <span class="pricing-box d-flex align-items-center">
                            <h6 class="primary-color me-3">$2.00</h6>
                            <a href="<?php the_permalink(); ?>" class="btn2">Offer Details</a>
                        </span>
                    </div>

                    <?php endwhile; ?>


                    
                </div>



            </div>

            </div>

        </div>
    </div>



<?php

get_footer();
?>

<?php get_header();
/*
Template name: All Networks
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
                

              
                <!-- Blog-->
                <div class="premium-networks global-card mt-30">
                    <div class=" mb-20 px-4">
                        <h6 class="section-title mb-40">
                        	<?php the_title();?>
                        </h6>
                        <!-- blog content image -->
                        <img class="mb-40" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">

                        <p class="mb-30">

                        <?php
                    
                        $premium = new WP_Query( array( 
                            'post_type' =>	'network',
                            'category' => 'premium-networks', 
                            'posts_per_page' => -1 
                        ) ); 
                        
                        while($premium->have_posts()) : $premium->the_post(); 
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

                        $average_rating = number_format( (float)$total_rating/get_comments_number(), 2, '.', '' );

                        ?>

                    <!-- single card -->
                    <div class="mp_single-card d-flex align-items-center mt-30 mx-4">
                        <!-- left side img -->
                        <div class="me-md-4">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div>
                            <!-- top  -->
                            <span class="top-card-info">
                                <a href="<?php the_permalink(); ?>">
                                    <h6 class="title"><?php the_title(); ?></h6>
                                </a>
                                <span class="ratings-wrapper">
                                    <?php for($i = 0; $i < round( $average_rating ); $i++) : ?>
                                        <a href=""> <i class="fa-solid fa-star"></i></a>
                                    <?php endfor; ?>
                                </span>
                                <span class="separator">
                                    _
                                </span>
                                <!-- <span class="icon-wraper">
                                        <a class="card-icon" href="#"><i class="fa-solid fa-ticket"></i></a>
                                        <span class="separator">
                                            _
                                        </span>
                                        <a class="card-icon" href="#"><i class="fa-solid fa-heart"></i></a>
                                        <span class="separator">
                                            _
                                        </span>
                                        <a class="card-icon" href="#"><i class="fa-solid fa-briefcase"></i></a>
                                    </span> -->
                                <span class="ratings-number">
                                    <?php 
                                    $metadata = get_post_meta( get_the_ID(), '_adnets_network_options', true ); echo $average_rating; ?>
                                </span>
                                <a href="<?php echo isset($metadata['button-url']) ? $metadata['button-url'] : ''; ?>" class="btn2 card-btn">join</a>
                            </span>

                            <!-- mid text -->
                            <p class="mt-10">
                                <?php echo wp_trim_words(get_the_content(), 30, ''); ?>
                            </p>

                            <!-- bottom  -->
                            <ul class="bottom-card-info mt-10">
                                <li><?php comments_number('no reviews', '1 review', '% reviews'); ?></li>
                                <li class="separator">_</li>
                                <li>Offers: <?php echo $metadata['offers'] ?></li>
                                <li class="separator">_</li>
                                <li><?php echo $metadata['place'] ?></li>
                                <li class="separator">_</li>
                                <li><?php echo $metadata['timelines'] ?></li>
                            </ul>
                        </div>

                    </div>

                    <?php endwhile; ?>    


                        </p>
 
                    </div>
                </div>
            </div>

            </div>

        </div>
    </div>



<?php

get_footer();
?>

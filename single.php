
<?php
get_header();
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

                            <?php the_content(); ?>
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

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adnets
 */

get_header();


$options = get_option('adnets');
$slider_images =  isset($options['header-slider']) ? $options['header-slider'] : array();
?>

<!-- section divider   -->
    <div class="container mt-30">
        <div class="row">
            <!-- right side content -->
            <div class="col-lg-9">
                <!-- hero section -->
                <div class="row">
                    
                </div>

                <!-- Blog-->
                <div class="premium-networks global-card mt-30">
                    <div class=" mb-20 px-4">
                        <h6 class="section-title">Blog</h6>

                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => 'post',
                    'paged'		=>	get_query_var('paged'),
                    
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                         <!-- single blog-->
                    <div class="mp_single-card mp_single-card_3 blog_single d-flex  mt-30">
                            <!-- left side img -->
                        <span class="me-md-4">
                            
                             <img class="blog-img" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                        </span>
                        <div>
                                <!-- top  -->
                            <a href="<?php the_permalink(); ?>">
                                <h6 class="title mt-4 mt-lg-0 me-4"><?php the_title(); ?></h6>
                            </a>

                            <p class="mt-10">

                                <?php echo wp_trim_words( get_the_content(), 50 );?>
                            </p>

                            <!-- bottom  -->
                            <ul class="bottom-card-info mt-10">
                                <li><i class="fa-solid fa-calendar-days"></i><?php the_time(' d,M,Y'); ?></li>
                                <li><i class="fa-solid fa-clock"></i>
                                    <?php the_time('g:i a') ?></li>
                                <li><a href="<?php the_permalink(); ?>" class="btn1 mt-3 mt-md-0">Read more</a></li>
                            </ul>
                        </div>

                    </div>
                    <?php
                    }
                } else {
                    echo "OOPS!! No Posts Found!!";
                }

                // Restore original Post Data
                wp_reset_postdata();

                ?>  
                </div>
 
<!-- pagination start
-->


        <div class="mt-40 ">
            
                        <?php

          if(function_exists('adnets_pagination')){
           adnets_pagination(array(
              'prev_text'=> '<span aria-hidden="true"><i class="ti-arrow-left"></i></span>',
              'next_text'=> '<span aria-hidden="true"><i class="ti-arrow-right"></i></span>',
              'screen_reader_text'=>' ',
              'type'              =>'list'
             
           ));
          }
          ?>
                    </div>
                </div>

            </div>
            <!-- left side content -->
            <div class="col-lg-3 mt-30 mt-lg-0">
               <?php dynamic_sidebar('right-sidebar'); ?>
            </div>
            
        </div>
    </div>



<?php

get_footer();
?>

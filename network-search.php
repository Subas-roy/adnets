<?php get_header(); 



?>


    <!-- section divider   -->
    <div class="container mt-30">
        <div class="row">
            <!-- Left side content -->
            <div class="col-lg-9">
                


                <!--  affilate programs-->
                <div class="premium-networks global-card mt-30">
                    <div class=" mb-20 px-4">
                        <h6 class="section-title"><?php single_term_title(); ?></h6>

                        <!-- single card -->
                        

                        <?php
                        if(have_posts()) : 
                        while(have_posts()) : the_post(); 
                        $meta = get_post_meta(get_the_ID(), '_adnets_network_options', true);

                        $rating = isset($meta['rating']) ? $meta['rating'] : 0;
                        ?>

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
                                    <?php for($i = 0; $i < $rating; $i++) : ?>
                                        <a href=""> <i class="fa-solid fa-star"></i></a>
                                    <?php endfor; ?>
                                        <!-- <a href="#"> <i class="fa-solid fa-star"></i></a>
                                        <a href="#"> <i class="fa-solid fa-star"></i></a>
                                        <a href="#"> <i class="fa-solid fa-star"></i></a>
                                        <a href="#"><i class="fa-solid fa-star-half-stroke"></i></a> -->
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
                                    <span class="ratings-number"><?php echo $rating; ?></span>
                                    <a target="_blank" href="<?php echo isset($meta['button-url']) ? $meta['button-url'] : ''; ?>" class="btn2 card-btn">join</a>
                                </span>

                                <!-- mid text -->
                                <p class="mt-10">
                                    <?php echo wp_trim_words( get_the_content(), 20 ); ?>
                                </p>

                                <!-- bottom  -->
                                <ul class="bottom-card-info mt-10">
                                    <li><?php echo isset($meta['reviews']) ? $meta['reviews'] : ''; ?> reviews</li>
                                    <li class="separator">_</li>
                                    <li>Offers: <?php echo isset($meta['offers']) ? $meta['offers'] : ''; ?></li>
                                    <li class="separator">_</li>
                                    <li><?php echo isset($meta['place']) ? $meta['place'] : ''; ?></li>
                                    <li class="separator">_</li>
                                    <li><?php echo isset($meta['timelines']) ? $meta['timelines'] : ''; ?></li>
                                </ul>
                            </div>

                        </div>


                        <?php endwhile; 
                    
                        else: ?>
                        <h3>No network found for this search</h3>
                        <?php endif; ?>


                    </div>
                    <div class="mt-40 d-flex justify-content-center">
                        <a class="btn2" href="/all-networks">see all networks</a>
                    </div>
                </div>


            </div>
            
            <?php get_sidebar(); ?>
                
        </div>
    </div>

<?php get_footer(); ?>
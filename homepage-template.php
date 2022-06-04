<?php get_header(); ?>
<?php 
/**
 * Template name: Home Page 
 */

$options = get_option('adnets');
$slider_images =  isset($options['header-slider']) ? $options['header-slider'] : array();
$featured_network = isset($options['featured-network']) ? $options['featured-network'] : '';

?>

<!-- section divider   -->
<div class="container mt-30">
    <div class="row">
        <!-- Left side content -->
        <div class="col-lg-9">
            <!-- hero section -->
            <div class="row">

                <div class="col-lg-4 col-xl-4">
                <?php
                $network = new WP_Query(array(
                    'post_type' => 'network',
                    'posts_per_page' => 1,
                    'p' => $featured_network
                ));

                while($network->have_posts()) : $network->the_post();
                $meta = get_post_meta(get_the_ID(), '_adnets_network_options', true);

                $rating = isset($meta['rating']) ? $meta['rating'] : 0;
                $reviews = isset($meta['reviews']) ? $meta['reviews'] : 0;
                ?>
                    <div class="ratings-card global-card h-100">
                        <?php the_post_thumbnail(' m-img mx-auto'); ?>
                        <!-- plugin -->
                            <?php 
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
                        <div class="progress-bar1 mx-auto mt-20 mb-20" data-percent="<?php echo (100/5) * $average_rating; ?>" data-duration="1000"
                            data-color="#022962">
                            <span class="ratings-count primary-color z-index-1">

                            <?php echo $average_rating; ?>

                            </span>
                            <div class="background" style="background-color: rgb(2, 41, 98);"></div>
                            <div class="rotate"
                                style="transition: transform 1000ms linear 0s; transform: rotate(324deg);"></div>
                            <div class="left"
                                style="background-color: rgb(2, 41, 98); animation: 555.556ms step-start 0s 1 normal none running toggle; opacity: 0;">
                            </div>
                            <div class="right"
                                style="animation: 555.556ms step-end 0s 1 normal none running toggle; opacity: 1;">
                            </div>
                            <div class=""><span>
                                <?php 
                                    echo (100/5) * $average_rating;
                                ?>
                            </span></div>
                        </div>

                        <h6><?php comments_number('no reviews', '1 review', '% reviews'); ?></h6>
                        <a href="<?php the_permalink(); ?>" class="btn1 mt-20">details</a>

                        
                    </div>
                <?php endwhile; ?>
                </div>
                
                <div class="col-lg-8 col-xl-8 mt-4 mt-lg-0">
                    <div class="hero-slider-wrapper h-100">
                        <div class="hero-slider-active">
                            <?php 
                                foreach($slider_images as $slider):
                                ?>
                            <img class="slider-img" src="<?php echo $slider['slider-image']['url']; ?>" alt="">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="premium-networks global-card mt-30">
                <!-- title box -->
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-20 px-4">
                    <h6 class="section-title"><?php echo isset($options['heading1']) ? $options['heading1'] : 'Premium Networks'; ?></h6>
                    
                </div>
                

                <!-- banner  -->
                <div class="px-4 mt-30">
                    <a href="<?php echo $options['section-ad-1-url']; ?>" target="_blank">
                        <img src="<?php echo $options['section-banner-1']['url']; ?>"
                            alt="<?php echo $options['section-banner-1']['alt']; ?>">
                    </a>
                </div>

                <!-- premium networks section-->

                <?php
                    
                    $premium = new WP_Query( array( 
                        'post_type' =>	'network',
                        'posts_per_page' => $options['count1'],
                        'post_status' => 'publish',
                        'tax_query'   => array(
                            array(
                                'taxonomy' => 'network-category',
                                'field'    => 'slug',
                                'terms'    => get_term( $options['category1'] )->name,                
                            )
                        )
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

                    $average_rating = get_comments_number() > 0 ? number_format( (float)$total_rating/get_comments_number(), 2, '.', '' ) : 0;

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
                            <a href="<?php echo isset($metadata['pr-button-url']) ? $metadata['pr-button-url'] : ''; ?>" class="btn2 card-btn">join</a>
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

                <div class="mt-40 d-flex justify-content-center">
                    <a class="btn2" href="<?php echo isset($options['btnurl1']) ? $options['btnurl1'] : '/all-networks/'; ?>"><?php echo isset($options['btntext1']) ? $options['btntext1'] : 'See more networks'; ?></a>
                </div>

            </div>



            <!-- affiliate offers section -->
            <div class="premium-networks affiliate-section global-card mt-30">
                <!-- title box -->
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-20 px-4">
                    <h6 class="section-title"><?php echo isset($options['heading2']) ? $options['heading2'] : 'affiliate offers'; ?></h6>

                </div>

                <!-- single card -->
                <?php 
                $offers = new WP_Query(array(
                    'post_type' => 'offers',
                    'posts_per_page' => $options['count2'],
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
                                <h6><?php echo isset($offer_meta['extra-text']) ? $offer_meta['extra-text'] : ''; ?></h6>
                            </span>
                        </span>
                    </span>

                    <span class="pricing-box d-flex align-items-center">
                        <h6 class="primary-color me-3">$<?php echo number_format( (float)$offer_meta['price'], 2, '.', '' ); ?></h6>
                        <a href="<?php the_permalink(); ?>" class="btn2">Offer Details</a>
                    </span>
                </div>

                <?php endwhile; ?>


                
                <div class="mt-40 d-flex justify-content-center">
                    <a class="btn3" href="<?php echo isset($options['btnurl2']) ? $options['btnurl2'] : '/all-offers/'; ?>"><?php echo isset($options['btntext2']) ? $options['btntext2'] : 'see more offer on affplus'; ?></a>
                </div>
            </div>

            <!--  advertising networks-->
            <div class="premium-networks global-card mt-30">
                <!-- title box -->
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-20 px-4">
                    <h6 class="section-title"><?php echo isset($options['heading3']) ? $options['heading3'] : 'Advertising Networks'; ?></h6>
                    
                </div>
                

                <!-- banner  -->
                <div class="px-4 mt-30">
                    <a href="<?php echo $options['section-ad-2-url']; ?>" target="_blank">
                        <img src="<?php echo $options['section-banner-2']['url']; ?>"
                            alt="<?php echo $options['section-banner-2']['alt']; ?>">
                    </a>
                </div>
                
                <?php
                    $premium = new WP_Query( array( 
                        'post_type' =>	'network',
                        'post_status' => 'publish',
                        'posts_per_page'    =>  $options['count3'],
                        'tax_query'   => array(
                            array(
                                'taxonomy' => 'network-category',
                                'field'    => 'slug',
                                'terms'    => get_term( $options['category3'] )->name,                
                            )
                        )
                    ) ); 
                    
                    while($premium->have_posts()) : $premium->the_post(); 
                    $meta = get_post_meta(get_the_ID(), '_adnets_network_options', true);

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
                            <a href="<?php echo isset($metadata['adv-button-url']) ? $metadata['adv-button-url'] : ''; ?>" class="btn2 card-btn">join</a>
                        </span>

                        <!-- mid text -->
                        <p class="mt-10">
                            <?php echo wp_trim_words(get_the_content(), 30, ''); ?>
                        </p>

                        <!-- bottom  -->
                        <ul class="bottom-card-info mt-10">
                            <li><?php comments_number('no reviews', '1 review', '% reviews'); ?></li>
                            <li class="separator">_</li>
                            <li>Offers: <?php echo $metadata['adv-offers'] ?></li>
                            <li class="separator">_</li>
                            <li><?php echo $metadata['adv-place'] ?></li>
                            <li class="separator">_</li>
                            <li><?php echo $metadata['adv-timelines'] ?></li>
                        </ul>
                    </div>

                </div>

                <?php endwhile; ?>

                <div class="mt-40 d-flex justify-content-center">
                    <a class="btn2" href="<?php echo isset($options['btnurl3']) ? $options['btnurl3'] : '/all-networks/'; ?>"><?php echo isset($options['btntext3']) ? $options['btntext3'] : 'See more networks'; ?></a>
                </div>

            </div>

            <!--  affilate programs-->
            <div class="premium-networks global-card mt-30">
                <!-- title box -->
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-20 px-4">
                    <h6 class="section-title"><?php echo isset($options['heading4']) ? $options['heading4'] : 'Affiliate Networks'; ?></h6>

                </div>
                

                <!-- banner  -->
                <div class="px-4 mt-30">
                    <a href="<?php echo $options['section-ad-3-url']; ?>" target="_blank">
                        <img src="<?php echo $options['section-banner-3']['url']; ?>"
                            alt="<?php echo $options['section-banner-3']['alt']; ?>">
                    </a>
                </div>

                <!-- affiliate networks section-->

                <?php
                    
                    $premium = new WP_Query( array( 
                        'post_type' =>	'network',
                        'post_status' => 'publish',
                        'posts_per_page'  =>  $options['count4'],
                        'tax_query'   => array(
                            array(
                                'taxonomy' => 'network-category',
                                'field'    => 'slug',
                                'terms'    => get_term( $options['category4'] )->name,               
                            )
                        )
                    ) ); 
                    
                    while($premium->have_posts()) : $premium->the_post(); 
                    $meta = get_post_meta(get_the_ID(), '_adnets_network_options', true);

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
                            <a href="<?php echo isset($metadata['aff-button-url']) ? $metadata['aff-button-url'] : ''; ?>" class="btn2 card-btn">join</a>
                        </span>

                        <!-- mid text -->
                        <p class="mt-10">
                            <?php echo wp_trim_words(get_the_content(), 30, ''); ?>
                        </p>

                        <!-- bottom  -->
                        <ul class="bottom-card-info mt-10">
                            <li><?php comments_number('no reviews', '1 review', '% reviews'); ?></li>
                            <li class="separator">_</li>
                            <li>Offers: <?php echo $metadata['aff-offers'] ?></li>
                            <li class="separator">_</li>
                            <li><?php echo $metadata['aff-place'] ?></li>
                            <li class="separator">_</li>
                            <li><?php echo $metadata['aff-timelines'] ?></li>
                        </ul>
                    </div>

                </div>

                <?php endwhile; ?>

                <div class="mt-40 d-flex justify-content-center">
                    <a class="btn2" href="<?php echo isset($options['btnurl4']) ? $options['btnurl4'] : '/all-networks/'; ?>"><?php echo isset($options['btntext4']) ? $options['btntext4'] : 'See more networks'; ?></a>
                </div>

            </div>

            <!-- Blog-->
            <div class="premium-networks global-card mt-30">
                <div class=" mb-20 px-4">
                    <h6 class="section-title"><?php echo isset($options['heading5']) ? $options['heading5'] : 'Blog'; ?></h6>

                    <?php $adnets_posts = new WP_query(array(
                            'post_type' =>	'post',
                            'posts_per_page' => $options['count5']
                        )); ?>
                    <?php while($adnets_posts->have_posts()) : $adnets_posts->the_post(); ?>

                    <!-- single blog-->
                    <div class="mp_single-card mp_single-card_3 blog_single d-flex  mt-30">
                        <!-- left side img -->
                        <span class="me-md-4">
                            <?php the_post_thumbnail(); ?>
                        </span>
                        <div>
                            <!-- top  -->
                            <a href="<?php the_permalink(); ?>">
                                <h6 class="title mt-4 mt-lg-0 me-4">
                                    <?php the_title(); ?>
                                </h6>
                            </a>

                            <p class="mt-10">
                                <?php echo wp_trim_words(get_the_content(), 30, ''); ?>
                            </p>

                            <!-- bottom  -->
                            <ul class="bottom-card-info mt-10">
                                <li><i class="fa-solid fa-calendar-days"></i> <?php the_time('d F Y'); ?></li>
                                <li><i class="fa-solid fa-clock"></i> <?php the_time(); ?></li>
                                <li><a href="<?php the_permalink(); ?>" class="btn1 mt-3 mt-md-0">Read more</a></li>
                            </ul>
                        </div>

                    </div>

                    <?php endwhile; ?>


                </div>
                <div class="mt-40 d-flex justify-content-center">
                    <a class="btn2" href="<?php echo isset($options['btnurl5']) ? $options['btnurl5'] : '/blog'; ?>"><?php echo isset($options['btntext5']) ? $options['btntext5'] : 'See more articles'; ?></a>
                </div>
            </div>

        </div>

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>
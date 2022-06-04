<?php get_header(); 


$metadata = get_post_meta( get_the_ID(), '_adnets_network_options', true );
?>

    <!-- section divider   -->
    <div class="container mt-30">
        <div class="row">
            <!-- right side content -->
            <div class="col-lg-9">
                <!--  advertising networks-->
                <div class="premium-networks global-card mt-30">
                    <div class=" mb-20 px-4">
                        <h6 class="section-title">Network Information</h6>

                        <?php while(have_posts()) : the_post(); ?>

                        <!-- single card -->
                        <div class="mp_single-card mp_single-card_3 single-advertise d-flex align-items-center mt-30">
                            <!-- left side img -->
                            <span class="me-md-4">
                                <?php the_post_thumbnail(); ?>
                            </span>
                            <div>
                                <!-- top  -->
                                <span class="top-card-info single-advertise-top-card">
                                    <h6 class="title me-4"><?php the_title(); ?></h6>
                                    <span class="ratings-wrapper me-4">
                                        <?php echo do_shortcode('[average_rating]'); ?>
                                        
                                    </span>
                                    <span class="separator me-0">
                                        _
                                    </span>
                                    <span class="info me-4">
                                        <?php echo get_comments_number(); ?> reviews
                                    </span>
                                    <span class="separator me-0">
                                        _
                                    </span>
                                    <span>
                                        <a class="share-icon" href="tel:
                                            <?php
                                                if ( ! empty( $metadata['pr-phone'] ) ) {
                                                    echo $metadata['pr-phone'];
                                                    }
                                                if ( ! empty( $metadata['adv-phone'] ) ) {
                                                    echo $metadata['adv-phone'];
                                                    }
                                                if ( ! empty( $metadata['aff-phone'] ) ) {
                                                    echo $metadata['aff-phone'];
                                                    }
                                            ?>
                                        ">
                                            <i class="fa-solid fa-square-phone"></i>
                                        </a>
                                        <a class="share-icon" href="mailto:
                                            <?php
                                                if ( ! empty( $metadata['pr-email'] ) ) {
                                                    echo $metadata['pr-email'];
                                                    }
                                                if ( ! empty( $metadata['adv-email'] ) ) {
                                                    echo $metadata['adv-email'];
                                                    }
                                                if ( ! empty( $metadata['aff-email'] ) ) {
                                                    echo $metadata['aff-email'];
                                                    }
                                            ?>
                                        ">
                                            <i class="fa-solid fa-envelope"></i>
                                        </a>
                                        <a class="share-icon" href="
                                            <?php
                                                if ( ! empty( $metadata['pr-website'] ) ) {
                                                    echo $metadata['pr-website'];
                                                    }
                                                if ( ! empty( $metadata['adv-website'] ) ) {
                                                    echo $metadata['adv-website'];
                                                    }
                                                if ( ! empty( $metadata['aff-website'] ) ) {
                                                    echo $metadata['aff-website'];
                                                    }
                                            ?>
                                        ">
                                            <i class="fa-solid fa-globe"></i>
                                        </a>
                                        <a class="share-icon" href="
                                            <?php
                                                if ( ! empty( $metadata['pr-facebook'] ) ) {
                                                    echo $metadata['pr-facebook'];
                                                    }
                                                if ( ! empty( $metadata['adv-facebook'] ) ) {
                                                    echo $metadata['adv-facebook'];
                                                    }
                                                if ( ! empty( $metadata['aff-facebook'] ) ) {
                                                    echo $metadata['aff-facebook'];
                                                    }
                                            ?>
                                        ">
                                            <i class="fa-brands fa-facebook-square"></i>
                                        </a>
                                        <a class="share-icon" href="
                                            <?php
                                                if ( ! empty( $metadata['pr-twitter'] ) ) {
                                                    echo $metadata['pr-twitter'];
                                                    }
                                                if ( ! empty( $metadata['adv-twitter'] ) ) {
                                                    echo $metadata['adv-twitter'];
                                                    }
                                                if ( ! empty( $metadata['aff-twitter'] ) ) {
                                                    echo $metadata['aff-twitter'];
                                                    }
                                            ?>
                                        ">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </span>
                                </span>

                                <!-- bottom  -->
                                <ul class="bottom-card-info single-page-card-info mt-10">
                                    <li> quality <span class="ms-2 rating-amount">
                                        <?php
                                        if ( ! empty( $metadata['pr-quality'] ) ) {
                                            echo $metadata['pr-quality'];
                                            }
                                        if ( ! empty( $metadata['adv-quality'] ) ) {
                                            echo $metadata['adv-quality'];
                                            }
                                        if ( ! empty( $metadata['aff-quality'] ) ) {
                                            echo $metadata['aff-quality'];
                                            }
                                        ?>
                                    </span></li>
                                    <li> volume <span class="ms-2 rating-amount">
                                        <?php
                                        if ( ! empty( $metadata['pr-volume'] ) ) {
                                            echo $metadata['pr-volume'];
                                            }
                                        if ( ! empty( $metadata['adv-volume'] ) ) {
                                            echo $metadata['adv-volume'];
                                            }
                                        if ( ! empty( $metadata['aff-volume'] ) ) {
                                            echo $metadata['aff-volume'];
                                            }
                                        ?>
                                    </span></li>
                                    <li> platform <span class="ms-2 rating-amount">
                                        <?php
                                        if ( ! empty( $metadata['pr-platform'] ) ) {
                                            echo $metadata['pr-platform'];
                                            }
                                        if ( ! empty( $metadata['adv-platform'] ) ) {
                                            echo $metadata['adv-platform'];
                                            }
                                        if ( ! empty( $metadata['aff-platform'] ) ) {
                                            echo $metadata['aff-platform'];
                                            }
                                        ?>
                                    </span></li>
                                    <li> support <span class="ms-2 rating-amount">
                                        <?php
                                        if ( ! empty( $metadata['pr-platform'] ) ) {
                                            echo $metadata['pr-platform'];
                                            }
                                        if ( ! empty( $metadata['adv-platform'] ) ) {
                                            echo $metadata['adv-platform'];
                                            }
                                        if ( ! empty( $metadata['aff-platform'] ) ) {
                                            echo $metadata['aff-platform'];
                                            }
                                        ?>
                                    </span></li>

                                </ul>
                                <span class="d-flex mt-20">
                                    <a href="#write-a-review" class="btn2 me-3">write a review</a>
                                    <a href="
                                    <?php echo isset($metadata['pr-button-url']) ? $metadata['pr-button-url'] : ''; ?>
                                    <?php echo isset($metadata['adv-button-url']) ? $metadata['adv-button-url'] : ''; ?>
                                    <?php echo isset($metadata['aff-button-url']) ? $metadata['aff-button-url'] : ''; ?>
                                    " class="btn5">join now</a>
                                </span>
                            </div>

                        </div>

                    </div>
                    <p class="px-4">
                        <?php echo wp_trim_words(get_the_content(), 50, ''); ?>
                    </p>
                </div>

                <?php endwhile; ?>





                <!-- Advertising Network Details  -->
                <div class="premium-networks global-card mt-30">
                    <div class=" mb-20 px-4">
                        <h6 class="section-title">Network Details</h6>

                        <div class="row">
                            <!-- left -->
                            <div class="col-lg-8">
                                <!-- single-publish-card-->
                                <div class="single-publish-card d-flex align-items-center position-relative mt-60">
                                    <span class="mp_card-title">for publisher</span>
                                    <ul class="w-100">
                                        <li class="add-publisher">
                                            <span class="title">Commission Type</span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-commission-type'] ) ) {
                                                    echo $metadata['pr-commission-type'];
                                                    }
                                                if ( ! empty( $metadata['adv-commission-type'] ) ) {
                                                    echo $metadata['adv-commission-type'];
                                                    }
                                                if ( ! empty( $metadata['commission-type'] ) ) {
                                                    echo $metadata['commission-type'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Minimum Payment</span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-minimum-payment'] ) ) {
                                                    echo $metadata['pr-minimum-payment'];
                                                    }
                                                if ( ! empty( $metadata['adv-minimum-payment'] ) ) {
                                                    echo $metadata['adv-minimum-payment'];
                                                    }
                                                if ( ! empty( $metadata['minimum-payment'] ) ) {
                                                    echo $metadata['minimum-payment'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Payment Frequency</span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-payment-frequency'] ) ) {
                                                    echo $metadata['pr-payment-frequency'];
                                                    }
                                                if ( ! empty( $metadata['adv-payment-frequency'] ) ) {
                                                    echo $metadata['adv-payment-frequency'];
                                                    }
                                                if ( ! empty( $metadata['payment-frequency'] ) ) {
                                                    echo $metadata['payment-frequency'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Payment Method</span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-payment-method'] ) ) {
                                                    echo $metadata['pr-payment-method'];
                                                    }
                                                if ( ! empty( $metadata['adv-payment-method'] ) ) {
                                                    echo $metadata['adv-payment-method'];
                                                    }
                                                if ( ! empty( $metadata['payment-method'] ) ) {
                                                    echo $metadata['payment-method'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Referral Commission </span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-referral-commission'] ) ) {
                                                    echo $metadata['pr-referral-commission'];
                                                    }
                                                if ( ! empty( $metadata['adv-referral-commission'] ) ) {
                                                    echo $metadata['adv-referral-commission'];
                                                    }
                                                if ( ! empty( $metadata['referral-commission'] ) ) {
                                                    echo $metadata['referral-commission'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- advisor-->
                                <div class="single-publish-card d-flex align-items-center position-relative mt-60">
                                    <span class="mp_card-title">for advisor</span>
                                    <ul class="w-100">
                                        <li class="add-publisher">
                                            <span class="title">Ad Format</span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-ad-format'] ) ) {
                                                    echo $metadata['pr-ad-format'];
                                                    }
                                                if ( ! empty( $metadata['adv-ad-format'] ) ) {
                                                    echo $metadata['adv-ad-format'];
                                                    }
                                                if ( ! empty( $metadata['ad-format'] ) ) {
                                                    echo $metadata['ad-format'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Cost Model </span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-cost-model'] ) ) {
                                                    echo $metadata['pr-cost-model'];
                                                    }
                                                if ( ! empty( $metadata['adv-cost-model'] ) ) {
                                                    echo $metadata['adv-cost-model'];
                                                    }
                                                if ( ! empty( $metadata['cost-model'] ) ) {
                                                    echo $metadata['cost-model'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Minimum Deposit </span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-minimum-deposit'] ) ) {
                                                    echo $metadata['pr-minimum-deposit'];
                                                    }
                                                if ( ! empty( $metadata['adv-minimum-deposit'] ) ) {
                                                    echo $metadata['adv-minimum-deposit'];
                                                    }
                                                if ( ! empty( $metadata['minimum-deposit'] ) ) {
                                                    echo $metadata['minimum-deposit'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">Payment Method</span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-payment-method'] ) ) {
                                                    echo $metadata['pr-payment-method'];
                                                    }
                                                if ( ! empty( $metadata['adv-payment-method'] ) ) {
                                                    echo $metadata['adv-payment-method'];
                                                    }
                                                if ( ! empty( $metadata['payment-method'] ) ) {
                                                    echo $metadata['payment-method'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">daily impressions </span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-daily-impressions'] ) ) {
                                                    echo $metadata['pr-daily-impressions'];
                                                    }
                                                if ( ! empty( $metadata['adv-daily-impressions'] ) ) {
                                                    echo $metadata['adv-daily-impressions'];
                                                    }
                                                if ( ! empty( $metadata['daily-impressions'] ) ) {
                                                    echo $metadata['daily-impressions'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="add-publisher">
                                            <span class="title">top geo </span>
                                            <span class="content">
                                                <?php
                                                if ( ! empty( $metadata['pr-top-geo'] ) ) {
                                                    echo $metadata['pr-top-geo'];
                                                    }
                                                if ( ! empty( $metadata['adv-top-geo'] ) ) {
                                                    echo $metadata['adv-top-geo'];
                                                    }
                                                if ( ! empty( $metadata['top-geo'] ) ) {
                                                    echo $metadata['top-geo'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- right -->
                            <div class="col-lg-4 mt-4 mt-lg-0">
                                
                                <div class="single-publish-card rating-distribute">
                                    <?php while(have_posts()) : the_post(); 
                                        $meta = get_post_meta(get_the_ID(), '_adnets_network_options', true);

                                        $rating = isset($meta['rating']) ? $meta['rating'] : 0;
                                        $reviews = isset($meta['reviews']) ? $meta['reviews'] : 0;
                                    ?>

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
                                    <?php the_post_thumbnail(); ?>
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

                                    <!-- <div class="progress-bar1 mx-auto mt-20 mb-20" data-percent="90"
                                        data-duration="1000" data-color="#022962">
                                        <span class="ratings-count primary-color z-index-1">4.55</span>
                                    </div> -->

                                    <!-- review -->
                                    <ul class="progress-review-content">
                                        <li>
                                            <span class="rating-title"><span class="color-one"></span>Excellent</span>
                                            <span class="rating-number">
                                            <?php
                                            if ( ! empty( $metadata['pr-excellent'] ) ) {
                                                echo $metadata['pr-excellent'];
                                                }
                                            if ( ! empty( $metadata['adv-excellent'] ) ) {
                                                echo $metadata['adv-excellent'];
                                                }
                                            if ( ! empty( $metadata['aff-excellent'] ) ) {
                                                echo $metadata['aff-excellent'];
                                                }
                                            ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title"><span class="color-one color-two"></span>Very
                                                good</span>
                                            <span class="rating-number">
                                                <?php
                                                if ( ! empty( $metadata['pr-verygood'] ) ) {
                                                    echo $metadata['pr-verygood'];
                                                    }
                                                if ( ! empty( $metadata['adv-verygood'] ) ) {
                                                    echo $metadata['adv-verygood'];
                                                    }
                                                if ( ! empty( $metadata['aff-verygood'] ) ) {
                                                    echo $metadata['aff-verygood'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title"><span
                                                    class="color-one color-three"></span>Average</span>
                                            <span class="rating-number">
                                                <?php
                                                if ( ! empty( $metadata['pr-average'] ) ) {
                                                    echo $metadata['pr-average'];
                                                    }
                                                if ( ! empty( $metadata['adv-average'] ) ) {
                                                    echo $metadata['adv-average'];
                                                    }
                                                if ( ! empty( $metadata['aff-average'] ) ) {
                                                    echo $metadata['aff-average'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title"><span
                                                    class="color-one color-four"></span>Poor</span>
                                            <span class="rating-number">
                                                <?php
                                                if ( ! empty( $metadata['pr-poor'] ) ) {
                                                    echo $metadata['pr-poor'];
                                                    }
                                                if ( ! empty( $metadata['adv-poor'] ) ) {
                                                    echo $metadata['adv-poor'];
                                                    }
                                                if ( ! empty( $metadata['aff-poor'] ) ) {
                                                    echo $metadata['aff-poor'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title"><span
                                                    class="color-one color-five"></span>Terrible</span>
                                            <span class="rating-number">
                                                <?php
                                                if ( ! empty( $metadata['pr-terrible'] ) ) {
                                                    echo $metadata['pr-terrible'];
                                                    }
                                                if ( ! empty( $metadata['adv-terrible'] ) ) {
                                                    echo $metadata['adv-terrible'];
                                                    }
                                                if ( ! empty( $metadata['aff-terrible'] ) ) {
                                                    echo $metadata['aff-terrible'];
                                                    }
                                                ?>
                                            </span>
                                        </li>
                                    </ul>

                                    <!-- quality review -->
                                    <ul class="progress-review-content progress-review-content2 mt-30">
                                        <li>

                                            <span class="rating-title">Quality</span>

                                            <span class="tooltip-container" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php
                                                    if ( ! empty( $metadata['pr-quality'] ) ) {
                                                        echo $metadata['pr-quality'];
                                                        } 
                                                    if ( ! empty( $metadata['adv-quality'] ) ) {
                                                        echo $metadata['adv-quality'];
                                                        }
                                                    if ( ! empty( $metadata['aff-quality'] ) ) {
                                                        echo $metadata['aff-quality'];
                                                        }
                                                    ?>">

                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title">Volume</span>
                                            <span class="tooltip-container" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php
                                                    if ( ! empty( $metadata['pr-volume'] ) ) {
                                                        echo $metadata['pr-volume'];
                                                        } 
                                                    if ( ! empty( $metadata['adv-volume'] ) ) {
                                                        echo $metadata['adv-volume'];
                                                        }
                                                    if ( ! empty( $metadata['aff-volume'] ) ) {
                                                        echo $metadata['aff-volume'];
                                                        }
                                                    ?>">
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title">Platform</span>
                                            <span class="tooltip-container" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php
                                                    if ( ! empty( $metadata['pr-platform'] ) ) {
                                                        echo $metadata['pr-platform'];
                                                        } 
                                                    if ( ! empty( $metadata['adv-platform'] ) ) {
                                                        echo $metadata['adv-platform'];
                                                        }
                                                    if ( ! empty( $metadata['aff-platform'] ) ) {
                                                        echo $metadata['aff-platform'];
                                                        }
                                                    ?>">
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating-title">Support</span>
                                            <span class="tooltip-container" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php
                                                    if ( ! empty( $metadata['pr-support'] ) ) {
                                                        echo $metadata['pr-support'];
                                                        } 
                                                    if ( ! empty( $metadata['adv-support'] ) ) {
                                                        echo $metadata['adv-support'];
                                                        }
                                                    if ( ! empty( $metadata['aff-support'] ) ) {
                                                        echo $metadata['aff-support'];
                                                        }
                                                    ?>">
                                            </span>
                                        </li>
                                    </ul>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Targeting & Optimization  -->
                

                <!-- All reviews  -->
               
                <div id="write-a-review" class="mp_single-card recent-review  sidebar-widget global-card px-4 mt-30">
                    <?php comments_template(); ?>
                </div>
                <p></p>

            </div>    
            <!--widgets -->
            <?php get_sidebar(); ?>
          
        </div>
    </div>

<?php get_footer(); ?>
   
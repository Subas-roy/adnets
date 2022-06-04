<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adnets
 */

?>



    <!-- footer banner -->
    <div class="footer-banner">
        <div class="container">
            <a href="<?php $values = get_option('adnets'); if ( ! empty( $values['foo-banner-url'] ) ) { echo $values['foo-banner-url']; } ?>" target="_blank">
                <img src="<?php  if ( ! empty( $values['footer-banner']['url'] ) ) { echo $values['footer-banner']['url']; } ?>" alt="<?php if ( ! empty( $values['footer-banner']['alt'] ) ) { echo $values['footer-banner']['alt']; } ?>">
            </a>
        </div>
    </div>

    <!-- footer -->
    <footer class="mp-footer-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 custome-footer-col mb-4">
                    <!-- <img src="./assets/images/big-logo.png" class="logo" alt="logo"> -->
                    <h5 class="mb-3 footer-title text-center text-md-start"><?php  if ( ! empty( $values['foo-menu-title1'] ) ) { echo $values['foo-menu-title1']; } ?></h5>
                    <div class="d-flex justify-content-evenly justify-content-md-between">
                        <?php wp_nav_menu(array(
                            'theme_location'    =>  'adnets-footer-left-1',
                            'container' => 'div',
                            'container_class' => 'd-flex justify-content-evenly justify-content-md-between',
                            'menu_class' => 'footer-menu text-center text-md-start'                        
                        )); ?>
                        <?php wp_nav_menu(array(
                            'theme_location'    =>  'adnets-footer-left-2',
                            'container' => 'div',
                            'container_class' => 'd-flex justify-content-evenly justify-content-md-between',
                            'menu_class' => 'footer-menu text-center text-md-start'                        
                        )); ?>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 custome-footer-col mb-4">
                    <h5 class="mb-3 footer-title text-center text-md-start"><?php if ( ! empty( $values['foo-menu-title2'] ) ) { echo $values['foo-menu-title2']; } ?></h5>
                    <div class="d-flex justify-content-evenly justify-content-md-between">

                        <?php wp_nav_menu(array(
                            'theme_location'    =>  'adnets-footer-middle-1',
                            'container' => 'div',
                            'container_class' => 'd-flex justify-content-evenly justify-content-md-between',
                            'menu_class' => 'footer-menu text-center text-md-start'                        
                        )); ?>
                        <?php wp_nav_menu(array(
                            'theme_location'    =>  'adnets-footer-middle-2',
                            'container' => 'div',
                            'container_class' => 'd-flex justify-content-evenly justify-content-md-between',
                            'menu_class' => 'footer-menu text-center text-md-start'                        
                        )); ?>

                    </div>
                </div>
                 
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                    <h5 class="mb-3 footer-title text-center text-md-start"><?php if ( ! empty( $values['foo-contact-title'] ) ) { echo $values['foo-contact-title']; } ?></h5>
                    <div
                        class="mt-3 d-flex align-items-center contact-share-icons justify-content-center justify-content-md-start">
                        <a class="icon" href="<?php if ( ! empty( $values['facebook'] ) ) { echo $values['facebook']; } ?>">
                            <i class="fa-brands fa-facebook-square"></i>
                        </a>
                        <a class="icon" href="<?php if ( ! empty( $values['twitter'] ) ) { echo $values['twitter']; } ?>">
                            <i class="fa-brands fa-twitter-square"></i>
                        </a>
                        <a class="icon" href="<?php if ( ! empty( $values['linkedIn'] ) ) { echo $values['linkedIn']; } ?>">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>

                    <label class="label mt-3 text-center text-md-start" for="subs"><?php echo isset($values['newsletter']) ? $values['newsletter'] : 'subscribe our newsletter'; ?></label>
                    <?php echo do_shortcode($values['subs-form']); ?>
                </div>
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="col-lg-6 text-center text-md-start copyright-text"><span><?php if ( ! empty( $values['copyright-text'] ) ) { echo $values['copyright-text']; } ?></span>
                        </div>

                        <?php wp_nav_menu(array(
                            'theme_location'    =>  'adnets-footer-menu',
                            'container' => 'div',
                            'container_class' => 'col-lg-6 mt-4 mt-lg-0',
                            'menu_class' => 'd-flex flex-wrap justify-content-center justify-content-md-start justify-content-lg-end footer-menu'                        
                        )); ?>
                        
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- scroll to up -->
    <div class="scrollup"><i class="fas fa-arrow-up"></i></div>

    <?php wp_footer(); ?>
</body>

</html>

<?php

function venus_theme_init() {
    load_theme_textdomain( 'venus', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'post-formats', array( 'video' ) );
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 200,
            'width'       => 600,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    register_nav_menus(
        array(
            'primary'  => __( 'Primary', 'venus' ),
            'footer'  => __( 'Footer', 'venus' ),
        )
    );

    add_image_size('venus-portfolio',800,9999);
    add_image_size('venus-team',800, 800, true);

}
add_action( 'after_setup_theme', 'venus_theme_init' );

function venus_scripts(){
    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&family=Lora:400i');
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('assets/vendor/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('venus-custom-icon', get_theme_file_uri('assets/vendor/custom-icon/style.css'));
    wp_enqueue_style('vl-nav-css', get_theme_file_uri('assets/vendor/vl-nav/css/core-menu.css'));
    wp_enqueue_style('animate-css', get_theme_file_uri('assets/vendor/animate.min.css'));
    wp_enqueue_style('owlcarousel-css', get_theme_file_uri('assets/vendor/owl/assets/owl.carousel.min.css'));
    wp_enqueue_style('owlcarousel-assets-css', get_theme_file_uri('assets/vendor/owl/assets/owl.theme.default.min.css'));
    wp_enqueue_style('magnific-css', get_theme_file_uri('assets/vendor/magnific-popup/magnific-popup.css'));
    wp_enqueue_style('slidemenu-css', get_theme_file_uri('assets/vendor/vl-nav/css/effects/slide-menu.css'));
    wp_enqueue_style('venus-css', get_theme_file_uri('assets/css/main.css'));
    wp_enqueue_style('venus-main-css', get_stylesheet_uri());

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery','//code.jquery.com/jquery-3.5.1.min.js',null,'3.5.1',true);

    wp_enqueue_script('imagesloaded-js', get_theme_file_uri('assets/vendor/imagesloaded.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('isotope-js', get_theme_file_uri('assets/vendor/jquery.isotope.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('popper-js', get_theme_file_uri('assets/vendor/popper.min.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('assets/vendor/bootstrap/js/bootstrap.min.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('wow-js', get_theme_file_uri('assets/vendor/wow.min.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('owlcarousel-js', get_theme_file_uri('assets/vendor/owl/owl.carousel.min.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('magnific-js', get_theme_file_uri('assets/vendor/magnific-popup/jquery.magnific-popup.min.js'), ['jquery'], '1.0', true);
    wp_enqueue_script('venus-js', get_theme_file_uri('assets/js/scripts.js'), ['jquery','wow-js'], time(), true);
    wp_enqueue_script('vl-nav', get_theme_file_uri('assets/vendor/vl-nav/js/vl-menu.js'), ['jquery','venus-js'], '1.0', true);
}
add_action('wp_enqueue_scripts','venus_scripts');
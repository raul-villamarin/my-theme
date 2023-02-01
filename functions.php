<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('MY_THEME_VERSION','1.0');

require_once __DIR__.'/widgets/ContactWidget.php';
require_once __DIR__.'/widgets/SocialWidget.php';

function my_theme_assets(){
	wp_enqueue_style(
				'google-fonts',
				'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700',
				[],
				MY_THEME_VERSION
			);
	wp_enqueue_style(
				'font-awesome',
				get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css',
				[],
				MY_THEME_VERSION
			);
	wp_enqueue_style(
				'my-theme-styles',
				get_template_directory_uri() . '/style.css',
				[],
				MY_THEME_VERSION
			);
}



function my_theme_widgets(){
	register_sidebar(
		array(
			'id'            => 'the_topbar',
			'name'          => __( 'Topbar Sidebar' ),
			'description'   => __( 'The topbar.' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_widget( new mytheme\widgets\ContactWidget() );
	register_widget( new mytheme\widgets\SocialWidget() );
}

add_action( 'init', 'my_theme_assets' );
add_action( 'widgets_init', 'my_theme_widgets' );
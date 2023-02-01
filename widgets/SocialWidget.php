<?php 
namespace mytheme\widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class SocialWidget extends \WP_Widget{
	public function __construct(){

		parent::__construct(
			'social_widget', 
			__('Social Widget', 'my-theme'), 
 			  ['description' => __( 'The Social Widget', 'my-theme')]
		);

	}

	public function widget( $args, $instance ) {
		$twitter = !(empty($instance['twitter'])) ? $instance['twitter'] : '#';
		$facebook = !(empty($instance['facebook'])) ? $instance['facebook'] : '#';
		$instagram = !(empty($instance['instagram'])) ? $instance['instagram'] : '#';
		$gplus = !(empty($instance['gplus'])) ? $instance['gplus'] : '#';
		$linkedin = !(empty($instance['linkedin'])) ? $instance['linkedin'] : '#';
 		include(__DIR__.'/views/social/social.php');
	}
 
	public function form( $instance ) {
     	$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : esc_html__( '', 'my-theme' );
		$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( '', 'my-theme' );
		$instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : esc_html__( '', 'my-theme' );
		$gplus = ! empty( $instance['gplus'] ) ? $instance['gplus'] : esc_html__( '', 'my-theme' );
		$linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : esc_html__( '', 'my-theme' );
	   	include(__DIR__.'/views/social/form.php');
	}

	public function update( $new_instance, $old_instance ) {
 		$instance = [];
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['instagram']  = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['gplus']  = ( ! empty( $new_instance['gplus'] ) ) ? strip_tags( $new_instance['gplus'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		return $instance;
	}
}
<?php 
namespace mytheme\widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ContactWidget extends \WP_Widget
{
	public function __construct(){

		parent::__construct(
			'contact_widget', 
			__('Contact Widget', 'my-theme'), 
 			  ['description' => __( 'The Contact Widget', 'my-theme')]
		);

	}

	public function widget( $args, $instance ) {
		$phone = !(empty($instance['phone'])) ? $instance['phone'] : '+1 5589 55488 55';
		$email = !(empty($instance['email'])) ? $instance['email'] : 'contact@example.com';
 		include(__DIR__.'/views/contact/contact.php');
	}
 
	public function form( $instance ) {
     	$email = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( '', 'my-theme' );
		$phone  = ! empty( $instance['phone'] ) ? $instance['phone'] : esc_html__( '', 'my-theme' );
	   	include(__DIR__.'/views/contact/form.php');
	}

	public function update( $new_instance, $old_instance ) {
 		$instance = [];
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['phone']  = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		return $instance;
	}

}
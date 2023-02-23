<?php 
namespace mytheme\widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

include_once __DIR__.'/services/MenuService.php';
use mytheme\widgets\services\MenuService;

class MenuWidget extends \WP_Widget
{
	private $menuService;

	public function __construct(){

		$this->menuService = new MenuService();

		parent::__construct(
			'menu_widget', 
			__('Menu Widget', 'my-theme'), 
 			  ['description' => __( 'The Menu Widget', 'my-theme')]
		);

	}

	public function widget( $args, $instance ) {
		$menu = !(empty($instance['menu'])) ? $instance['menu'] : '';
		$hasMenu = !empty($menu);
		$menuOptions = [];
		if($hasMenu){
			$menuOptions = $this->menuService->getMenuData($menu);
		}
 		include(__DIR__.'/views/menu/menu.php');
	}
 
	public function form( $instance ) {
		$options = $this->menuService->getMenuTerms();
     	$menu = ! empty( $instance['menu'] ) ? $instance['menu'] : esc_html__( '', 'my-theme' );
	   	include(__DIR__.'/views/menu/form.php');
	}

	public function update( $new_instance, $old_instance ) {
 		$instance = [];
		$instance['menu'] = ( ! empty( $new_instance['menu'] ) ) ? strip_tags( $new_instance['menu'] ) : '';
		return $instance;
	}


}
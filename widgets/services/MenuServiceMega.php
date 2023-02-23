<?php 
namespace mytheme\widgets\services;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MenuServiceMega
{
	public function getMenuTerms(){
		$sql = "SELECT name FROM `wp_terms` WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy WHERE taxonomy = 'nav_menu');";
        $mysqli = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
        $selResult = $mysqli->query($sql);
        $dataResult = [];
        while($entry = $selResult->fetch_assoc()){
            $dataResult[]=$entry['name'];
        }
        $mysqli->close();

        return $dataResult;  
	}

	public function getMenuData($menuTerm){

		$entries = $this->getMenuDataInternal($menuTerm);

        $data = array();

        foreach($entries as $entry){
        	$data[] = [
        				'object_id' => $entry->object_id,
						'ID' => $entry->ID,
						'title' => $entry->title,
						'url' => $entry->url
        	];
        }

        return $data;
	}

	private function getMenuDataInternal($menuTerm){
		
        $navbar_items = wp_get_nav_menu_items($menuTerm);
        $child_items = [];
        foreach ($navbar_items as $key => $item) {
            if ($item->menu_item_parent) {
                array_push($child_items, $item);
                unset($navbar_items[$key]);
            }
        }
        foreach ($navbar_items as $item) {
            foreach ($child_items as $key => $child) {
                if ($child->menu_item_parent == $item->post_name) {
                    if (!$item->child_items) {
                        $item->child_items = [];
                    }

                    array_push($item->child_items, $child);
                    unset($child_items[$key]);
                }
            }
        }
        return $navbar_items;
	}
}
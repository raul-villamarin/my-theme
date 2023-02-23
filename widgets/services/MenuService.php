<?php 
namespace mytheme\widgets\services;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class MenuService
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

		$entries = wp_get_nav_menu_items($menuTerm);

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
}
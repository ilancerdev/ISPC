<?php
Doctrine_Manager::getInstance ()->bindComponent ( 'PriceRlp', 'SYSDAT' );
class PriceRlp extends BasePriceRlp {
	
	
	public function get_prices($list, $clientid) {
		
		if (empty ( $list ) || empty ( $clientid )) {
			
			return array ();
		}
		
		if (is_array ( $list )) {
			$list_ids = $list;
		} else {
			$list_ids [] = $list;
		}
		
		$query = Doctrine_Query::create ()
		->select ( "*" )
		->from ( 'PriceRlp' )
		->where ( "clientid= ?", $clientid )
		->andWhereIn ( 'list', $list_ids )
		->orderBy ( 'id ASC' );
		$res = $query->fetchArray ();
		
		if ($res) {
			foreach ( $res as $k_res => $v_res ) {
				$res_prices [$v_res ['shortcut']] [$v_res ['location_type']] = $v_res;
			}
			
			return $res_prices;
		} else {
			return array ();
		}
	}
	
	
	public function get_multiple_list_price($list, $clientid, $default_price_list) {
		if (empty ( $list ) || empty ( $clientid )) {
			
			return $default_price_list;
		}
		
		if (is_array ( $list )) {
			$list_ids = $list;
		} else {
			$list_ids [] = $list;
		}
		
		$query = Doctrine_Query::create ()
		->select ( "*" )
		->from ( 'PriceRlp' )
		->where ( "clientid= ?", $clientid )
		->andWhereIn ( 'list', $list_ids )
		->orderBy ( 'id ASC' );
		$res = $query->fetchArray ();
		
		
		$res_prices = array();
		
		
		if ($res) {
			foreach ( $res as $k_res => $v_res ) {
				$res_prices [$v_res ['list']] [$v_res ['shortcut']] [$v_res ['location_type']] = $v_res;
				$res_prices [$v_res ['list']] [$v_res ['shortcut']] [$v_res ['location_type']]['price_list'] = $v_res ['list'];
				$res_list_ids [] = $v_res ['list'];
			}
			
			$res_list_ids = array_values ( array_unique ( $res_list_ids ) );
			
			// sort both ids array
			asort ( $res_list_ids );
			asort ( $list_ids );
			
			$empty_price_list = array_diff ( $list_ids, $res_list_ids );
			
			foreach ( $empty_price_list as $key_pl => $v_pl ) {
				$res_prices [$v_pl] = $default_price_list;
			}
			
			return $res_prices;
		} else {
			// in case of finding nothing
			foreach ( $list_ids as $key_pl => $v_pl ) {
				$res_prices [$v_pl] = $default_price_list;
			}
			
			return $res_prices;
		}
	}
}

?>
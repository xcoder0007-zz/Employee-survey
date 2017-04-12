<?php
class Notoficants_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('notoficants');
		return $query->result_array();
  	}

  	function get_hotel_notificants($restaurant_id) {
  		$query = $this->db->query('
						SELECT email
						FROM notificants 
						JOIN hotels ON notificants.hotel_id = hotels.id
						JOIN restaurants ON hotels.id = restaurants.hotel_id
						WHERE restaurants.id = '.$restaurant_id);

  		return $query->result_array();
  	}
}
?>

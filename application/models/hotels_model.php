<?php
class Hotels_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('hotels');
		return $query->result_array();
  	}

  	function get_restaurants() {
  		$this->load->database();

		$query = $this->db->query('
								SELECT hotels.id AS hotel_id, restaurants.id AS restaurant_id
								FROM hotels
								JOIN restaurants ON restaurants.hotel_id = hotels.id
								');
		return $query->result_array();
  	}

  	function get_user_hotels($uid) {
  		$this->load->database();

		$query = $this->db->query('
								SELECT hotels.id, hotels.name
								FROM hotels
								JOIN users_hotels ON users_hotels.hotel_id = hotels.id
								WHERE users_hotels.user_id = '.$uid.' GROUP BY hotels.id');
		return $query->result_array();
  	}
}
?>

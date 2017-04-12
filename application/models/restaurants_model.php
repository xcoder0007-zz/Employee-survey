<?php
class Restaurants_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('restaurants');
		return $query->result_array();
  	}

  	function get_user_restaurants($uid) {
  		$query = $this->db->query('
						SELECT restaurants.id, restaurants.name, restaurants.hotel_id
						FROM restaurants 
						JOIN users_restaurants ON restaurants.id = users_restaurants.restaurant_id
						WHERE users_restaurants.user_id = '.$uid);

  		return $query->result_array();
  	}

  	function get_restaurant_details($restaurant_id) {
  		$query = $this->db->query('
						SELECT restaurants.name, hotels.logo, count(scores.id) AS count
						FROM restaurants 
						JOIN hotels ON restaurants.hotel_id = hotels.id
						JOIN scores ON restaurants.id = scores.restaurant_id
						WHERE restaurants.id = '.$restaurant_id);

  		return $query->result_array();	
  	}

  	  	function get_restaurant_name($restaurant_id) {
  		$query = $this->db->query('
						SELECT restaurants.name AS restaurant_name, hotels.name AS hotel_name
						FROM restaurants
						JOIN hotels ON restaurants.hotel_id = hotels.id
						WHERE restaurants.id = '.$restaurant_id);

  		return $query->result_array();
  	}

  	function get_hotel_restaurants($hotel_id) {
  		$query = $this->db->query('
			SELECT restaurants.id, restaurants.name
			FROM restaurants 
			WHERE hotel_id = '.$hotel_id);

  		return $query->result_array();
  	}

  	function get_restaurant_hotel($restaurant_id) {
  		$query = $this->db->query('
			SELECT hotel_id
			FROM restaurants 
			WHERE id = '.$restaurant_id);

  		return $query->result_array();
  	}
}
?>

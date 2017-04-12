<?php
class Scores_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('scores');
		return $query->result_array();
  	}

  	function create($data) {
  		$this->db->insert('scores', $data);
  		return ($this->db->affected_rows() == 1)? $this->db->insert_id() : FALSE;
  	}

  	function is_room_done($room, $restaurant_id, $from, $to) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT count(*) AS count
			FROM scores
			JOIN restaurants ON restaurants.id = restaurant_id 
			WHERE hotel_id = (SELECT hotel_id FROM restaurants WHERE id = '.$restaurant_id.') AND room = '.$room.' AND date BETWEEN "'.$from.'" AND "'.$to.'"'
			);
		return $query->result();
  	}

  	function get_timing_total($restaurant_id, $rate, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(timing) AS score
			FROM scores
			WHERE timing = '.$rate.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_timing_count_total($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(timing) AS score
			FROM scores
			WHERE timing IS NOT NULL AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_timing_score($language_id, $restaurant_id, $rate, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(timing) AS score
			FROM scores
			WHERE timing = '.$rate.' AND language_id = '.$language_id.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_timing_count_score($language_id, $restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(timing) AS score
			FROM scores
			WHERE timing IS NOT NULL AND language_id = '.$language_id.' AND  restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}


  	function get_restaurant_records($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT countries.name AS country_name, room, offer, dishes, service, atmosphere, drinks, comments, picture, date
			FROM scores
			JOIN countries ON scores.country_id = countries.id
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_restaurant_comments($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT countries.name AS country_name, room, comments, picture, date
			FROM scores
			JOIN countries ON scores.country_id = countries.id
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'" AND comments <> ""'
			);
		return $query->result_array();
  	}

  	function get_offer_score($language_id, $score, $restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(offer) AS score
			FROM scores
			WHERE language_id = '.$language_id.' AND offer = '.$score.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_dishes_score($language_id, $score, $restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(dishes) AS score
			FROM scores
			WHERE language_id = '.$language_id.' AND dishes = '.$score.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_service_score($language_id, $score, $restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(service) AS score
			FROM scores
			WHERE language_id = '.$language_id.' AND service = '.$score.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_atmosphere_score($language_id, $score, $restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(atmosphere) AS score
			FROM scores
			WHERE language_id = '.$language_id.' AND atmosphere = '.$score.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_drinks_score($language_id, $score, $restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT COUNT(drinks) AS score
			FROM scores
			WHERE language_id = '.$language_id.' AND drinks = '.$score.' AND restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}



  	function get_offer_avg($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(offer) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_dishes_avg($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(dishes) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_service_avg($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(service) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_atmosphere_avg($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(atmosphere) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_drinks_avg($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(drinks) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_lang_avg($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(offer) + AVG(dishes) + AVG(service) + AVG(atmosphere) + AVG(drinks))/5 AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_hotel_lang($language_id, $hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(offer) + AVG(dishes) + AVG(service) + AVG(atmosphere) + AVG(drinks))/5 AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE language_id = '.$language_id.' AND restaurants.hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}


  	function get_hotel($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(offer) + AVG(dishes) + AVG(service) + AVG(atmosphere) + AVG(drinks))/5 AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE restaurants.hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_kitchen($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(offer) + AVG(dishes))/2 AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE restaurants.hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_fb($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(service) + AVG(atmosphere) + AVG(drinks))/3 AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE restaurants.hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_avg($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(offer) + AVG(dishes) + AVG(service) + AVG(atmosphere) + AVG(drinks))/5 AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}


  	function get_offer_avg_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(offer) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_dishes_avg_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(dishes) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_service_avg_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(service) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_atmosphere_avg_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(atmosphere) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_drinks_avg_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(drinks) AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_kitchen_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(offer) + AVG(dishes))/2 AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_fb_lang($restaurant_id, $language_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT (AVG(service) + AVG(atmosphere) + AVG(drinks))/3 AS score
			FROM scores
			WHERE restaurant_id = '.$restaurant_id.' AND language_id = '.$language_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_hotel_offer_avg($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(offer) AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_hotel_dishes_avg($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(dishes) AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_hotel_service_avg($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(service) AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_hotel_atmosphere_avg($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(atmosphere) AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_hotel_drinks_avg($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT AVG(drinks) AS score
			FROM scores
			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"'
			);
		return $query->result_array();
  	}

  	function get_count($restaurant_id, $from, $to, $meal_id) {
  		$this->load->database();

  		$query = $this->db->query('
  			SELECT COUNT(id) AS count
  			FROM `scores`
  			WHERE restaurant_id = '.$restaurant_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"
  			');
  		return $query->result_array();
  	}

  	function get_hotel_count($hotel_id, $from, $to, $meal_id) {
  		$this->load->database();

  		$query = $this->db->query('
  			SELECT COUNT(scores.id) AS count
  			FROM `scores`
  			JOIN restaurants ON scores.restaurant_id = restaurants.id
			WHERE hotel_id = '.$hotel_id.' AND date BETWEEN "'.$from.'" AND "'.$to.'" AND meal_id = "'.$meal_id.'"
  			');
  		return $query->result_array();
  	}
}
?>

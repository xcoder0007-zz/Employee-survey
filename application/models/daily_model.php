<?php
class Daily_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('restaurants');
		return $query->result_array();
  	}

  	function get_mail_by_restaurant($restaurant_id) {
  		$query = $this->db->query('
						SELECT email
						FROM daily_mails 
						JOIN hotels ON daily_mails.hotel_id = hotels.id
						JOIN restaurants ON hotels.id = restaurants.hotel_id
						WHERE restaurants.id = '.$restaurant_id);

  		return $query->result_array();
  	}
}
?>

<?php
class Meals_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('meals');
		return $query->result_array();
  	}

  	function get_meal_name($meal_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT name
			FROM meals
			WHERE id = '.$meal_id
			);
		return $query->result();
  	}
}
?>

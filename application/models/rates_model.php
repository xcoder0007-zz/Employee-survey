<?php
class Rates_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall() {
	    $this->load->database();
		
		$query = $this->db->get('rates');
		return $query->result_array();
  	}

  	function get_by_language($language_id) {
  		$this->load->database();
		
		$query = $this->db->query('
			SELECT id, name, rate
			FROM rates
			WHERE language_id = '.$language_id
			);
		return $query->result_array();
  	}
}
?>

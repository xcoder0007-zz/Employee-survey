<?php
class Texts_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('texts');
		return $query->result_array();
  	}

	function get_by_language($language_id) {
  		$this->load->database();
		
		$query = $this->db->query('
								SELECT text from texts
								JOIN languages ON texts.language_id = languages.id
								WHERE languages.id = '.$language_id.'
								ORDER BY texts.t_number
								');
		return $query->result_array();
  	}
}
?>

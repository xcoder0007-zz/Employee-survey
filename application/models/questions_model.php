<?php
class Questions_model extends CI_Model{
	
  	function __contruct(){
		parent::__construct;
		// $this->load->helper('url');
  	}
	
  	function getall(){
	    $this->load->database();
		
		$query = $this->db->get('questions');
		return $query->result_array();
  	}

  	function get_by_language($language_id) {
  		$this->load->database();
		
		$query = $this->db->query('
								SELECT question from questions
								JOIN languages ON questions.language_id = languages.id
								WHERE languages.id = '.$language_id.'
								ORDER BY questions.q_number
								');
		return $query->result_array();
  	}
}
?>

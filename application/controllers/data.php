<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}


	function index() {
	}

	function hotels_restaurants() {
		$this->load->model('hotels_model');
		$result = $this->hotels_model->get_restaurants();

		$output = array();

		foreach ($result as $value) {
			$output[$value['hotel_id']][] = $value['restaurant_id'];
		}

		$this->data['output'] = $output;
		$this->load->view('json_view', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');

		$demo = $this->input->get('demo_user');
		$restaurant = $this->input->get('r');

		if ($restaurant > 0) {
			$data = array(
               'restaurant_id'  => $restaurant,
               'trial' => 1
               );
    		$this->session->set_userdata($data);
    		$this->tank_auth->qr_login();
		}elseif ($demo == 'yes') {
			$this->tank_auth->demo_login();
		}

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->data['is_admin'] = $this->tank_auth->is_admin();
		}


	}

	function index() {

		if ($this->input->post('submit')) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('restaurant','Restaurant','required');
			$this->form_validation->set_rules('meal','Meal','required');

	    	if ($this->form_validation->run() == TRUE) {
	    		
	    		$data = array(
                   'restaurant_id'  => $this->input->post('restaurant'),
                   'meal_id'  => $this->input->post('meal'),
                   );
	    		$this->session->set_userdata($data);
	    		redirect('/survey/language');
	    	} else {
	    		$this->load->model('restaurants_model');
	    		$this->load->model('meals_model');
				$this->load->model('hotels_model');
				$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);
				$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);
				$this->data['meals'] = $this->meals_model->getall();
				$this->load->view('restaurant_select', $this->data);
	    	}
		} else {

		$this->load->model('restaurants_model');
		$this->load->model('hotels_model');
		$this->load->model('meals_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);
		$this->data['meals'] = $this->meals_model->getall();
		$this->load->view('restaurant_select', $this->data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
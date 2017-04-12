<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');

		if (!$this->tank_auth->is_logged_in()) {
			// $redirect_path = '/'.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
			// $this->session->set_flashdata('redirect', $redirect_path);
			redirect('/auth/login/');
		} else {
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->data['is_admin'] = $this->tank_auth->is_admin();
		}
	}

	function checkroom($room) {
		$this->load->model('scores_model');
		$date = date("Y-m-d");
		$from = $date." 00:00:00";
		$to = $date." 23:59:59";
		$this->data['output'] = $this->scores_model->is_room_done($room, $this->session->userdata['restaurant_id'], $from, $to);
		$this->load->view('json_view', $this->data);
	}

    function my_array_column( array $input, $column_key, $index_key = null ) {
    
        $result = array();
        foreach( $input as $k => $v )
            $result[ $index_key ? $v[ $index_key ] : $k ] = $v[ $column_key ];
        
        return $result;
    }
	
	function do_upload($field)
	{
		$config['upload_path'] = 'assets/uploads/files/';
		$config['allowed_types'] = '*';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($field))
		{
			$this->data['error'] = array('error' => $this->upload->display_errors());
			return NULL;
		}
		else
		{
			$file = $this->upload->data();
			return $file['file_name'];

		}
	}

	function notify($room, $score, $restaurant_id) {
		$this->load->model("notoficants_model");
		$this->load->model("restaurants_model");

		$mails = $this->notoficants_model->get_hotel_notificants($restaurant_id);

		$restaurant = $this->restaurants_model->get_restaurant_name($restaurant_id);

		$this->load->library('email');
		$this->load->helper('url');
		
		$this->email->from('restaurant-survey@sunrise-resorts.com', 'Restaurant Survey');
		$processed_mails = explode(',',(implode(',', $this->my_array_column($mails, 'email'))));
		$this->email->to($processed_mails);

		$this->email->subject("Restaurant survey notification from ".$restaurant[0]['hotel_name']);
		$this->email->message("<FONT face=Calibri color=#000000 style='font-size:11pt;'>Dear Sir/Madam,<br/>
							<br/>
							Kindly be informed that room number ".$room." from ".$restaurant[0]['hotel_name']." submitted a score of ".$score." % at ".$restaurant[0]['restaurant_name'].". <br/>
							<br>
							Best regards,<br>
							Restaurant survey system.
							</FONT>

							");

		$mail_result = $this->email->send();
		// echo $mail_result;
	}
	

	function index() {

		if ($this->input->post('submit')) {

			$photo_name = $this->do_upload('picture');

			$this->load->library('form_validation');

			$this->form_validation->set_rules('room','Room','trim|required');
			$this->form_validation->set_rules('country','Nationality','trim|required');
			$this->form_validation->set_rules('offer','1st Question','required');
			$this->form_validation->set_rules('dishes','2nd Question','required');
			$this->form_validation->set_rules('service','3rd Question','required');
			$this->form_validation->set_rules('atmosphere','4th Question','required');
			$this->form_validation->set_rules('drinks','5th Question','required');
			$this->form_validation->set_rules('timing','6th Question','required');
			$this->form_validation->set_rules('comments','Comments','trim');
	    	if ($this->form_validation->run() == TRUE) {

	    		$this->load->model('scores_model');

	    		$offer = $this->input->post('offer');
				$dishes = $this->input->post('dishes');
				$service = $this->input->post('service');
				$atmosphere = $this->input->post('atmosphere');
				$drinks = $this->input->post('drinks');
				$timing = $this->input->post('timing');


	    		$survey_data = array(
	    							'restaurant_id' => $this->input->post('restaurant'),
	    							'meal_id' => $this->input->post('meal'),
	    							'language_id' => $this->input->post('language'),
	    							'room' => $this->input->post('room'),
									'country_id' => $this->input->post('country'),
									'offer' => $offer,
									'dishes' => $dishes,
									'service' => $service,
									'atmosphere' => $atmosphere,
									'drinks' => $drinks,
									'timing' => $timing,
									'comments' => $this->input->post('comments'),
									'email' => $this->input->post('email'),
									'picture' => $photo_name,
	    							);
	    		$survey_id = $this->scores_model->create($survey_data);
	    		
	    		$score = (abs($offer-5) + abs($dishes-5) + abs($service-5) + abs($atmosphere-5) + abs($drinks-5))/20;

	    		if ($score < 0.7) {
	    			$this->notify($this->input->post('room'), $score*100, $this->input->post('restaurant'));
	    		}

	    		if (!$survey_id) {
	    			die("ERROR");//@TODO failure view
	    		}
	    		$this->load->view('survey_success', $this->data);
	    	}else {
	    		$this->view_survey();
	    	}
		} else {
			$this->view_survey();
		}
	}

	private function view_survey() {
		$this->load->model('countries_model');
		$this->load->model('questions_model');
		$this->load->model('texts_model');

		$countries = $this->countries_model->getall();
		$questions = $this->questions_model->get_by_language($this->session->userdata['language_id']);
		$texts = $this->texts_model->get_by_language ($this->session->userdata['language_id']);

		$this->data['countries'] = $countries;
		$this->data['questions'] = $questions;
		$this->data['texts'] = $texts;

		$this->load->view('survey_view', $this->data);
	}

	function language() {

		if ($this->input->post('submit')) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('language','language','required');

	    	if ($this->form_validation->run() == TRUE) {
	    		
	    		$data = array(
                   'language_id'  => $this->input->post('language'),
                   );
	    		$this->session->set_userdata($data);
	    		redirect('/survey');
	    	}
		} else {

			$this->load->model('languages_model');
			$this->load->model('restaurants_model');
			$restaurant_details = $this->restaurants_model->get_restaurant_details($this->session->userdata['restaurant_id']);
			$this->data['restaurant'] = $restaurant_details[0];
			$this->data['languages'] = $this->languages_model->getall();
			$this->load->view('language_select', $this->data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');

		if (!$this->tank_auth->is_logged_in()) {
			$redirect_path = '/'.$this->uri->segment(1);
			$this->session->set_flashdata('redirect', $redirect_path);
			redirect('/auth/login/');
		} else {
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->data['is_admin'] = $this->tank_auth->is_admin();
		}
	}

	function index() {
		$this->load->view("report_list", $this->data);
	}

	public static function non_zero($val) {
		return ($val == 0)? FALSE : TRUE;
	}

	function export() {
		$tata = $_SERVER['DOCUMENT_ROOT'].'/htmltopdt.sh '.$this->input->post('url').' '.$this->input->post('report');
		$vovo = exec($tata);
		die($tata);
	}

	function maildaily() {
		$this->load->model("restaurants_model");
		$this->load->model("daily_model");

		$restaurants = $this->restaurants_model->getall();

		foreach ($restaurants as $restaurant) {
			$mails = $this->daily_model->get_mail_by_restaurant($restaurant['id']);

			//select users by restaurant_id, execute script by restaurant_id, attach file
			$this->load->library('email');
			$this->load->helper('url');
			
			$this->email->from('restaurant-survey@sunrise-resorts.com', 'Restaurant Survey');
			$this->email->to(array_column($mails, 'email'));

			$this->email->subject("Restaurant Survey daily report");
			$this->email->message("Dear Sir,<br/>
								<br/>
								Please find attached".$restaurant['name']." Restaurant Survey automated daily report<br/>

								");

			$exec = getcwd().'/mailing/daily_report.sh '.$restaurant['id'];
			
			$output = exec($exec);

			$this->email->attach(getcwd().'/mailing/'.$restaurant['id']."_".date('Y-m-d',strtotime("-1 days")));

			//$mail_result = $this->email->send();
		}
	}

	function mailmonthy() {
		$this->load->model("restaurants_model");
		$this->load->model("daily_model");

		$restaurants = $this->restaurants_model->getall();

		foreach ($restaurants as $restaurant) {
			$mails = $this->daily_model->get_mail_by_restaurant($restaurant['id']);


			$this->load->library('email');
			$this->load->helper('url');
			
			$this->email->from('restaurant-survey@sunrise-resorts.com', 'Restaurant Survey');
			$this->email->to(array_column($mails, 'email'));

			$this->email->subject("Restaurant Survey daily report");
			$this->email->message("Dear Sir,<br/>
								<br/>
								Please find attached ".$restaurant['name']." Restaurant Survey automated daily report<br/>

								");

			$this->email->attach(getcwd().'/mailing/'.$restaurant['id']."_".date('Y-m',strtotime("-1 days")).".pdf");

			$mail_result = $this->email->send();
			echo $mail_result;
		}
	}

	function survey_count($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');
		
		if ($this->input->post('submit') || strlen($month) > 0) {
			// $from_date = ($this->input->post('from'))? $this->input->post('from') : $from;
			// $to_date = ($this->input->post('to'))? $this->input->post('to') : $to;
			$month = ($this->input->post('month'))? $this->input->post('month') : $month;
			// $monthly = ($this->input->post('monthly'))? $this->input->post('monthly') : $monthly;

			// if($monthly) {
				
			// }

			$this->load->model('hotels_model');
			$this->load->model('restaurants_model');
			$this->load->model('scores_model');
			$hotels = $this->hotels_model->getall();
			
			$scores = array();
			$totals = array();

			$date_vars = explode("-", $month);

			$month_days = cal_days_in_month(CAL_GREGORIAN, $date_vars[1], $date_vars[0]);
			
			$g_totals = array();
			for ($i=1; $i <= $month_days; $i++) { 
				$g_totals[$i] = 0;
			}
			$g_totals[99] = 0;

			foreach ($hotels as $hotel) {
				$scores[$hotel['code']] = array();
				$restaurants = $this->restaurants_model->get_hotel_restaurants($hotel['id']);

				foreach ($restaurants as $restaurant) {
					$scores[$hotel['code']][$restaurant['name']] = array();
					
					// $from_array = explode("-", $from_date);
					// $to_array = explode("-", $to_date);

					for ($i=1; $i <= $month_days; $i++) { 
						$from_date = $month."-".sprintf("%02d",$i)." 00:00:00";
						$to_date = $month."-".sprintf("%02d",$i)." 23:59:59";

						$score = $this->scores_model->get_count($restaurant['id'], $from_date, $to_date, $meal);

						$scores[$hotel['code']][$restaurant['name']][$i] = $score[0]['count'];
					}

					$scores[$hotel['code']][$restaurant['name']][99] = array_sum($scores[$hotel['code']][$restaurant['name']]);
				}

				for ($i=1; $i <= $month_days; $i++) { 
					$from_date = $month."-".sprintf("%02d",$i)." 00:00:00";
					$to_date = $month."-".sprintf("%02d",$i)." 23:59:59";

					$score = $this->scores_model->get_hotel_count($hotel['id'], $from_date, $to_date, $meal);

					$totals[$hotel['code']][$i] = $score[0]['count'];

					$g_totals[$i] += $totals[$hotel['code']][$i];

				}
				$totals[$hotel['code']][99] = array_sum($totals[$hotel['code']]);
				$g_totals[99] += $totals[$hotel['code']][99];
			}

			$this->data['month_days'] = $month_days;
			$this->data['totals'] = $totals;
			$this->data['g_totals'] = $g_totals;
			$this->data['scores'] = $scores;
			$this->load->view("count_view", $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view("count_view", $this->data);
		}

	}

	function timing($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($restaurant) >0) {

			$restaurant_id  = ($this->input->post('restaurant'))? $this->input->post('restaurant') : $restaurant;
			$from_date = ($this->input->post('from'))? $this->input->post('from') : $from;
			$to_date = ($this->input->post('to'))? $this->input->post('to') : $to;
			$month = ($this->input->post('month'))? $this->input->post('month') : $month;
			$monthly = ($this->input->post('monthly'))? $this->input->post('monthly') : $monthly;

			if($monthly) {
				$from_date = $month."-01 00:00:00";
				$to_date = $month."-31 23:59:59";
			} else {
				$from_date .=" 00:00:00";
				$to_date .= " 23:59:59";
			}

			$this->load->model('scores_model');
			$this->load->model('languages_model');

			$languages = $this->languages_model->getall();

			$scores = array();
			$scores['totals'] = array();

			$total_yes = $this->scores_model->get_timing_total($restaurant_id, 1, $from_date, $to_date, $meal);
			$total_no = $this->scores_model->get_timing_total($restaurant_id, 0, $from_date, $to_date, $meal);
			$total_count = $this->scores_model->get_timing_count_total($restaurant_id, $from_date, $to_date, $meal);


			$scores['totals']['yes'] = round(($total_yes[0]['score']/$total_count[0]['score'])*100);
			$scores['totals']['no'] = round(($total_no[0]['score']/$total_count[0]['score'])*100);
			$scores['totals']['count'] = $total_count[0]['score'];
			$scores['totals']['language'] = "Total";

			foreach ($languages as $language) {
				$yes = $this->scores_model->get_timing_score($language['id'], $restaurant_id, 1, $from_date, $to_date, $meal);
				$no = $this->scores_model->get_timing_score($language['id'], $restaurant_id, 0, $from_date, $to_date, $meal);
				$count = $this->scores_model->get_timing_count_score($language['id'], $restaurant_id, $from_date, $to_date, $meal);

				$scores[$language['id']]['yes'] = round(($yes[0]['score']/$count[0]['score'])*100);
				$scores[$language['id']]['no'] = round(($no[0]['score']/$count[0]['score'])*100);
				$scores[$language['id']]['count'] = $count[0]['score'];
				$scores[$language['id']]['language'] = $language['name'];
			}

			$this->data['scores'] = $scores;
			$this->load->view('report_timing', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('report_timing', $this->data);
		}
	}

	function summary($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($restaurant) >0) {

			$restaurant_id  = ($this->input->post('restaurant'))? $this->input->post('restaurant') : $restaurant;
			$from_date = ($this->input->post('from'))? $this->input->post('from') : $from;
			$to_date = ($this->input->post('to'))? $this->input->post('to') : $to;
			$month = ($this->input->post('month'))? $this->input->post('month') : $month;
			$monthly = ($this->input->post('monthly'))? $this->input->post('monthly') : $monthly;

			if($monthly) {
				$from_date = $month."-01 00:00:00";
				$to_date = $month."-31 23:59:59";
			} else {
				$from_date .=" 00:00:00";
				$to_date .= " 23:59:59";
			}

			$this->load->model('scores_model');
			$this->load->model('languages_model');
			$this->load->model('rates_model');
			$this->load->model('questions_model');

			$languages = $this->languages_model->getall();

			$scores = array();
			$scores['totals'] = array();

			$questions = $this->questions_model->get_by_language(8);

			$scores['totals']['offer']['question'] = $questions[0]['question'];
			$scores['totals']['dishes']['question'] = $questions[1]['question'];
			$scores['totals']['service']['question'] = $questions[2]['question'];
			$scores['totals']['atmosphere']['question'] = $questions[3]['question'];
			$scores['totals']['drinks']['question'] = $questions[4]['question'];

			$scores['totals']['offer']['scores'] = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 'total' => 0);
			$scores['totals']['dishes']['scores'] = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 'total' => 0);
			$scores['totals']['service']['scores'] = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 'total' => 0);
			$scores['totals']['atmosphere']['scores'] = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 'total' => 0);
			$scores['totals']['drinks']['scores'] = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 'total' => 0);

			foreach ($languages as $language) {
				$scores[$language['id']]['language'] = $language['name'];

				$scores[$language['id']]['offer']['scores']['total'] = 0;
				$scores[$language['id']]['dishes']['scores']['total'] = 0;
				$scores[$language['id']]['service']['scores']['total'] = 0;
				$scores[$language['id']]['atmosphere']['scores']['total'] = 0;
				$scores[$language['id']]['drinks']['scores']['total'] = 0;

				$questions = $this->questions_model->get_by_language($language['id']);

				$scores[$language['id']]['offer']['question'] = $questions[0]['question'];
				$scores[$language['id']]['dishes']['question'] = $questions[1]['question'];
				$scores[$language['id']]['service']['question'] = $questions[2]['question'];
				$scores[$language['id']]['atmosphere']['question'] = $questions[3]['question'];
				$scores[$language['id']]['drinks']['question'] = $questions[4]['question'];

				$rates = $this->rates_model->get_by_language($language['id']);
				foreach ($rates as $rate) {

					$scores[$language['id']]['head'][$rate['rate']] = $rate['name'];

					$offer_score = $this->scores_model->get_offer_score($language['id'], $rate['rate'], $restaurant_id, $from_date, $to_date, $meal);
					$dishes_score = $this->scores_model->get_dishes_score($language['id'], $rate['rate'], $restaurant_id, $from_date, $to_date, $meal);
					$service_score = $this->scores_model->get_service_score($language['id'], $rate['rate'], $restaurant_id, $from_date, $to_date, $meal);
					$atmosphere_score = $this->scores_model->get_atmosphere_score($language['id'], $rate['rate'], $restaurant_id, $from_date, $to_date, $meal);
					$drinks_score = $this->scores_model->get_drinks_score($language['id'], $rate['rate'], $restaurant_id, $from_date, $to_date, $meal);

					$scores[$language['id']]['offer']['scores'][$rate['rate']] = $offer_score[0]['score'];
					$scores[$language['id']]['dishes']['scores'][$rate['rate']] = $dishes_score[0]['score'];
					$scores[$language['id']]['service']['scores'][$rate['rate']] = $service_score[0]['score'];
					$scores[$language['id']]['atmosphere']['scores'][$rate['rate']] = $atmosphere_score[0]['score'];
					$scores[$language['id']]['drinks']['scores'][$rate['rate']] = $drinks_score[0]['score'];

					$scores[$language['id']]['offer']['scores']['total'] += $scores[$language['id']]['offer']['scores'][$rate['rate']];
					$scores[$language['id']]['dishes']['scores']['total'] += $scores[$language['id']]['dishes']['scores'][$rate['rate']];
					$scores[$language['id']]['service']['scores']['total'] += $scores[$language['id']]['service']['scores'][$rate['rate']];
					$scores[$language['id']]['atmosphere']['scores']['total'] += $scores[$language['id']]['atmosphere']['scores'][$rate['rate']];
					$scores[$language['id']]['drinks']['scores']['total'] += $scores[$language['id']]['drinks']['scores'][$rate['rate']];


					$scores['totals']['offer']['scores'][$rate['rate']] += $scores[$language['id']]['offer']['scores'][$rate['rate']];
					$scores['totals']['dishes']['scores'][$rate['rate']] += $scores[$language['id']]['dishes']['scores'][$rate['rate']];
					$scores['totals']['service']['scores'][$rate['rate']] += $scores[$language['id']]['service']['scores'][$rate['rate']];
					$scores['totals']['atmosphere']['scores'][$rate['rate']] += $scores[$language['id']]['atmosphere']['scores'][$rate['rate']];
					$scores['totals']['drinks']['scores'][$rate['rate']] += $scores[$language['id']]['drinks']['scores'][$rate['rate']];

					$scores['totals']['offer']['scores']['total'] += $scores[$language['id']]['offer']['scores'][$rate['rate']];
					$scores['totals']['dishes']['scores']['total'] += $scores[$language['id']]['dishes']['scores'][$rate['rate']];
					$scores['totals']['service']['scores']['total'] += $scores[$language['id']]['service']['scores'][$rate['rate']];
					$scores['totals']['atmosphere']['scores']['total'] += $scores[$language['id']]['atmosphere']['scores'][$rate['rate']];
					$scores['totals']['drinks']['scores']['total'] += $scores[$language['id']]['drinks']['scores'][$rate['rate']];
				}

				$scores[$language['id']]['offer']['scores']['q_satsf'] = 0;
				$scores[$language['id']]['dishes']['scores']['q_satsf'] = 0;
				$scores[$language['id']]['service']['scores']['q_satsf'] = 0;
				$scores[$language['id']]['atmosphere']['scores']['q_satsf'] = 0;
				$scores[$language['id']]['drinks']['scores']['q_satsf'] = 0;
				$scores[$language['id']]['kit'] = 0;
				$scores[$language['id']]['fb'] = 0;
				$scores[$language['id']]['final'] = 0;

				foreach ($rates as $rate) {

					$rate_code = $rate['rate']-6;
					if($rate_code != 0) {

						$rate_code = abs( $rate_code/ 5);
					}


					$scores[$language['id']]['offer']['scores']['q_satsf'] += ($scores[$language['id']]['offer']['scores'][$rate['rate']]/$scores[$language['id']]['offer']['scores']['total']) * $rate_code;
					$scores[$language['id']]['dishes']['scores']['q_satsf'] += ($scores[$language['id']]['dishes']['scores'][$rate['rate']]/$scores[$language['id']]['dishes']['scores']['total']) * $rate_code;
					$scores[$language['id']]['service']['scores']['q_satsf'] += ($scores[$language['id']]['service']['scores'][$rate['rate']]/$scores[$language['id']]['service']['scores']['total']) * $rate_code;
					$scores[$language['id']]['atmosphere']['scores']['q_satsf'] += ($scores[$language['id']]['atmosphere']['scores'][$rate['rate']]/$scores[$language['id']]['atmosphere']['scores']['total']) * $rate_code;
					$scores[$language['id']]['drinks']['scores']['q_satsf'] += ($scores[$language['id']]['drinks']['scores'][$rate['rate']]/$scores[$language['id']]['drinks']['scores']['total']) * $rate_code;

					$scores[$language['id']]['kit'] +=
						(($scores[$language['id']]['offer']['scores'][$rate['rate']]+$scores[$language['id']]['dishes']['scores'][$rate['rate']])
						/($scores[$language['id']]['offer']['scores']['total']+$scores[$language['id']]['dishes']['scores']['total'])) * $rate_code;
					
					$scores[$language['id']]['fb'] +=
						(($scores[$language['id']]['service']['scores'][$rate['rate']]+$scores[$language['id']]['drinks']['scores'][$rate['rate']]+$scores[$language['id']]['atmosphere']['scores'][$rate['rate']])
						/($scores[$language['id']]['service']['scores']['total']+$scores[$language['id']]['atmosphere']['scores']['total']+$scores[$language['id']]['drinks']['scores']['total'])) * $rate_code;

					$scores[$language['id']]['final'] +=
						(($scores[$language['id']]['offer']['scores'][$rate['rate']]+$scores[$language['id']]['dishes']['scores'][$rate['rate']]+$scores[$language['id']]['service']['scores'][$rate['rate']]+$scores[$language['id']]['drinks']['scores'][$rate['rate']]+$scores[$language['id']]['atmosphere']['scores'][$rate['rate']])
						/($scores[$language['id']]['service']['scores']['total']+$scores[$language['id']]['atmosphere']['scores']['total']+$scores[$language['id']]['drinks']['scores']['total']+$scores[$language['id']]['offer']['scores']['total']+$scores[$language['id']]['dishes']['scores']['total'])) * $rate_code;
				}
			}

			$scores['totals']['offer']['scores']['q_satsf'] = 0;
			$scores['totals']['dishes']['scores']['q_satsf'] = 0;
			$scores['totals']['service']['scores']['q_satsf'] = 0;
			$scores['totals']['atmosphere']['scores']['q_satsf'] = 0;
			$scores['totals']['drinks']['scores']['q_satsf'] = 0;
			$scores['totals']['kit'] = 0;
			$scores['totals']['fb'] = 0;
			$scores['totals']['final'] = 0;

			$scores['totals']['head'] = $scores[8]['head'];
			$scores['totals']['language'] = 'Consolidation';

			foreach ($rates as $rate) {

				$rate_code = $rate['rate']-6;
				if($rate_code != 0) {

					$rate_code = abs( $rate_code / 5);
				}


				$scores['totals']['offer']['scores']['q_satsf'] += ($scores['totals']['offer']['scores'][$rate['rate']]/$scores['totals']['offer']['scores']['total']) * $rate_code;
				$scores['totals']['dishes']['scores']['q_satsf'] += ($scores['totals']['dishes']['scores'][$rate['rate']]/$scores['totals']['dishes']['scores']['total']) * $rate_code;
				$scores['totals']['service']['scores']['q_satsf'] += ($scores['totals']['service']['scores'][$rate['rate']]/$scores['totals']['service']['scores']['total']) * $rate_code;
				$scores['totals']['atmosphere']['scores']['q_satsf'] += ($scores['totals']['atmosphere']['scores'][$rate['rate']]/$scores['totals']['atmosphere']['scores']['total']) * $rate_code;
				$scores['totals']['drinks']['scores']['q_satsf'] += ($scores['totals']['drinks']['scores'][$rate['rate']]/$scores['totals']['drinks']['scores']['total']) * $rate_code;

				$scores['totals']['kit'] +=
					(($scores['totals']['offer']['scores'][$rate['rate']]+$scores['totals']['dishes']['scores'][$rate['rate']])
					/($scores['totals']['offer']['scores']['total']+$scores['totals']['dishes']['scores']['total'])) * $rate_code;
				
				$scores['totals']['fb'] +=
					(($scores['totals']['service']['scores'][$rate['rate']]+$scores['totals']['drinks']['scores'][$rate['rate']]+$scores['totals']['atmosphere']['scores'][$rate['rate']])
					/($scores['totals']['service']['scores']['total']+$scores['totals']['atmosphere']['scores']['total']+$scores['totals']['drinks']['scores']['total'])) * $rate_code;


					$scores['totals']['final'] +=
						(($scores['totals']['offer']['scores'][$rate['rate']]+$scores['totals']['dishes']['scores'][$rate['rate']]+$scores['totals']['service']['scores'][$rate['rate']]+$scores['totals']['drinks']['scores'][$rate['rate']]+$scores['totals']['atmosphere']['scores'][$rate['rate']])
						/($scores['totals']['service']['scores']['total']+$scores['totals']['atmosphere']['scores']['total']+$scores['totals']['drinks']['scores']['total']+$scores['totals']['offer']['scores']['total']+$scores['totals']['dishes']['scores']['total'])) * $rate_code;
			}


			$this->data['scores'] = $scores;
			$this->load->view('report_view', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('report_view', $this->data);
		}
	}

	function detailed($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit')) {

			$restaurant_id  = $this->input->post('restaurant');
			$from_date = $this->input->post('from');
			$to_date = $this->input->post('to');
			$month = $this->input->post('month');
			$monthly = $this->input->post('monthly');

			if($monthly) {
				$from_date = $month."-01 00:00:00";
				$to_date = $month."-31 23:59:59";
			} else {
				$from_date .=" 00:00:00";
				$to_date .= " 23:59:59";
			}

			$this->load->model('scores_model');
			$this->load->model('languages_model');
			$this->load->model('rates_model');
			$this->load->model('questions_model');

			$records = $this->scores_model->get_restaurant_records($restaurant_id, $from_date, $to_date, $meal);

			$this->data['records'] = $records;
			$this->load->view('detailed_report', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('detailed_report', $this->data);
		}
	}

	function comments($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit')) {

			$restaurant_id  = $this->input->post('restaurant');
			$from_date = $this->input->post('from');
			$to_date = $this->input->post('to');
			$month = $this->input->post('month');
			$monthly = $this->input->post('monthly');

			if($monthly) {
				$from_date = $month."-01 00:00:00";
				$to_date = $month."-31 23:59:59";
			} else {
				$from_date .=" 00:00:00";
				$to_date .= " 23:59:59";
			}

			$this->load->model('scores_model');
			$this->load->model('languages_model');
			$this->load->model('rates_model');
			$this->load->model('questions_model');

			$records = $this->scores_model->get_restaurant_comments($restaurant_id, $from_date, $to_date, $meal);

			$this->data['records'] = $records;
			$this->load->view('comments_report', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('comments_report', $this->data);
		}
	}

	function restaurant_ytd($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($restaurant) >0) {

			$restaurant_id  = ($this->input->post('restaurant'))? $this->input->post('restaurant') : $restaurant;
		
			$year = ($this->input->post('year'))? $this->input->post('year') : $year;

			$this->load->model('scores_model');
			$scores = array();
			$scores['Question 1'] = array();
			$scores['Question 2'] = array();
			$scores['Question 3'] = array();
			$scores['Question 4'] = array();
			$scores['Question 5'] = array();
			$scores['Kitchen'] = array();
			$scores['F & B'] = array();
			$scores['Total'] = array();

			for ($i=1; $i <=12 ; $i++) { 
				$from_date = $year."-".sprintf("%02d",$i)."-01 00:00:00";
				$to_date = $year."-".sprintf("%02d",$i)."-31 23:59:59";

				$offer_score = $this->scores_model->get_offer_avg($restaurant_id, $from_date, $to_date, $meal);
				$dishes_score = $this->scores_model->get_dishes_avg($restaurant_id, $from_date, $to_date, $meal);
				$service_score = $this->scores_model->get_service_avg($restaurant_id, $from_date, $to_date, $meal);
				$atmosphere_score = $this->scores_model->get_atmosphere_avg($restaurant_id, $from_date, $to_date, $meal);
				$drinks_score = $this->scores_model->get_drinks_avg($restaurant_id, $from_date, $to_date, $meal);
				$kitchen_score = $this->scores_model->get_kitchen($restaurant_id, $from_date, $to_date, $meal);
				$fb_score = $this->scores_model->get_fb($restaurant_id, $from_date, $to_date, $meal);
				$total_score = $this->scores_model->get_hotel($restaurant_id, $from_date, $to_date, $meal);

				$scores['Question 1'][$i] = ($offer_score[0]['score'] > 0)? round((abs($offer_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 2'][$i] = ($dishes_score[0]['score'] > 0)? round((abs($dishes_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 3'][$i] = ($service_score[0]['score'] > 0)? round((abs($service_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 4'][$i] = ($atmosphere_score[0]['score'] > 0)? round((abs($atmosphere_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 5'][$i] = ($drinks_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Kitchen'][$i] = ($kitchen_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0;//round(($scores['Question 1'][$i] + $scores['Question 2'][$i])/2);
				$scores['F & B'][$i] = ($fb_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0;//round(($scores['Question 3'][$i] + $scores['Question 4'][$i] + $scores['Question 5'][$i])/3);
				$scores['Total'][$i] = ($total_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0;//round(($scores['Question 1'][$i] + $scores['Question 2'][$i] + $scores['Question 3'][$i] + $scores['Question 4'][$i] + $scores['Question 5'][$i])/5);

			}

			$from_date = $year."-01-01 00:00:00";
			$to_date = $year."-12-31 23:59:59";

			$offer_score = $this->scores_model->get_offer_avg($restaurant_id, $from_date, $to_date, $meal);
			$dishes_score = $this->scores_model->get_dishes_avg($restaurant_id, $from_date, $to_date, $meal);
			$service_score = $this->scores_model->get_service_avg($restaurant_id, $from_date, $to_date, $meal);
			$atmosphere_score = $this->scores_model->get_atmosphere_avg($restaurant_id, $from_date, $to_date, $meal);
			$drinks_score = $this->scores_model->get_drinks_avg($restaurant_id, $from_date, $to_date, $meal);
			$kitchen_score = $this->scores_model->get_kitchen($restaurant_id, $from_date, $to_date, $meal);
			$fb_score = $this->scores_model->get_fb($restaurant_id, $from_date, $to_date, $meal);
			$total_score = $this->scores_model->get_hotel($restaurant_id, $from_date, $to_date, $meal);

			$scores['Question 1'][] = ($offer_score[0]['score'] > 0)? round((abs($offer_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Question 1'], "Reports::non_zero")) / count(array_filter($scores['Question 1'], "Reports::non_zero"))));
			$scores['Question 2'][] = ($dishes_score[0]['score'] > 0)? round((abs($dishes_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Question 2'], "Reports::non_zero")) / count(array_filter($scores['Question 2'], "Reports::non_zero"))));
			$scores['Question 3'][] = ($service_score[0]['score'] > 0)? round((abs($service_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Question 3'], "Reports::non_zero")) / count(array_filter($scores['Question 3'], "Reports::non_zero"))));
			$scores['Question 4'][] = ($atmosphere_score[0]['score'] > 0)? round((abs($atmosphere_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Question 4'], "Reports::non_zero")) / count(array_filter($scores['Question 4'], "Reports::non_zero"))));
			$scores['Question 5'][] = ($drinks_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Question 5'], "Reports::non_zero")) / count(array_filter($scores['Question 5'], "Reports::non_zero"))));
			$scores['Kitchen'][] = ($kitchen_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Kitchen'], "Reports::non_zero")) / count(array_filter($scores['Kitchen'], "Reports::non_zero"))));
			$scores['F & B'][] = ($fb_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['F & B'], "Reports::non_zero")) / count(array_filter($scores['F & B'], "Reports::non_zero"))));
			$scores['Total'][] = ($total_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0; //round((array_sum(array_filter($scores['Total'], "Reports::non_zero")) / count(array_filter($scores['Total'], "Reports::non_zero"))));

			$this->data['scores'] = $scores;
			$this->load->view('restaurant_ytd', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('restaurant_ytd', $this->data);
		}
	}

	function hotel_lang_mtd($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($hotel) >0) {

			$hotel_id  = ($this->input->post('hotel'))? $this->input->post('hotel') : $hotel;
		
			$month = ($this->input->post('month'))? $this->input->post('month') : $month;

			$this->load->model('restaurants_model');
			$this->data['restaurants'] = $this->restaurants_model->get_hotel_restaurants($hotel_id);

			$this->load->model('languages_model');
			$this->data['languages'] = $this->languages_model->getall();

			$from_date = $month."-01 00:00:00";
			$to_date = $month."-31 23:59:59";

			$this->load->model('scores_model');
			$scores = array();

			$total = array();
			foreach ($this->data['languages'] as $language) {
				$score = $this->scores_model->get_hotel_lang($language['id'], $hotel_id, $from_date, $to_date); //, $meal0;
				$total[$language['name']] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
			}

			

			foreach ($this->data['restaurants'] as $restaurant) {
				$scores[$restaurant['name']] = array();
				foreach ($this->data['languages'] as $language) {
					$score = $this->scores_model->get_lang_avg($restaurant['id'], $language['id'], $from_date, $to_date, $meal);
					$scores[$restaurant['name']][$language['name']] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
					// $total[$language['name']] += $scores[$restaurant['name']][$language['name']];
				}
			}

			$scores['Total'] = $total;

			// foreach ($scores['Total'] as &$totsc) {
			// 	$totsc = round($totsc/count($this->data['restaurants']));
			// }

			$this->data['scores'] = $scores;
			$this->load->view('hotel_lang_mtd', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('hotel_lang_mtd', $this->data);
		}
	}

	function restaurant_ytd_lang($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($restaurant) >0) {

			$this->load->model('languages_model');
			$this->data['languages'] = $this->languages_model->getall();

			$restaurant_id  = ($this->input->post('restaurant'))? $this->input->post('restaurant') : $restaurant;
		
			$year = ($this->input->post('year'))? $this->input->post('year') : $year;

			$this->load->model('scores_model');
			$scores = array();

			for ($i=1; $i <=12 ; $i++) { 
				$from_date = $year."-".sprintf("%02d",$i)."-01 00:00:00";
				$to_date = $year."-".sprintf("%02d",$i)."-31 23:59:59";

				foreach ($this->data['languages'] as $language) {
					$score = $this->scores_model->get_lang_avg($restaurant_id, $language['id'], $from_date, $to_date, $meal);
					$scores[$language['name']][$i] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}

			}

			$from_date = $year."-01-01 00:00:00";
			$to_date = $year."-12-31 23:59:59";

			foreach ($this->data['languages'] as $language) {
				$score = $this->scores_model->get_lang_avg($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$scores[$language['name']][] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;//round(array_sum(array_filter($scores[$language['name']], "Reports::non_zero"))/count(array_filter($scores[$language['name']], "Reports::non_zero")));
			}

			$this->data['scores'] = $scores;
			$this->load->view('restaurant_ytd_lang', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('restaurant_ytd_lang', $this->data);
		}
	}

	function restaurant_mtd_lang($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('restaurants_model');
		$this->data['restaurants'] = $this->restaurants_model->get_user_restaurants($this->data['user_id']);

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		$this->load->model('languages_model');
		$this->data['languages'] = $this->languages_model->getall();

		if ($this->input->post('submit') || intval($restaurant) >0) {

			$restaurant_id  = ($this->input->post('restaurant'))? $this->input->post('restaurant') : $restaurant;

			$month = ($this->input->post('month'))? $this->input->post('month') : $month;

			$this->load->model('scores_model');
			$scores = array();
			$scores['Question 1'] = array();
			$scores['Question 2'] = array();
			$scores['Question 3'] = array();
			$scores['Question 4'] = array();
			$scores['Question 5'] = array();
			$scores['Kitchen'] = array();
			$scores['F & B'] = array();
			$scores['Total'] = array();

			$from_date = $month."-01 00:00:00";
			$to_date = $month."-31 23:59:59";

			foreach ($this->data['languages'] as $language) { 

				$offer_score = $this->scores_model->get_offer_avg_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$dishes_score = $this->scores_model->get_dishes_avg_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$service_score = $this->scores_model->get_service_avg_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$atmosphere_score = $this->scores_model->get_atmosphere_avg_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$drinks_score = $this->scores_model->get_drinks_avg_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$kitchen_score = $this->scores_model->get_kitchen_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$fb_score = $this->scores_model->get_fb_lang($restaurant_id, $language['id'], $from_date, $to_date, $meal);
				$total_score = $this->scores_model->get_lang_avg($restaurant_id, $language['id'], $from_date, $to_date, $meal);

				$scores['Question 1'][$language['id']] = ($offer_score[0]['score'] > 0)? round((abs($offer_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 2'][$language['id']] = ($dishes_score[0]['score'] > 0)? round((abs($dishes_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 3'][$language['id']] = ($service_score[0]['score'] > 0)? round((abs($service_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 4'][$language['id']] = ($atmosphere_score[0]['score'] > 0)? round((abs($atmosphere_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 5'][$language['id']] = ($drinks_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Kitchen'][$language['id']] = ($kitchen_score[0]['score'] > 0)? round((abs($kitchen_score[0]['score'] - 6))/5, 2)*100 : 0;//round(($scores['Question 1'][$language['id']] + $scores['Question 2'][$language['id']])/2);
				$scores['F & B'][$language['id']] = ($fb_score[0]['score'] > 0)? round((abs($fb_score[0]['score'] - 6))/5, 2)*100 : 0;//round(($scores['Question 3'][$language['id']] + $scores['Question 4'][$language['id']] + $scores['Question 5'][$language['id']])/3);
				$scores['Total'][$language['id']] = ($total_score[0]['score'] > 0)? round((abs($total_score[0]['score'] - 6))/5, 2)*100 : 0;//round(($scores['Question 1'][$language['id']] + $scores['Question 2'][$language['id']] + $scores['Question 3'][$language['id']] + $scores['Question 4'][$language['id']] + $scores['Question 5'][$language['id']])/5);

			}

			$this->data['scores'] = $scores;
			$this->load->view('restaurant_mtd_lang', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('restaurant_mtd_lang', $this->data);
		}
	}

	function hotel_ytd($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($hotel) >0) {

			$this->load->model('languages_model');
			$this->data['languages'] = $this->languages_model->getall();

			$hotel_id  = ($this->input->post('hotel'))? $this->input->post('hotel') : $hotel;

			$this->load->model('restaurants_model');
			$this->data['restaurants'] = $this->restaurants_model->get_hotel_restaurants($hotel_id);
		
			$year = ($this->input->post('year'))? $this->input->post('year') : $year;

			$this->load->model('scores_model');
			$scores = array();

			for ($i=1; $i <=12 ; $i++) { 
				$from_date = $year."-".sprintf("%02d",$i)."-01 00:00:00";
				$to_date = $year."-".sprintf("%02d",$i)."-31 23:59:59";

				foreach ($this->data['restaurants'] as $restaurant) {
					$score = $this->scores_model->get_avg($restaurant['id'], $from_date, $to_date, $meal);

					$scores[$restaurant['name']][$i] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}

			}

			foreach ($this->data['restaurants'] as $restaurant) {
				$from_date = $year."-01-01 00:00:00";
				$to_date = $year."-12-31 23:59:59";

				$score = $this->scores_model->get_avg($restaurant['id'], $from_date, $to_date, $meal);
				$scores[$restaurant['name']][] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;//round(array_sum(array_filter($scores[$restaurant['name']], "Reports::non_zero"))/count(array_filter($scores[$restaurant['name']], "Reports::non_zero")));
			}

			$this->data['scores'] = $scores;
			$this->load->view('hotel_ytd', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('hotel_ytd', $this->data);
		}
	}

	function hotel_ytd_lang($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('hotels_model');
		$this->data['hotels'] = $this->hotels_model->get_user_hotels($this->data['user_id']);

		if ($this->input->post('submit') || intval($hotel) >0) {

			$this->load->model('languages_model');
			$this->data['languages'] = $this->languages_model->getall();

			$hotel_id  = ($this->input->post('hotel'))? $this->input->post('hotel') : $hotel;

			$year = ($this->input->post('year'))? $this->input->post('year') : $year;

			$this->load->model('scores_model');
			$scores = array();

			for ($i=1; $i <=12 ; $i++) { 
				$from_date = $year."-".sprintf("%02d",$i)."-01 00:00:00";
				$to_date = $year."-".sprintf("%02d",$i)."-31 23:59:59";

				foreach ($this->data['languages'] as $language) {
					$score = $this->scores_model->get_hotel_lang($language['id'], $hotel_id, $from_date, $to_date, $meal);

					$scores[$language['name']][$i] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}

			}

			foreach ($this->data['languages'] as $language) {

				$from_date = $year."-01-01 00:00:00";
				$to_date = $year."-12-31 23:59:59";

				$score = $this->scores_model->get_hotel_lang($language['id'], $hotel_id, $from_date, $to_date, $meal);

				$scores[$language['name']][] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;//round(array_sum(array_filter($scores[$language['name']], "Reports::non_zero"))/count(array_filter($scores[$language['name']], "Reports::non_zero")));
			}

			$this->data['scores'] = $scores;
			$this->load->view('hotel_ytd_lang', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('hotel_ytd_lang', $this->data);
		}
	}

	function con_mtd_restaurant($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('languages_model');
		$this->data['languages'] = $this->languages_model->getall();


		if ($this->input->post('submit') || intval($month) >0) {

			$language_id = ($this->input->post('language'))? $this->input->post('language') : $language;


			$this->load->model('hotels_model');
			$this->data['hotels'] = $this->hotels_model->getall();

			$month = ($this->input->post('month'))? $this->input->post('month') : $month;

			$this->load->model('scores_model');
			$scores = array();

			$from_date = $month."-01 00:00:00";
			$to_date = $month."-31 23:59:59";

			foreach ($this->data['hotels'] as $hotel) { 

				$this->load->model('restaurants_model');
				$this->data['restaurants'][$hotel['id']] = $this->restaurants_model->get_hotel_restaurants($hotel['id']);

				foreach ($this->data['restaurants'][$hotel['id']] as $restaurant) {
					$score = $this->scores_model->get_lang_avg($restaurant['id'], $language_id, $from_date, $to_date, $meal);

					$scores[$restaurant['name']][$hotel['id']] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}
			}

			$this->data['scores'] = $scores;
			$this->load->view('con_mtd_lang_rest', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('con_mtd_lang_rest', $this->data);
		}
	}

	function con_mtd($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		if ($this->input->post('submit') || intval($month) >0) {

			$this->load->model('hotels_model');
			$this->data['hotels'] = $this->hotels_model->getall();

			$month = ($this->input->post('month'))? $this->input->post('month') : $month;

			$this->load->model('scores_model');
			$scores = array();

			$from_date = $month."-01 00:00:00";
			$to_date = $month."-31 23:59:59";

			foreach ($this->data['hotels'] as $hotel) { 

				$this->load->model('restaurants_model');
				$this->data['restaurants'][$hotel['id']] = $this->restaurants_model->get_hotel_restaurants($hotel['id']);

				foreach ($this->data['restaurants'][$hotel['id']] as $restaurant) {
					$score = $this->scores_model->get_avg($restaurant['id'], $from_date, $to_date, $meal);

					$scores[$restaurant['name']][$hotel['id']] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}
			}

			$this->data['scores'] = $scores;
			$this->load->view('con_mtd_rest', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('con_mtd_rest', $this->data);
		}
	}

	function con_mtd_lang($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		if ($this->input->post('submit') || intval($month) >0) {

			$this->load->model('hotels_model');
			$this->data['hotels'] = $this->hotels_model->getall();

			$this->load->model('languages_model');
			$this->data['languages'] = $this->languages_model->getall();

			$month = ($this->input->post('month'))? $this->input->post('month') : $month;

			$this->load->model('scores_model');
			$scores = array();

			$from_date = $month."-01 00:00:00";
			$to_date = $month."-31 23:59:59";

			foreach ($this->data['hotels'] as $hotel) { 

				foreach ($this->data['languages'] as $language) {
					$score = $this->scores_model->get_hotel_lang($language['id'], $hotel['id'], $from_date, $to_date, $meal);

					$scores[$language['name']][$hotel['id']] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}

			}

			$this->data['scores'] = $scores;
			$this->load->view('con_mtd_lang', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('con_mtd_lang', $this->data);
		}
	}

	function con_mtd_question($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		if ($this->input->post('submit') || intval($month) >0) {


			$this->load->model('hotels_model');
			$this->data['hotels'] = $this->hotels_model->getall();

		
			$month = ($this->input->post('month'))? $this->input->post('month') : $month;

			$from_date = $month."-01 00:00:00";
			$to_date = $month."-31 23:59:59";

			$this->load->model('scores_model');
			$scores = array();
			$scores['Question 1'] = array();
			$scores['Question 2'] = array();
			$scores['Question 3'] = array();
			$scores['Question 4'] = array();
			$scores['Question 5'] = array();
			$scores['Kitchen'] = array();
			$scores['F & B'] = array();
			$scores['Total'] = array();

			foreach ($this->data['hotels'] as $hotel) {
				

				$offer_score = $this->scores_model->get_hotel_offer_avg($hotel['id'], $from_date, $to_date, $meal);
				$dishes_score = $this->scores_model->get_hotel_dishes_avg($hotel['id'], $from_date, $to_date, $meal);
				$service_score = $this->scores_model->get_hotel_service_avg($hotel['id'], $from_date, $to_date, $meal);
				$atmosphere_score = $this->scores_model->get_hotel_atmosphere_avg($hotel['id'], $from_date, $to_date, $meal);
				$drinks_score = $this->scores_model->get_hotel_drinks_avg($hotel['id'], $from_date, $to_date, $meal);

				$scores['Question 1'][$hotel['id']] = ($offer_score[0]['score'] > 0)? round((abs($offer_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 2'][$hotel['id']] = ($dishes_score[0]['score'] > 0)? round((abs($dishes_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 3'][$hotel['id']] = ($service_score[0]['score'] > 0)? round((abs($service_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 4'][$hotel['id']] = ($atmosphere_score[0]['score'] > 0)? round((abs($atmosphere_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Question 5'][$hotel['id']] = ($drinks_score[0]['score'] > 0)? round((abs($drinks_score[0]['score'] - 6))/5, 2)*100 : 0;
				$scores['Kitchen'][$hotel['id']] = round(($scores['Question 1'][$hotel['id']] + $scores['Question 2'][$hotel['id']])/2);
				$scores['F & B'][$hotel['id']] = round(($scores['Question 3'][$hotel['id']] + $scores['Question 4'][$hotel['id']] + $scores['Question 5'][$hotel['id']])/3);
				$scores['Total'][$hotel['id']] = round(($scores['Question 1'][$hotel['id']] + $scores['Question 2'][$hotel['id']] + $scores['Question 3'][$hotel['id']] + $scores['Question 4'][$hotel['id']] + $scores['Question 5'][$hotel['id']])/5);

			}

			$this->data['scores'] = $scores;
			$this->load->view('con_mtd_question', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('con_mtd_question', $this->data);
		}
	}

	function con_ytd_lang($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		$this->load->model('languages_model');
		$this->data['languages'] = $this->languages_model->getall();

		if ($this->input->post('submit') || intval($year) >0) {

			$this->load->model('hotels_model');
			$this->data['hotels'] = $this->hotels_model->getall();

			$language_id = ($this->input->post('language'))? $this->input->post('language') : $language;

			$year = ($this->input->post('year'))? $this->input->post('year') : $year;

			$this->load->model('scores_model');
			$scores = array();

			for ($i=1; $i <=12 ; $i++) { 
				$from_date = $year."-".sprintf("%02d",$i)."-01 00:00:00";
				$to_date = $year."-".sprintf("%02d",$i)."-31 23:59:59";

				foreach ($this->data['hotels'] as $hotel) {
					$score = $this->scores_model->get_hotel_lang($language_id, $hotel['id'], $from_date, $to_date, $meal);

					$scores[$hotel['name']][$i] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}

			}

			foreach ($this->data['hotels'] as $hotel) {
				$from_date = $year."-01-01 00:00:00";
				$to_date = $year."-12-31 23:59:59";

				$score = $this->scores_model->get_hotel_lang($language_id, $hotel['id'], $from_date, $to_date, $meal);

				$scores[$hotel['name']][] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;//round(array_sum(array_filter($scores[$hotel['name']], "Reports::non_zero"))/count(array_filter($scores[$hotel['name']], "Reports::non_zero")));
			}

			$this->data['scores'] = $scores;
			$this->load->view('con_ytd_lang', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('con_ytd_lang', $this->data);
		}
	}

	function con_ytd($meal) {

		$this->load->model('meals_model');
		$this->data['meal'] = $this->meals_model->get_meal_name($meal);

		$this->load->helper('form');

		if ($this->input->post('submit') || intval($year) >0) {

			$this->load->model('hotels_model');
			$this->data['hotels'] = $this->hotels_model->getall();
			$year = ($this->input->post('year'))? $this->input->post('year') : $year;

			$this->load->model('scores_model');
			$scores = array();

			for ($i=1; $i <=12 ; $i++) { 
				$from_date = $year."-".sprintf("%02d",$i)."-01 00:00:00";
				$to_date = $year."-".sprintf("%02d",$i)."-31 23:59:59";

				foreach ($this->data['hotels'] as $hotel) {
					$score = $this->scores_model->get_hotel($hotel['id'], $from_date, $to_date, $meal);

					$scores[$hotel['name']][$i] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;
				}

			}

			foreach ($this->data['hotels'] as $hotel) {
				$from_date = $year."-01-01 00:00:00";
				$to_date = $year."-12-31 23:59:59";

				$score = $this->scores_model->get_hotel($hotel['id'], $from_date, $to_date, $meal);

				$scores[$hotel['name']][] = ($score[0]['score'] > 0)? round((abs($score[0]['score'] - 6))/5, 2)*100 : 0;//round(array_sum(array_filter($scores[$hotel['name']], "Reports::non_zero"))/count(array_filter($scores[$hotel['name']], "Reports::non_zero")));
			}

			$this->data['scores'] = $scores;
			$this->load->view('con_ytd', $this->data);
		} else {
			$this->data['posting'] = "nopost";
			$this->load->view('con_ytd', $this->data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
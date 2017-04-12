<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	private $crud;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Grocery_CRUD');
		$this->crud = new Grocery_CRUD();

		$this->load->library('Tank_auth');
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login');
		} elseif (!$this->tank_auth->is_admin()) {
			redirect('/');
		} else {
			$this->data['user_id'] = $this->tank_auth->get_user_id();
			$this->data['username'] = $this->tank_auth->get_username();
			$this->data['is_admin'] = $this->tank_auth->is_admin();
		}
		// $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		
	}
	
	public function index() {
		try {
			
			$this->crud->set_theme('datatables');
			$this->crud->set_table('users');
			$this->crud->set_relation_n_n('id_alias', 'users_restaurants', 'restaurants', 'user_id', 'restaurant_id', 'name');

			$this->crud->set_relation_n_n('hotel_relation_id', 'users_hotels', 'hotels', 'user_id', 'hotel_id', 'name');

			
			$this->crud->fields(array('hotel_relation_id', 'id_alias', 'username', 'password', 'email', 'real_name', 'banned', 'admin'));

			$this->crud->display_as('id_alias', 'Restaurants');
			$this->crud->display_as('hotel_relation_id', 'Hotels');
			$this->crud->display_as('banned', 'deny access');

			$this->crud->columns('username', 'email', 'real_name', 'hotel_relation_id', 'id_alias', 'banned', 'admin');

			// $this->crud->set_field_upload('signature','assets/uploads/signatures');
			
			$this->crud->callback_before_insert(array($this,'users_callback'));
			$this->crud->callback_before_update(array($this,'users_callback'));

			$this->crud->callback_after_insert(array($this,'id_alias_fix_callback'));

			$this->crud->change_field_type('password','password');

			$this->crud->callback_edit_field('password',array($this,'edit_password_callback'));
			
			$output = $this->crud->render();
			$this->load->view('backend', $output);
		}
		catch( Exception $e) {
			show_error($e->getMessage()." _ ". $e->getTraceAsString());
		}
	}

	function edit_password_callback() {
		return '<input id="field-password" name="password" type="password" value="" maxlength="255">';
	}

	function id_alias_fix_callback() {
		$query = $this->db->query("UPDATE users SET id_alias = id, hotel_relation_id = id");
	}
	
	function users_callback($post_array) {
		$password = $post_array['password'];
		if (strlen($password) > 0 ) {
			$this->load->library('phpass-0.1/PasswordHash');
			$hasher = new PasswordHash();
			$post_array['password'] = $hasher->HashPassword($password);
		} else {
			unset($post_array['password']);
		}

		return $post_array;
	}
	
	public function restaurants() {
		try {
			
			$this->crud->fields(array('name', 'hotel_id'));
			$this->crud->set_theme('datatables');
			$this->crud->set_table('restaurants');
			$this->crud->columns('id', 'name', 'hotel_id');
			$this->crud->set_relation('hotel_id', 'hotels', 'name');
			$output = $this->crud->render();
			$this->load->view('backend', $output);
		}
		catch( Exception $e) {
			show_error($e->getMessage()." _ ". $e->getTraceAsString());
		}
	}

	public function daily() {
		try {
			
			$this->crud->fields(array('email', 'hotel_id'));
			$this->crud->set_theme('datatables');
			$this->crud->set_table('daily_mails');
			$this->crud->columns('email', 'hotel_id');
			$this->crud->set_relation('hotel_id', 'hotels', 'name');
			$output = $this->crud->render();
			$this->load->view('backend', $output);
		}
		catch( Exception $e) {
			show_error($e->getMessage()." _ ". $e->getTraceAsString());
		}
	}

	public function notify() {
		try {
			
			$this->crud->fields(array('email', 'hotel_id'));
			$this->crud->set_theme('datatables');
			$this->crud->set_table('notificants');
			$this->crud->columns('email', 'hotel_id');
			$this->crud->set_relation('hotel_id', 'hotels', 'name');
			$output = $this->crud->render();
			$this->load->view('backend', $output);
		}
		catch( Exception $e) {
			show_error($e->getMessage()." _ ". $e->getTraceAsString());
		}
	}

	public function hotels() {
		try {
			
			$this->crud->fields(array('name', 'logo'));
			$this->crud->set_theme('datatables');
			$this->crud->set_table('hotels');
			$this->crud->columns('id', 'name', 'logo');

			$this->crud->set_field_upload('logo','assets/uploads/logos');

			$output = $this->crud->render();
			$this->load->view('backend', $output);
		}
		catch( Exception $e) {
			show_error($e->getMessage()." _ ". $e->getTraceAsString());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

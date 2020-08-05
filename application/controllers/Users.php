<?php


class Users extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['form', 'url']);
		$this->load->model('User_model');
		
	}
	
	
	public function index() {
		redirect('/users/login', 'refresh');
	}

	
	public function login() {
		$data = [];

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('email', 'E-mail', array('required', 'valid_email'));
			$this->form_validation->set_rules('password', 'Password', array('required', 'min_length[6]'));
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('login');
				$this->load->view('templates/footer');
				return;
			}

			$res = $this->User_model->get_user();
			if($res){
				if(!password_verify($this->input->post('password'), $res->password)) {
					$data['wrong_cardentials'] = 'Email or password is not correct';
					$this->load->view('templates/header', $data);
					$this->load->view('login');
					$this->load->view('templates/footer');
					return;
				}
			} else {
				$data['wrong_cardentials'] = 'Email or password is not correct';
				$this->load->view('templates/header', $data);
				$this->load->view('login');
				$this->load->view('templates/footer');
				return;
			}

			$user = [
				'user_id' => $res->id,
				'firstname' => $res->firstname,
				'lastname' => $res->lastname,
				'email' => $res->email,
			];

			$this->User_model->set_user_session($user);

			 
			redirect('/home', 'refresh');
			return;

		}
		else {
			if($this->session->logged_in) {
				redirect('/home', 'refresh');
				return;
			}
			$this->load->view('templates/header', $data);
			$this->load->view('login');
			$this->load->view('templates/footer');
		} 
	}


	public function register() { 
		$data = [];
		if($this->input->server('REQUEST_METHOD') === 'POST') {
			
			$this->User_model->registration_rules();
			
			if ($this->form_validation->run() == FALSE) { 
				$this->load->view('templates/header', $data);
				$this->load->view('register');
				$this->load->view('templates/footer');
				return;
			}
			$this->User_model->add_user();
			$res = $this->User_model->get_user();

			$user = [
				'user_id' => $res->id,
				'firstname' => $res->firstname,
				'lastname' => $res->lastname,
				'email' => $res->email,
			];

			$this->User_model->set_user_session($user);

			redirect('/home', 'refresh');
		}
		else {
			if($this->session->logged_in) {
				redirect('/home', 'refresh');
				return;
			}
			$this->load->view('templates/header', $data);
			$this->load->view('register');
			$this->load->view('templates/footer');
		}

		
	}
	

	public function logout() {
		session_destroy();
		redirect('/users', 'refresh');
	}
}



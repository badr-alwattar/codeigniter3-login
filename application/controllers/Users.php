<?php


class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['form', 'url']);
		// $this->load->model('Login_model','login');
 	}

	public function index()
	{
		// $data = array( 
		// 	'role_id' => 1, 
		// 	'name' => 'Badr',
		//  );
		 
		// insert
		// $this->db->insert("stud", $data);

		// update
		// $this->db->set($data); 
		// $this->db->where("id", 3); 
		// $this->db->update("stud", $data);
		 
		// delete
		// $this->db->delete("stud", "id = 4");
		// $query = $this->db->get("stud"); 
		// $data['records'] = $query->result();

		// print_r($data['records']);
		// $this->load->view('login');

		// helper(['form']);

		$data = [];
		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('email', 'E-mail', array('required', 'valid_email')); // |valid_email|callback_email_check
			$this->form_validation->set_rules('password', 'Password', array('required', 'min_length[6]'));

			if ($this->form_validation->run() == FALSE) { 
				$this->load->view('templates/header', $data);
				$this->load->view('login');
				$this->load->view('templates/footer');
				return;
			}

			// $this->db->select('firstname, lastname, email');
			// $this->db->from('users');
			// $query = $this->db->where('email', $this->input->post('email'));
			$query = $this->db->get('users');
			$res= '';
			foreach ($query->result() as $row) {
				if($row->email === $this->input->post('email')) {
					$res = $row;
					break;	
				}
			}
			if(!password_verify($this->input->post('password'), $res->password)) {
				$data['wrong_cardentials'] = 'Email or password is not correct';
				$this->load->view('templates/header', $data);
				$this->load->view('login');
				$this->load->view('templates/footer');
				return;
			}
			$this->session->firstname = $res->firstname;
			$this->session->lastname = $res->lastname;
			$this->session->email = $res->email;
			$this->session->logged_in = TRUE;
			 
			redirect('/dashboard', 'refresh');
			// $this->load->view('templates/header', $data);
			// $this->load->view('dashboard');
			// $this->load->view('templates/footer');
			// var_dump($this->session->userdata());
			return;

		}	
		$this->load->view('templates/header', $data);
		$this->load->view('login');
		$this->load->view('templates/footer');
	}


	public function register() { 
		$data = [];
		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('firstname', 'Firstname', array('required'));
			$this->form_validation->set_rules('lastname', 'Lastname', array('required'));
			$this->form_validation->set_rules('email', 'E-mail', array('required', 'valid_email','is_unique[users.email]')); // |valid_email|callback_email_check
			$this->form_validation->set_rules('password', 'Password', array('required', 'min_length[6]'));
			$this->form_validation->set_rules('password_confirm', 'Password_Confirm', array('required', 'matches[password]'));

			if ($this->form_validation->run() == FALSE) { 
				$this->load->view('templates/header', $data);
				$this->load->view('register');
				$this->load->view('templates/footer');
				return;
			}

			$cardential = [
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];

			$this->db->insert('users',$cardential);
			$this->session->firstname = $this->input->post('firstname');
			$this->session->lastname = $this->input->post('lastname');
			$this->session->email = $this->input->post('email');
			$this->session->logged_in = TRUE;
			redirect('/dashboard', 'refresh');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('register');
		$this->load->view('templates/footer');
	}
	
	public function logout() {
		session_destroy();
		redirect('/users', 'refresh');
	}
}



<?php


class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['form', 'url']);
		$this->load->model('User_model');
 	}

	public function index() {
        $data = [];
		if($this->session->logged_in && $this->User_model->isAdmin($this->session->user_id)) {
            $data['users'] = $this->User_model->get_all_users();
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/index');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');
    }

    public function edit($id) {
        $data = [];
		if($this->session->logged_in && $this->User_model->isAdmin($this->session->user_id)) {
            $data['user'] = $this->User_model->get_user_by_id($id);
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/edit');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');

    }

    public function update($id) {
        $data = [];
        if($this->input->server('REQUEST_METHOD') === 'POST' && $this->User_model->isAdmin($this->session->user_id)) {
			
			$this->User_model->update_rules();

			if ($this->form_validation->run() == FALSE) {
                redirect('/dashboard', 'refresh');
				return;
            }
            
            
        
			$this->User_model->update_user($id);

			redirect('/dashboard', 'refresh');
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


    public function delete($id) {
        $data = [];
        if($this->input->server('REQUEST_METHOD') === 'GET' && $this->User_model->isAdmin($this->session->user_id)) {
			$this->User_model->delete_user($id);
			redirect('/dashboard', 'refresh');
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
    
    
}



<?php


class Categories extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['form', 'url']);
		$this->load->model(['User_model', 'Category_model']);
	}
	 
	public function index() {
		if($this->session->logged_in) {
            $data['categories'] = $this->Category_model->get_all_categories();
            $this->load->view('templates/header', $data);
            $this->load->view('categories/index');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');
	}

	 public function create() {
		$data = [];
		if($this->session->logged_in) {
            $this->load->view('templates/header', $data);
            $this->load->view('categories/create');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');
	}

	public function store() {
		$data = [];
		if($this->input->server('REQUEST_METHOD') === 'POST') {
			// add validation
			$this->Category_model->add_rules();
			
			if ($this->form_validation->run() == FALSE) { 
				$this->load->view('templates/header', $data);
				$this->load->view('categories/create');
				$this->load->view('templates/footer');
				return;
			}
			// add function
			$this->Category_model->add_category();

			redirect('/categories', 'refresh');
		}
		else {
			redirect('/home', 'refresh');
		}
	}    
    
}



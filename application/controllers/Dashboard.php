<?php


class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['form', 'url']);
		// $this->load->model('Login_model','login');
 	}

	public function index()
	{
        $data = [];
		if($this->session->logged_in) {
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');
	}
}



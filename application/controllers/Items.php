<?php


class Items extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(['form_validation', 'session']);
		$this->load->helper(['form', 'url']);
		$this->load->model(['Category_model', 'User_model', 'Item_model']);
 	}

	public function index() {
        $data = [];
		if($this->session->logged_in) {
            $data['items'] = $this->Item_model->get_all_items_categories();
            $this->load->view('templates/header', $data);
            $this->load->view('items/index');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');
    }

    public function create() {
		if($this->session->logged_in) {
            $data['categories'] = $this->Category_model->get_all_categories();
            $this->load->view('templates/header', $data);
            $this->load->view('items/create');
            $this->load->view('templates/footer');
            return;
        }

        redirect('/users', 'refresh');
        
    }
    
    public function store() {
		$data = [];
		if($this->input->server('REQUEST_METHOD') === 'POST') {
			// add validation
			$this->Item_model->add_rules();
			
			if ($this->form_validation->run() == FALSE) { 
                redirect('/items/create', 'refresh');
				return;
			}
            // add function
			$this->Item_model->add_item();
            redirect('/items', 'refresh');
		}
		else {
			redirect('/home', 'refresh');
		}
    } 
    

   

    


    
    
    
}



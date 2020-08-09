<?php

class Item_model extends CI_Model {

    public $arabicName;
    public $englishName;
    public $price;
    public $category_id;
    public $image;


    public function add_rules() {
        $this->form_validation->set_rules('arabicName', 'arabicName', array('required'));
        $this->form_validation->set_rules('englishName', 'englishName', array('required'));
        $this->form_validation->set_rules('price', 'price', array('required','numeric', 'greater_than[0]'));
        $this->form_validation->set_rules('category', 'category', array('required'));
    }

    public function add_item() {
        $this->arabicName = $this->input->post('arabicName');
        $this->englishName  = $this->input->post('englishName');
        $this->price  = $this->input->post('price');
        $this->category_id  = $this->input->post('category');
        $this->image  = '/images/test.jpg';
        // $this->image_upload();
        $this->db->insert('items', $this);
    }

    private function image_upload() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = '*';
        $config['file_name'] = 'filename';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload()) {

            // redirect('/items', 'refresh');
            $data = array('upload_data' => $this->upload->data());
            print_r($data);
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }

    public function get_all_items_categories() {
        $this->db->select('*');    
        $this->db->from('items');
        $this->db->join('categories', 'items.category_id = categories.id');
        $query = $this->db->get();
        
        return $query->result();
    }
        
}



?>
<?php

class Category_model extends CI_Model {

    public $arabicCategory;
    public $englishCategory;

        
    public function add_rules() {
        $this->form_validation->set_rules('arabicName', 'arabicName', array('required'));
        $this->form_validation->set_rules('englishName', 'englishName', array('required'));
    }

    public function add_category() {
        $this->arabicCategory = $this->input->post('arabicName');
        $this->englishCategory  = $this->input->post('englishName');
        
        $this->db->insert('categories', ['arabicCategory' => $this->arabicCategory, 'englishCategory' => $this->englishCategory]);
    }

    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->result();
}
        
}



?>
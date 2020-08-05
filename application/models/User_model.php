<?php

class User_model extends CI_Model {

        public $user_id;
        public $firstname;
        public $lastname;
        public $email;
        public $password;


        public function add_user() {
                $this->firstname = $this->input->post('firstname');
                $this->lastname  = $this->input->post('lastname');
                $this->email     = $this->input->post('email');
                $this->password  = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                $this->db->insert('users', ['firstname' => $this->firstname, 'lastname' => $this->lastname, 'email' => $this->email, 'password' => $this->password]);
        }

        public function set_user_session($user) {
                $this->session->user_id = $user['user_id'];
                $this->session->firstname = $user['firstname'];
                $this->session->lastname = $user['lastname'];
                $this->session->email = $user['email'];
                $this->session->logged_in = TRUE;
        }

        public function registration_rules() {
                $this->form_validation->set_rules('firstname', 'Firstname', array('required'));
                $this->form_validation->set_rules('lastname', 'Lastname', array('required'));
                $this->form_validation->set_rules('email', 'E-mail', array('required', 'valid_email','is_unique[users.email]')); 
                $this->form_validation->set_rules('password', 'Password', array('required', 'min_length[6]'));
                $this->form_validation->set_rules('password_confirm', 'Password_Confirm', array('required', 'matches[password]'));
        }

        public function get_all_users() {
                $query = $this->db->get('users');
                return $query->result();
        }

        public function get_user() {
                $query = $this->db->get('users');
                $res= '';
                foreach ($query->result() as $row) {
                        if($row->email === $this->input->post('email')) {
                                $res = $row;
                                break;	
                        }
                }
                return $res;
        }

        public function get_user_by_id($id) {
                $query = $this->db->get('users');
                $res= '';
                foreach ($query->result() as $row) {
                        if($row->id === $id) {
                                $res = $row;
                                break;	
                        }
                }
                return $res;
        }

        

        public function isAdmin($id) {
                $query = $this->db->get('users');
                $res= '';
                foreach ($query->result() as $row) {
                        if($row->id === $id) {
                                $res = $row;
                                break;	
                        }
                }
                return $res->isAdmin;
        }

        public function update_rules() {
                $this->form_validation->set_rules('firstname', 'Firstname', array('required'));
                $this->form_validation->set_rules('lastname', 'Lastname', array('required'));
                $this->form_validation->set_rules('email', 'E-mail', array('required', 'valid_email'));
        }



        public function update_user($id) {
                $this->firstname = $this->input->post('firstname');
                $this->lastname  = $this->input->post('lastname');
                $this->email     = $this->input->post('email');
                $this->db->update('users', ['firstname' => $this->firstname, 'lastname' => $this->lastname, 'email' => $this->email], array('id' => $id));
        }

        public function delete_user($id) {
                $this->db->delete('users', array('id' => $id)); 
        }
        
}



?>
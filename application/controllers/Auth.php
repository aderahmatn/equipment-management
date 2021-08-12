<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function Login()
    {
        check_already_login();
        $this->load->view('auth/login');
    }
    public function reset()
    {
        check_already_login();
        $this->load->view('auth/reset');
    }
    public function process_login()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->user_model->login($post);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $params = array(
                'id_user' => $row->id_master_create_user,
                'nik' => $row->nik,
                'nama_user' => $row->full_name,
                'email' => $row->email,
                'position' => $row->position,
                'division' => $row->division,
                'picture' => $row->picture,
                'status' => 'login',
            );
            $this->session->set_userdata($params);
            redirect('dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'NIK or Password did not match');
            redirect('auth/login', 'refresh');
        }
    }
    public function process_reset()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->user_model->reset($post);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $params = array(
                'id_user' => $row->id_master_create_user,
            );
            $this->session->set_userdata($params);
            $this->load->view('auth/reset_password');
        } else {
            $this->session->set_flashdata('error', 'Your information did not macth');
            redirect('auth/reset', 'refresh');
        }
    }
    public function sign_out()
    {
        $params = array(
            'id_user',
            'nik',
            'nama_user',
            'email',
            'position',
            'division',
            'picture',
            'status',
        );
        $this->session->unset_userdata($params);
        redirect('auth/login', 'refresh');
    }
    public function update_password()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules_update_password());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->user_model->update_password($post);
            if ($this->db->affected_rows() > 0) {
                $params = array('id_user');
                $this->session->unset_userdata($params);
                $this->session->set_flashdata('success', 'Update Password Successfully');
                redirect('auth/login', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Nothing Updated');
                redirect('auth/login', 'refresh');
            }
        }
        $this->load->view('auth/reset_password');
    }
}

/* End of file Auth.php */

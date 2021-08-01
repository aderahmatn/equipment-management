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
}

/* End of file Auth.php */

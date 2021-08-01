<?php
class Main_proces extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Main_proces_model');
    }

    public function index()
    {
        $data['main_process'] = $this->Main_proces_model->get_all();
        $this->template->load('layouts/index', 'main_proces/index', $data);
    }
    public function add()
    {
        $main_process  = $this->Main_proces_model;
        $validation = $this->form_validation;
        $validation->set_rules($main_process->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('layouts/index', 'main_proces/add');
        } else {
            $post = $this->input->post(null, TRUE);
            $main_process->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Insert Data Successfully');
                redirect('main_proces', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('main_process');
        $main_process = $this->Main_proces_model;
        $validation = $this->form_validation;
        $validation->set_rules($main_process->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->Main_proces_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Update Data Successfully');
                redirect('main_proces', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Nothing Updated');
                redirect('main_proces', 'refresh');
            }
        }
        $data['main_process'] = $this->Main_proces_model->get_by_id($id);
        if (!$data['main_process']) {
            $this->session->set_flashdata('error', 'Data Not Found');
            redirect('main_proces', 'refresh');
        }
        $this->template->load('layouts/index', 'main_proces/edit', $data);
    }
    public function remove($id)
    {
        $this->Main_proces_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Delete Data Successfully');
            redirect('main_proces', 'refresh');
        }
    }
}

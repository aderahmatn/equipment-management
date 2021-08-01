<?php


class Occurence extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Occurence_model');
    }
    public function index()
    {
        $data['occurence'] = $this->Occurence_model->get_all();
        $this->template->load('layouts/index', 'occurence/index', $data);
    }
    public function add()
    {
        $occurence  = $this->Occurence_model;
        $validation = $this->form_validation;
        $validation->set_rules($occurence->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('layouts/index', 'occurence/add');
        } else {
            $post = $this->input->post(null, TRUE);
            $occurence->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Insert Data Successfully');
                redirect('occurence', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('occurence');
        $occurence = $this->Occurence_model;
        $validation = $this->form_validation;
        $validation->set_rules($occurence->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->Occurence_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Update Data Successfully');
                redirect('occurence', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Nothing Updated');
                redirect('occurence', 'refresh');
            }
        }
        $data['occ'] = $this->Occurence_model->get_by_id($id);
        if (!$data['occ']) {
            $this->session->set_flashdata('error', 'Data Occurence Not Found');
            redirect('occurence', 'refresh');
        }
        $this->template->load('layouts/index', 'occurence/edit', $data);
    }
    public function remove($id)
    {
        $this->Occurence_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Delete Data Successfully');
            redirect('occurence', 'refresh');
        }
    }
}

<?php


class Severity extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Severity_model');
    }

    public function index()
    {
        $data['severity'] = $this->Severity_model->get_all();
        $this->template->load('layouts/index', 'severity/index', $data);
    }
    public function add()
    {
        $severity  = $this->Severity_model;
        $validation = $this->form_validation;
        $validation->set_rules($severity->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('layouts/index', 'severity/add');
        } else {
            $post = $this->input->post(null, TRUE);
            $severity->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Insert Data Successfully');
                redirect('severity', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('severity');
        $severity = $this->Severity_model;
        $validation = $this->form_validation;
        $validation->set_rules($severity->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->Severity_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Update Data Successfully');
                redirect('severity', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Nothing Updated');
                redirect('severity', 'refresh');
            }
        }
        $data['severity'] = $this->Severity_model->get_by_id($id);
        if (!$data['severity']) {
            $this->session->set_flashdata('error', 'Data Severity Not Found');
            redirect('severity', 'refresh');
        }
        $this->template->load('layouts/index', 'severity/edit', $data);
    }
    public function remove($id)
    {
        $this->Severity_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Delete Data Successfully');
            redirect('severity', 'refresh');
        }
    }
}

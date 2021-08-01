<?php


class Detection extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Detection_model');
    }
    public function index()
    {
        $data['detection'] = $this->Detection_model->get_all();
        $this->template->load('layouts/index', 'detection/index', $data);
    }
    public function add()
    {
        $detection  = $this->Detection_model;
        $validation = $this->form_validation;
        $validation->set_rules($detection->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('layouts/index', 'detection/add');
        } else {
            $post = $this->input->post(null, TRUE);
            $detection->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Insert Data Successfully');
                redirect('detection', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('detection');
        $detection = $this->Detection_model;
        $validation = $this->form_validation;
        $validation->set_rules($detection->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->Detection_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Update Data Successfully');
                redirect('detection', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Nothing Updated');
                redirect('detection', 'refresh');
            }
        }
        $data['detection'] = $this->Detection_model->get_by_id($id);
        if (!$data['detection']) {
            $this->session->set_flashdata('error', 'Data Not Found');
            redirect('detection', 'refresh');
        }
        $this->template->load('layouts/index', 'detection/edit', $data);
    }
    public function remove($id)
    {
        $this->Detection_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Delete Data Successfully');
            redirect('detection', 'refresh');
        }
    }
}

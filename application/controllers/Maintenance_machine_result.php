<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance_machine_result extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Maintenance_machine_model');
        $this->load->model('Main_proces_model');
        $this->load->model('Equipment_model');
        $this->load->model('Main_proces_model');
        $this->load->model('Severity_model');
        $this->load->model('Occurence_model');
        $this->load->model('Detection_model');
    }

    public function index()
    {
        $data['maintenance_machine'] = $this->Maintenance_machine_model->get_all();
        $this->template->load('layouts/index', 'maintenance_machine_result/index', $data);
    }
    public function submit($id)
    {
        $data['maintenance_machine'] = $this->Maintenance_machine_model->get_by_id($id);
        $this->template->load('layouts/index', 'maintenance_machine_result/submit', $data);
    }
    public function res()
    {
        $post = $this->input->post(null, TRUE);
        $this->Maintenance_machine_model->update_status($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Submit Result Successfully');
            redirect('maintenance_machine_result', 'refresh');
        } else {
            $this->session->set_flashdata('warning', 'Nothing Updated');
            redirect('maintenance_machine_result', 'refresh');
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('transaction_main_process');
        $maintenance_machine = $this->Maintenance_machine_model;
        $validation = $this->form_validation;
        $validation->set_rules($maintenance_machine->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->Maintenance_machine_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Update Data Successfully');
                redirect('maintenance_machine', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Nothing Updated');
                redirect('maintenance_machine', 'refresh');
            }
        }
        $data['data'] = $this->Maintenance_machine_model->get_by_id($id);
        if (!$data['data']) {
            $this->session->set_flashdata('error', 'Data Not Found');
            redirect('maintenance_machine', 'refresh');
        }
        $data['equipment'] = $this->Equipment_model->get_all_equipment();
        $data['occurence'] = $this->Occurence_model->get_all();
        $data['severity'] = $this->Severity_model->get_all();
        $data['detection'] = $this->Detection_model->get_all();
        $data['main_process'] = $this->Main_proces_model->get_all();
        $data['maintenance_machine'] = $this->Maintenance_machine_model->get_all();
        $this->template->load('layouts/index', 'maintenance_machine/edit', $data);
    }
    public function remove($id)
    {
        $this->Maintenance_machine_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Delete Data Successfully');
            redirect('maintenance_machine', 'refresh');
        }
    }
    public function get_equipment()
    {
        $id = $this->input->post('id');
        $data = $this->Equipment_model->get_equipment($id);
        echo json_encode($data);
    }
    public function get_main_process()
    {
        $id = $this->input->post('id');
        $data = $this->Main_proces_model->get_by_id($id);
        echo json_encode($data);
    }
}

/* End of file Transaction_main_proces.php */

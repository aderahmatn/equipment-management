<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_main_process extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Transaction_main_process_model');
        $this->load->model('Main_proces_model');
        $this->load->model('Equipment_model');
        $this->load->model('Main_proces_model');
    }

    public function index()
    {
        $data['transaction_main_process'] = $this->Transaction_main_process_model->get_all();
        $this->template->load('layouts/index', 'transaction_main_process/index', $data);
    }
    public function add()
    {
        $transaction_main_process  = $this->Transaction_main_process_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaction_main_process->rules());
        if ($validation->run() == FALSE) {
            $data['equipment'] = $this->Equipment_model->get_all_equipment();
            $data['main_process'] = $this->Main_proces_model->get_all();
            $this->template->load('layouts/index', 'transaction_main_process/add', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $transaction_main_process->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('transaction_main_process', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('severity');
        $severity = $this->Transaction_main_process_model;
        $validation = $this->form_validation;
        $validation->set_rules($severity->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->Transaction_main_process_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Dara severity berhasil Diupdate!');
                redirect('severity', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Data Tidak Diupdate!');
                redirect('severity', 'refresh');
            }
        }
        $data['severity'] = $this->Transaction_main_process_model->get_by_id($id);
        if (!$data['severity']) {
            $this->session->set_flashdata('error', 'Data severity Tidak ditemukan!');
            redirect('severity', 'refresh');
        }
        $this->template->load('layouts/index', 'severity/edit', $data);
    }
    public function remove($id)
    {
        $this->Transaction_main_process_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
            redirect('severity', 'refresh');
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

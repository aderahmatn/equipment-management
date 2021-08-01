<?php

class Equipment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Equipment_model');
    }

    /*
     * Listing of equipment
     */
    function index()
    {
        $data['equipment'] = $this->Equipment_model->get_all_equipment();

        $this->template->load('layouts/index', 'equipment/index', $data);
    }

    /*
     * Adding a new equipment
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('machine_code', 'machine code', 'required|is_unique[em_master_equipment.machine_code]');
        $this->form_validation->set_rules('equipment_name', 'equipment name', 'required');
        $this->form_validation->set_rules('machine_purchase_date', 'machine purchase date', 'required');
        $this->form_validation->set_rules('machine_enter_line', 'machine enter line', 'required');
        $this->form_validation->set_rules('line', 'line', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'machine_code' => $this->input->post('machine_code'),
                'equipment_name' => $this->input->post('equipment_name'),
                'machine_purchase_date' => $this->input->post('machine_purchase_date'),
                'machine_enter_line' => $this->input->post('machine_enter_line'),
                'line' => $this->input->post('line'),
                'qty' => $this->input->post('qty'),
                'created_date' => date('Y-m-d'),
            );

            $equipment_id = $this->Equipment_model->add_equipment($params);
            redirect('equipment', 'refresh');
        } else {
            $this->template->load('layouts/index', 'equipment/add');
        }
    }

    /*
     * Editing a equipment
     */
    function edit($id_master_equipment)
    {
        // check if the equipment exists before trying to edit it
        $data['equipment'] = $this->Equipment_model->get_equipment($id_master_equipment);

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'machine_code',
            'machine code',
            'required'
        );
        $this->form_validation->set_rules('equipment_name', 'equipment name', 'required');
        $this->form_validation->set_rules('machine_purchase_date', 'machine purchase date', 'required');
        $this->form_validation->set_rules('machine_enter_line', 'machine enter line', 'required');
        $this->form_validation->set_rules('line', 'line', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if (isset($data['equipment']['id_master_equipment'])) {
            if ($this->form_validation->run()) {
                $params = array(
                    'machine_code' => $this->input->post('machine_code'),
                    'equipment_name' => $this->input->post('equipment_name'),
                    'machine_purchase_date' => $this->input->post('machine_purchase_date'),
                    'machine_enter_line' => $this->input->post('machine_enter_line'),
                    'line' => $this->input->post('line'),
                    'qty' => $this->input->post('qty'),
                    'created_date' => $this->input->post('created_date'),
                );

                $this->Equipment_model->update_equipment($id_master_equipment, $params);
                $this->session->set_flashdata('success', 'Update Data Successfully');
                redirect('equipment', 'refresh');
            } else {
                $this->template->load('layouts/index', 'equipment/edit', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Data Not Found');

            redirect('equipment', 'refresh');
        }
    }

    /*
     * Deleting equipment
     */
    function remove($id_master_equipment)
    {
        $equipment = $this->Equipment_model->get_equipment($id_master_equipment);

        // check if the equipment exists before trying to delete it
        if (isset($equipment['id_master_equipment'])) {
            $this->Equipment_model->delete_equipment($id_master_equipment);
            redirect('equipment', 'refresh');
        } else
            show_error('The equipment you are trying to delete does not exist.');
    }
}

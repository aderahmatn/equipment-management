<?php


class Maintenance_machine extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Maintenance_machine_model');
    }

    /*
     * Listing of maintenance_machine
     */
    function index()
    {
        $data['maintenance_machine'] = $this->Maintenance_machine_model->get_all_maintenance_machine();

        $data['_view'] = 'maintenance_machine/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new maintenance_machine
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_master_equipment' => $this->input->post('id_master_equipment'),
                'id_master_occurence' => $this->input->post('id_master_occurence'),
                'id_master_severity' => $this->input->post('id_master_severity'),
                'id_master_detection' => $this->input->post('id_master_detection'),
                'frpn_value' => $this->input->post('frpn_value'),
                'fmea_type' => $this->input->post('fmea_type'),
                'date_maintenance_machine' => $this->input->post('date_maintenance_machine'),
            );

            $maintenance_machine_id = $this->Maintenance_machine_model->add_maintenance_machine($params);
            redirect('maintenance_machine/index');
        } else {
            $data['_view'] = 'maintenance_machine/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a maintenance_machine
     */
    function edit($id_transaction_maintenance_machine)
    {
        // check if the maintenance_machine exists before trying to edit it
        $data['maintenance_machine'] = $this->Maintenance_machine_model->get_maintenance_machine($id_transaction_maintenance_machine);

        if (isset($data['maintenance_machine']['id_transaction_maintenance_machine'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'id_master_equipment' => $this->input->post('id_master_equipment'),
                    'id_master_occurence' => $this->input->post('id_master_occurence'),
                    'id_master_severity' => $this->input->post('id_master_severity'),
                    'id_master_detection' => $this->input->post('id_master_detection'),
                    'frpn_value' => $this->input->post('frpn_value'),
                    'fmea_type' => $this->input->post('fmea_type'),
                    'date_maintenance_machine' => $this->input->post('date_maintenance_machine'),
                );

                $this->Maintenance_machine_model->update_maintenance_machine($id_transaction_maintenance_machine, $params);
                redirect('maintenance_machine/index');
            } else {
                $data['_view'] = 'maintenance_machine/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The maintenance_machine you are trying to edit does not exist.');
    }

    /*
     * Deleting maintenance_machine
     */
    function remove($id_transaction_maintenance_machine)
    {
        $maintenance_machine = $this->Maintenance_machine_model->get_maintenance_machine($id_transaction_maintenance_machine);

        // check if the maintenance_machine exists before trying to delete it
        if (isset($maintenance_machine['id_transaction_maintenance_machine'])) {
            $this->Maintenance_machine_model->delete_maintenance_machine($id_transaction_maintenance_machine);
            redirect('maintenance_machine/index');
        } else
            show_error('The maintenance_machine you are trying to delete does not exist.');
    }
}

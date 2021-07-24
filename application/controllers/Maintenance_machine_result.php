<?php


class Maintenance_machine_result extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Maintenance_machine_result_model');
    }

    /*
     * Listing of maintenance_machine_results
     */
    function index()
    {
        $data['maintenance_machine_results'] = $this->Maintenance_machine_result_model->get_all_maintenance_machine_results();

        $data['_view'] = 'maintenance_machine_result/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new maintenance_machine_result
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_master_equipment' => $this->input->post('id_master_equipment'),
                'machine_trouble' => $this->input->post('machine_trouble'),
                'fmea_type' => $this->input->post('fmea_type'),
                'date_maintenance_machine' => $this->input->post('date_maintenance_machine'),
                'machine_maintenance_status' => $this->input->post('machine_maintenance_status'),
            );

            $maintenance_machine_result_id = $this->Maintenance_machine_result_model->add_maintenance_machine_result($params);
            redirect('maintenance_machine_result/index');
        } else {
            $data['_view'] = 'maintenance_machine_result/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a maintenance_machine_result
     */
    function edit($id_transaction_maintenance_machine_results)
    {
        // check if the maintenance_machine_result exists before trying to edit it
        $data['maintenance_machine_result'] = $this->Maintenance_machine_result_model->get_maintenance_machine_result($id_transaction_maintenance_machine_results);

        if (isset($data['maintenance_machine_result']['id_transaction_maintenance_machine_results'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'id_master_equipment' => $this->input->post('id_master_equipment'),
                    'machine_trouble' => $this->input->post('machine_trouble'),
                    'fmea_type' => $this->input->post('fmea_type'),
                    'date_maintenance_machine' => $this->input->post('date_maintenance_machine'),
                    'machine_maintenance_status' => $this->input->post('machine_maintenance_status'),
                );

                $this->Maintenance_machine_result_model->update_maintenance_machine_result($id_transaction_maintenance_machine_results, $params);
                redirect('maintenance_machine_result/index');
            } else {
                $data['_view'] = 'maintenance_machine_result/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The maintenance_machine_result you are trying to edit does not exist.');
    }

    /*
     * Deleting maintenance_machine_result
     */
    function remove($id_transaction_maintenance_machine_results)
    {
        $maintenance_machine_result = $this->Maintenance_machine_result_model->get_maintenance_machine_result($id_transaction_maintenance_machine_results);

        // check if the maintenance_machine_result exists before trying to delete it
        if (isset($maintenance_machine_result['id_transaction_maintenance_machine_results'])) {
            $this->Maintenance_machine_result_model->delete_maintenance_machine_result($id_transaction_maintenance_machine_results);
            redirect('maintenance_machine_result/index');
        } else
            show_error('The maintenance_machine_result you are trying to delete does not exist.');
    }
}

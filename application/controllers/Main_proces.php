<?php


class Main_proces extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Main_proces_model');
    }

    /*
     * Listing of main_process
     */
    function index()
    {
        $data['main_process'] = $this->Main_proces_model->get_all_main_process();

        $data['_view'] = 'main_proces/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new main_proces
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_master_equipment' => $this->input->post('id_master_equipment'),
                'id_master_main_process' => $this->input->post('id_master_main_process'),
                'qty' => $this->input->post('qty'),
                'machine_trouble' => $this->input->post('machine_trouble'),
                'created_date' => $this->input->post('created_date'),
            );

            $main_proces_id = $this->Main_proces_model->add_main_proces($params);
            redirect('main_proces/index');
        } else {
            $data['_view'] = 'main_proces/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a main_proces
     */
    function edit($id_transaction_main_process)
    {
        // check if the main_proces exists before trying to edit it
        $data['main_proces'] = $this->Main_proces_model->get_main_proces($id_transaction_main_process);

        if (isset($data['main_proces']['id_transaction_main_process'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'id_master_equipment' => $this->input->post('id_master_equipment'),
                    'id_master_main_process' => $this->input->post('id_master_main_process'),
                    'qty' => $this->input->post('qty'),
                    'machine_trouble' => $this->input->post('machine_trouble'),
                    'created_date' => $this->input->post('created_date'),
                );

                $this->Main_proces_model->update_main_proces($id_transaction_main_process, $params);
                redirect('main_proces/index');
            } else {
                $data['_view'] = 'main_proces/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The main_proces you are trying to edit does not exist.');
    }

    /*
     * Deleting main_proces
     */
    function remove($id_transaction_main_process)
    {
        $main_proces = $this->Main_proces_model->get_main_proces($id_transaction_main_process);

        // check if the main_proces exists before trying to delete it
        if (isset($main_proces['id_transaction_main_process'])) {
            $this->Main_proces_model->delete_main_proces($id_transaction_main_process);
            redirect('main_proces/index');
        } else
            show_error('The main_proces you are trying to delete does not exist.');
    }
}

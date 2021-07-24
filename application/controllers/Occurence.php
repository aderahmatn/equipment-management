<?php


class Occurence extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Occurence_model');
    }

    /*
     * Listing of occurence
     */
    function index()
    {
        $data['occurence'] = $this->Occurence_model->get_all_occurence();

        $data['_view'] = 'occurence/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new occurence
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'occurrence_type' => $this->input->post('occurrence_type'),
                'pobability_of_damage' => $this->input->post('pobability_of_damage'),
                'occurence_value' => $this->input->post('occurence_value'),
                'rangkings' => $this->input->post('rangkings'),
            );

            $occurence_id = $this->Occurence_model->add_occurence($params);
            redirect('occurence/index');
        } else {
            $data['_view'] = 'occurence/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a occurence
     */
    function edit($id_master_occurence)
    {
        // check if the occurence exists before trying to edit it
        $data['occurence'] = $this->Occurence_model->get_occurence($id_master_occurence);

        if (isset($data['occurence']['id_master_occurence'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'occurrence_type' => $this->input->post('occurrence_type'),
                    'pobability_of_damage' => $this->input->post('pobability_of_damage'),
                    'occurence_value' => $this->input->post('occurence_value'),
                    'rangkings' => $this->input->post('rangkings'),
                );

                $this->Occurence_model->update_occurence($id_master_occurence, $params);
                redirect('occurence/index');
            } else {
                $data['_view'] = 'occurence/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The occurence you are trying to edit does not exist.');
    }

    /*
     * Deleting occurence
     */
    function remove($id_master_occurence)
    {
        $occurence = $this->Occurence_model->get_occurence($id_master_occurence);

        // check if the occurence exists before trying to delete it
        if (isset($occurence['id_master_occurence'])) {
            $this->Occurence_model->delete_occurence($id_master_occurence);
            redirect('occurence/index');
        } else
            show_error('The occurence you are trying to delete does not exist.');
    }
}

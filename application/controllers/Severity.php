<?php


class Severity extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Severity_model');
    }

    /*
     * Listing of severity
     */
    function index()
    {
        $data['severity'] = $this->Severity_model->get_all_severity();

        $data['_view'] = 'severity/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new severity
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'severity_type' => $this->input->post('severity_type'),
                'severity_effect' => $this->input->post('severity_effect'),
                'severity_value' => $this->input->post('severity_value'),
                'rankings' => $this->input->post('rankings'),
            );

            $severity_id = $this->Severity_model->add_severity($params);
            redirect('severity/index');
        } else {
            $data['_view'] = 'severity/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a severity
     */
    function edit($id_master_severity)
    {
        // check if the severity exists before trying to edit it
        $data['severity'] = $this->Severity_model->get_severity($id_master_severity);

        if (isset($data['severity']['id_master_severity'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'severity_type' => $this->input->post('severity_type'),
                    'severity_effect' => $this->input->post('severity_effect'),
                    'severity_value' => $this->input->post('severity_value'),
                    'rankings' => $this->input->post('rankings'),
                );

                $this->Severity_model->update_severity($id_master_severity, $params);
                redirect('severity/index');
            } else {
                $data['_view'] = 'severity/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The severity you are trying to edit does not exist.');
    }

    /*
     * Deleting severity
     */
    function remove($id_master_severity)
    {
        $severity = $this->Severity_model->get_severity($id_master_severity);

        // check if the severity exists before trying to delete it
        if (isset($severity['id_master_severity'])) {
            $this->Severity_model->delete_severity($id_master_severity);
            redirect('severity/index');
        } else
            show_error('The severity you are trying to delete does not exist.');
    }
}

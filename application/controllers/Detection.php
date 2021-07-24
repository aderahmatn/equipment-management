<?php


class Detection extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Detection_model');
    }

    /*
     * Listing of detection
     */
    function index()
    {
        $data['detection'] = $this->Detection_model->get_all_detection();

        $data['_view'] = 'detection/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new detection
     */
    function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'detection_type' => $this->input->post('detection_type'),
                'criteria' => $this->input->post('criteria'),
                'detection_value' => $this->input->post('detection_value'),
                'rankings' => $this->input->post('rankings'),
            );

            $detection_id = $this->Detection_model->add_detection($params);
            redirect('detection/index');
        } else {
            $data['_view'] = 'detection/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a detection
     */
    function edit($id_master_detection)
    {
        // check if the detection exists before trying to edit it
        $data['detection'] = $this->Detection_model->get_detection($id_master_detection);

        if (isset($data['detection']['id_master_detection'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'detection_type' => $this->input->post('detection_type'),
                    'criteria' => $this->input->post('criteria'),
                    'detection_value' => $this->input->post('detection_value'),
                    'rankings' => $this->input->post('rankings'),
                );

                $this->Detection_model->update_detection($id_master_detection, $params);
                redirect('detection/index');
            } else {
                $data['_view'] = 'detection/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The detection you are trying to edit does not exist.');
    }

    /*
     * Deleting detection
     */
    function remove($id_master_detection)
    {
        $detection = $this->Detection_model->get_detection($id_master_detection);

        // check if the detection exists before trying to delete it
        if (isset($detection['id_master_detection'])) {
            $this->Detection_model->delete_detection($id_master_detection);
            redirect('detection/index');
        } else
            show_error('The detection you are trying to delete does not exist.');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipment_model');
        $this->load->model('Report_model');
    }


    public function master_equipment()
    {
        $report = $this->Report_model;
        $validation = $this->form_validation;
        $validation->set_rules($report->rules_master_equipment());
        if ($validation->run() == FALSE) {
            $data['equipment'] = null;
            $this->template->load('layouts/index', 'report/master_equipment', $data);
        } else {
            $post = $this->input->post();
            $tgl1 = $post['start_date'];
            $tgl2 = $post['finish_date'];
            $sort = $post['sort_by'];
            $data['tgl1'] = $tgl1;
            $data['tgl2'] = $tgl2;
            $data['sort'] = $sort;
            $data['equipment'] = $this->Report_model->get_by_master_equipment($tgl1, $tgl2, $sort);
            $this->template->load('layouts/index', 'report/master_equipment', $data);
        }
    }
}

/* End of file Report.php */

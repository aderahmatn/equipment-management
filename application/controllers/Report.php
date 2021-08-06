<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipment_model');
        $this->load->model('Main_proces_model');
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
    public function transaction_main_process()
    {
        $report = $this->Report_model;
        $validation = $this->form_validation;
        $validation->set_rules($report->rules_main_process());
        if ($validation->run() == FALSE) {
            $data['equipment'] = null;
            $data['main_process'] = $this->Main_proces_model->get_all();
            $this->template->load('layouts/index', 'report/main_process', $data);
        } else {
            $post = $this->input->post();
            $mp = $post['id_master_main_process'];
            $data['mp'] = $mp;
            $data['main_process'] = $this->Main_proces_model->get_all();
            $data['equipment'] = $this->Report_model->get_by_main_process($mp);
            $this->template->load('layouts/index', 'report/main_process', $data);
        }
    }
    public function transaction_maintenance_machine()
    {
        $report = $this->Report_model;
        $validation = $this->form_validation;
        $validation->set_rules($report->rules_maintenance_machine());
        if ($validation->run() == FALSE) {
            $data['equipment'] = null;
            $this->template->load('layouts/index', 'report/maintenance_machine', $data);
        } else {
            $post = $this->input->post();
            $tgl1 = $post['start_date'];
            $tgl2 = $post['finish_date'];
            $data['tgl1'] = $tgl1;
            $data['tgl2'] = $tgl2;
            $data['equipment'] = $this->Report_model->get_by_maintenance_machine($tgl1, $tgl2);
            $this->template->load('layouts/index', 'report/maintenance_machine', $data);
        }
    }
    public function machine_shrinkage()
    {
        $report = $this->Report_model;
        $validation = $this->form_validation;
        $validation->set_rules($report->rules_machine_shrinkage());
        if ($validation->run() == FALSE) {
            $data['equipment'] = null;
            $data['eq'] = $this->Equipment_model->get_all_equipment();
            $this->template->load('layouts/index', 'report/machine_shrinkage', $data);
        } else {
            $post = $this->input->post();
            $equip = $post['id_master_equipment'];
            $data['equip'] = $equip;
            $data['equipment'] = $this->Report_model->get_by_machine_shrinkage($equip);
            $data['eq'] = $this->Equipment_model->get_all_equipment();
            $this->template->load('layouts/index', 'report/machine_shrinkage', $data);
        }
    }
}

/* End of file Report.php */

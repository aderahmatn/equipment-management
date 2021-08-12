<?php
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Equipment_model');
        $this->load->model('Machine_shrinkage_model');
        $this->load->model('Maintenance_machine_model');
    }


    function index()
    {
        $data['machine_out'] = $this->Machine_shrinkage_model->get_total();
        $data['equipment_entry'] = $this->Equipment_model->get_total();
        $data['machine_entry'] = $this->Equipment_model->get_data_entry_machine();
        $data['machine_out_chart'] = $this->Machine_shrinkage_model->get_data_out_machine();
        $data['already_maintenance'] = $this->Maintenance_machine_model->get_already_maintenance();
        $data['not_yet_maintenance'] = $this->Maintenance_machine_model->get_not_yet_maintenance();
        $this->template->load('layouts/index', 'dashboard/index', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
    }


    public function report_master_equipment($tgl1, $tgl2, $sort)
    {
        $data['equipment'] = $this->Report_model->get_by_master_equipment($tgl1, $tgl2, $sort);
        $data['tgl1'] = $tgl1;
        $data['tgl2'] = $tgl2;
        $data['sort'] = $sort;
        $this->load->view('report/master_equipment_pdf', $data);
    }
}

/* End of file Pdf.php */

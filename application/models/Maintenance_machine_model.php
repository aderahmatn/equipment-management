<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance_machine_model extends CI_Model
{
    private $_table = "em_transaction_maintenance_machine";

    public $id_transaction_maintenance_machine;
    public $id_master_equipment;
    public $id_transaction_main_process;
    public $severity_value;
    public $detection_value;
    public $occurence_value;
    public $frpn_value;
    public $fmea_type;
    public $date_maintenance_machine;
    public $status_maintenance_machine;



    public function rules()
    {
        return [
            [
                'field' => 'id_master_equipment',
                'label' => 'Equipment',
                'rules' => 'required'
            ],
            [
                'field' => 'id_master_main_process',
                'label' => 'Machine Trouble',
                'rules' => 'required'
            ],
            [
                'field' => 'id_master_occurence',
                'label' => 'Occurence',
                'rules' => 'required'
            ],
            [
                'field' => 'id_master_severity',
                'label' => 'severity',
                'rules' => 'required'
            ],
            [
                'field' => 'id_master_detection',
                'label' => 'detection',
                'rules' => 'required'
            ],
            [
                'field' => 'frpn_value',
                'label' => 'frpn',
                'rules' => 'required'
            ],
            [
                'field' => 'fmea_type',
                'label' => 'fmea',
                'rules' => 'required'
            ],
            [
                'field' => 'date_maintenance_machine',
                'label' => 'Date maintenance machine',
                'rules' => 'required'
            ]
        ];
    }
    function get_summary_maintenance()
    {
        $query = $this->db->query("SELECT date_maintenance_machine,
        COUNT(IF(status_maintenance_machine='not fixed yet', 1, NULL)) as status_belum,
        COUNT(IF(status_maintenance_machine='already repaired', 1, NULL)) as status_sudah

        FROM
        em_transaction_maintenance_machine
        GROUP BY date_maintenance_machine");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return json_encode($hasil);
        }
    }
    public function get_latest_maintenance_machine()
    {
        $query = $this->db->query("SELECT  * FROM em_transaction_maintenance_machine  ORDER BY id_transaction_maintenance_machine DESC LIMIT 1");
        return $query->row();
    }
    public function get_already_maintenance()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('status_maintenance_machine', 'already repaired');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_not_yet_maintenance()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('status_maintenance_machine', 'not fixed yet');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_transaction_maintenance_machine.id_master_equipment', 'left');

        $this->db->join('em_transaction_main_process', 'em_transaction_main_process.id_transaction_main_process = em_transaction_maintenance_machine.id_transaction_main_process', 'left');

        $this->db->join('em_master_main_process', 'em_master_main_process.id_master_main_process = em_transaction_main_process.id_master_main_process', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_transaction_maintenance_machine.id_master_equipment', 'left');

        $this->db->join('em_transaction_main_process', 'em_transaction_main_process.id_transaction_main_process = em_transaction_maintenance_machine.id_transaction_main_process', 'left');

        $this->db->join('em_master_main_process', 'em_master_main_process.id_master_main_process = em_transaction_main_process.id_master_main_process', 'left');
        $this->db->where('id_transaction_maintenance_machine', $id);

        $query = $this->db->get();
        return $query->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->id_master_equipment = $post['id_master_equipment'];
        $this->id_transaction_main_process = $post['id_master_main_process'];
        $this->occurence_value = $post['id_master_occurence'];
        $this->severity_value = $post['id_master_severity'];
        $this->detection_value = $post['id_master_detection'];
        $this->frpn_value = $post['frpn_value'];
        $this->fmea_type = $post['fmea_type'];
        $this->date_maintenance_machine = $post['date_maintenance_machine'];
        $this->status_maintenance_machine = 'not fixed yet';
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_transaction_maintenance_machine', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('id_master_equipment', $post['id_master_equipment']);
        $this->db->set('id_transaction_main_process', $post['id_master_main_process']);
        $this->db->set('occurence_value', $post['id_master_occurence']);
        $this->db->set('severity_value', $post['id_master_severity']);
        $this->db->set('detection_value', $post['id_master_detection']);
        $this->db->set('frpn_value', $post['frpn_value']);
        $this->db->set('fmea_type', $post['fmea_type']);
        $this->db->set('date_maintenance_machine', $post['date_maintenance_machine']);
        $this->db->where('id_transaction_maintenance_machine', $post['id_transaction_maintenance_machine']);
        $this->db->update($this->_table);
    }
    public function update_status($post)
    {
        $post = $this->input->post();
        $this->db->set('status_maintenance_machine', $post['status_maintenance_machine']);
        $this->db->where('id_transaction_maintenance_machine', $post['id_transaction_maintenance_machine']);
        $this->db->update($this->_table);
    }
    public function get_frpn_by_equipment($id)
    {
        $this->db->select('SUM(frpn_value) as overall');
        // $this->db->select('frpn_value');
        $this->db->where('id_master_equipment', $id);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file Transaction_main_process_model.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function rules_master_equipment()
    {
        return [
            [
                'field' => 'sort_by',
                'label' => 'Sort by',
                'rules' => 'required'
            ],
            [
                'field' => 'start_date',
                'label' => 'Start date',
                'rules' => 'required'
            ],
            [
                'field' => 'finish_date',
                'label' => 'Finish date',
                'rules' => 'required'
            ]
        ];
    }
    public function rules_maintenance_machine()
    {
        return [
            [
                'field' => 'finish_date',
                'label' => 'Finish date',
                'rules' => 'required'
            ],
            [
                'field' => 'start_date',
                'label' => 'Start date',
                'rules' => 'required'
            ]
        ];
    }
    public function rules_main_process()
    {
        return [
            [
                'field' => 'id_master_main_process',
                'label' => 'Main process',
                'rules' => 'required'
            ]
        ];
    }
    public function rules_machine_shrinkage()
    {
        return [
            [
                'field' => 'id_master_equipment',
                'label' => 'Equipment',
                'rules' => 'required'
            ]
        ];
    }
    public function get_by_master_equipment($tgl1, $tgl2, $sort)
    {
        $this->db->select('*');
        if ($sort == 'purchase') {
            $this->db->where('machine_purchase_date >=', $tgl1);
            $this->db->where('machine_purchase_date <=', $tgl2);
        } else {
            $this->db->where('machine_enter_line >=', $tgl1);
            $this->db->where('machine_enter_line <=', $tgl2);
        }
        $this->db->from('em_master_equipment');
        $this->db->order_by('machine_purchase_date', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_maintenance_machine($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->where('date_maintenance_machine >=', $tgl1);
        $this->db->where('date_maintenance_machine <=', $tgl2);
        $this->db->from('em_transaction_maintenance_machine');
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_transaction_maintenance_machine.id_master_equipment', 'left');
        $this->db->join('em_transaction_main_process', 'em_transaction_main_process.id_transaction_main_process = em_transaction_maintenance_machine.id_transaction_main_process', 'left');
        $this->db->join('em_master_main_process', 'em_master_main_process.id_master_main_process = em_transaction_main_process.id_master_main_process', 'left');
        $this->db->order_by('date_maintenance_machine', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_main_process($mp)
    {
        $this->db->select('*');
        $this->db->where('em_transaction_main_process.id_master_main_process =', $mp);
        $this->db->from('em_transaction_main_process');
        $this->db->join('em_master_main_process', 'em_master_main_process.id_master_main_process = em_transaction_main_process.id_master_main_process', 'left');
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_transaction_main_process.id_master_equipment', 'left');
        $this->db->order_by('em_transaction_main_process.created_date', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_machine_shrinkage($equip)
    {
        $this->db->select('*');
        $this->db->where('em_machine_shrinkage.id_master_equipment =', $equip);
        $this->db->from('em_machine_shrinkage');
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_machine_shrinkage.id_master_equipment', 'left');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Report_model.php */

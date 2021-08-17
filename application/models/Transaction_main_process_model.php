<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_main_process_model extends CI_Model
{
    private $_table = "em_transaction_main_process";

    public $id_transaction_main_process;
    public $id_master_equipment;
    public $id_master_main_process;
    public $qty_transaction_main_process;
    public $machine_trouble;
    public $created_date;


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
                'label' => 'Main Process',
                'rules' => 'required'
            ],
            [
                'field' => 'qty',
                'label' => 'Qty',
                'rules' => 'required'
            ],
            [
                'field' => 'machine_trouble',
                'label' => 'Machine Trouble',
                'rules' => 'required'
            ]
        ];
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_transaction_main_process.id_master_equipment', 'left');
        $this->db->join('em_master_main_process', 'em_master_main_process.id_master_main_process = em_transaction_main_process.id_master_main_process', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_transaction_main_process" => $id])->row();
    }
    public function get_by_equipment($id)
    {
        return $this->db->get_where($this->_table, ["id_master_equipment" => $id])->result();
    }

    public function add($post)
    {
        $post = $this->input->post();
        $this->id_master_equipment = $post['id_master_equipment'];
        $this->id_master_main_process = $post['id_master_main_process'];
        $this->qty_transaction_main_process = $post['qty'];
        $this->machine_trouble = $post['machine_trouble'];
        $this->created_date = date('Y-m-d');
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_transaction_main_process', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('id_master_equipment', $post['id_master_equipment']);
        $this->db->set('id_master_main_process', $post['id_master_main_process']);
        $this->db->set('qty_transaction_main_process', $post['qty']);
        $this->db->set('machine_trouble', $post['machine_trouble']);
        $this->db->where('id_transaction_main_process', $post['id_transaction_main_process']);
        $this->db->update($this->_table);
    }
    public function get_latest_main_process_tr()
    {
        $query = $this->db->query("SELECT  * FROM em_transaction_main_process  ORDER BY id_transaction_main_process DESC LIMIT 1");
        return $query->row();
    }
}

/* End of file Transaction_main_process_model.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_proces_model extends CI_Model
{

    private $_table = "em_master_main_process";

    public $id_master_main_process;
    public $main_process_code;
    public $main_process;
    public $max_capacity_daily;


    public function rules()
    {
        return [
            [
                'field' => 'main_process_code',
                'label' => 'Main Process Code',
                'rules' => 'required'
            ],
            [
                'field' => 'main_process',
                'label' => 'Main Process',
                'rules' => 'required'
            ],
            [
                'field' => 'max_capacity_daily',
                'label' => 'Max Capacity Daily',
                'rules' => 'required'
            ]
        ];
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_master_main_process" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->main_process_code = $post['main_process_code'];
        $this->main_process = $post['main_process'];
        $this->max_capacity_daily = $post['max_capacity_daily'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_master_main_process', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('main_process_code', $post['main_process_code']);
        $this->db->set('main_process', $post['main_process']);
        $this->db->set('max_capacity_daily', $post['max_capacity_daily']);
        $this->db->where('id_master_main_process', $post['id_master_main_process']);
        $this->db->update($this->_table);
    }
}

/* End of file pemlik_m.php */

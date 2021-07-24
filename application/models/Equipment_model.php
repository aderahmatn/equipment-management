<?php


class Equipment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get equipment by id_master_equipment
     */
    function get_equipment($id_master_equipment)
    {
        return $this->db->get_where('em_master_equipment', array('id_master_equipment' => $id_master_equipment))->row_array();
    }

    /*
     * Get all equipment
     */
    function get_all_equipment()
    {
        $this->db->order_by('id_master_equipment', 'desc');
        return $this->db->get('em_master_equipment')->result_array();
    }

    /*
     * function to add new equipment
     */
    function add_equipment($params)
    {
        $this->db->insert('em_master_equipment', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update equipment
     */
    function update_equipment($id_master_equipment, $params)
    {
        $this->db->where('id_master_equipment', $id_master_equipment);
        return $this->db->update('em_master_equipment', $params);
    }

    /*
     * function to delete equipment
     */
    function delete_equipment($id_master_equipment)
    {
        return $this->db->delete('em_master_equipment', array('id_master_equipment' => $id_master_equipment));
    }
}

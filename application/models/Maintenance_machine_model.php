<?php

class Maintenance_machine_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get maintenance_machine by id_transaction_maintenance_machine
     */
    function get_maintenance_machine($id_transaction_maintenance_machine)
    {
        return $this->db->get_where('em_transaction_maintenance_machine', array('id_transaction_maintenance_machine' => $id_transaction_maintenance_machine))->row_array();
    }

    /*
     * Get all maintenance_machine
     */
    function get_all_maintenance_machine()
    {
        $this->db->order_by('id_transaction_maintenance_machine', 'desc');
        return $this->db->get('em_transaction_maintenance_machine')->result_array();
    }

    /*
     * function to add new maintenance_machine
     */
    function add_maintenance_machine($params)
    {
        $this->db->insert('em_transaction_maintenance_machine', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update maintenance_machine
     */
    function update_maintenance_machine($id_transaction_maintenance_machine, $params)
    {
        $this->db->where('id_transaction_maintenance_machine', $id_transaction_maintenance_machine);
        return $this->db->update('em_transaction_maintenance_machine', $params);
    }

    /*
     * function to delete maintenance_machine
     */
    function delete_maintenance_machine($id_transaction_maintenance_machine)
    {
        return $this->db->delete('em_transaction_maintenance_machine', array('id_transaction_maintenance_machine' => $id_transaction_maintenance_machine));
    }
}

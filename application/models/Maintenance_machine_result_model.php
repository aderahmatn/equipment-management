<?php


class Maintenance_machine_result_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get maintenance_machine_result by id_transaction_maintenance_machine_results
     */
    function get_maintenance_machine_result($id_transaction_maintenance_machine_results)
    {
        return $this->db->get_where('em_transaction_maintenance_machine_results', array('id_transaction_maintenance_machine_results' => $id_transaction_maintenance_machine_results))->row_array();
    }

    /*
     * Get all maintenance_machine_results
     */
    function get_all_maintenance_machine_results()
    {
        $this->db->order_by('id_transaction_maintenance_machine_results', 'desc');
        return $this->db->get('em_transaction_maintenance_machine_results')->result_array();
    }

    /*
     * function to add new maintenance_machine_result
     */
    function add_maintenance_machine_result($params)
    {
        $this->db->insert('em_transaction_maintenance_machine_results', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update maintenance_machine_result
     */
    function update_maintenance_machine_result($id_transaction_maintenance_machine_results, $params)
    {
        $this->db->where('id_transaction_maintenance_machine_results', $id_transaction_maintenance_machine_results);
        return $this->db->update('em_transaction_maintenance_machine_results', $params);
    }

    /*
     * function to delete maintenance_machine_result
     */
    function delete_maintenance_machine_result($id_transaction_maintenance_machine_results)
    {
        return $this->db->delete('em_transaction_maintenance_machine_results', array('id_transaction_maintenance_machine_results' => $id_transaction_maintenance_machine_results));
    }
}

<?php

class Main_proces_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get main_proces by id_transaction_main_process
     */
    function get_main_proces($id_transaction_main_process)
    {
        return $this->db->get_where('em_transaction_main_process', array('id_transaction_main_process' => $id_transaction_main_process))->row_array();
    }

    /*
     * Get all main_process
     */
    function get_all_main_process()
    {
        $this->db->order_by('id_transaction_main_process', 'desc');
        return $this->db->get('em_transaction_main_process')->result_array();
    }

    /*
     * function to add new main_proces
     */
    function add_main_proces($params)
    {
        $this->db->insert('em_transaction_main_process', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update main_proces
     */
    function update_main_proces($id_transaction_main_process, $params)
    {
        $this->db->where('id_transaction_main_process', $id_transaction_main_process);
        return $this->db->update('em_transaction_main_process', $params);
    }

    /*
     * function to delete main_proces
     */
    function delete_main_proces($id_transaction_main_process)
    {
        return $this->db->delete('em_transaction_main_process', array('id_transaction_main_process' => $id_transaction_main_process));
    }
}

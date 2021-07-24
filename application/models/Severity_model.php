<?php


class Severity_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get severity by id_master_severity
     */
    function get_severity($id_master_severity)
    {
        return $this->db->get_where('em_master_severity', array('id_master_severity' => $id_master_severity))->row_array();
    }

    /*
     * Get all severity
     */
    function get_all_severity()
    {
        $this->db->order_by('id_master_severity', 'desc');
        return $this->db->get('em_master_severity')->result_array();
    }

    /*
     * function to add new severity
     */
    function add_severity($params)
    {
        $this->db->insert('em_master_severity', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update severity
     */
    function update_severity($id_master_severity, $params)
    {
        $this->db->where('id_master_severity', $id_master_severity);
        return $this->db->update('em_master_severity', $params);
    }

    /*
     * function to delete severity
     */
    function delete_severity($id_master_severity)
    {
        return $this->db->delete('em_master_severity', array('id_master_severity' => $id_master_severity));
    }
}

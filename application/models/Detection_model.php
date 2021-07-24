<?php


class Detection_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get detection by id_master_detection
     */
    function get_detection($id_master_detection)
    {
        return $this->db->get_where('em_master_detection', array('id_master_detection' => $id_master_detection))->row_array();
    }

    /*
     * Get all detection
     */
    function get_all_detection()
    {
        $this->db->order_by('id_master_detection', 'desc');
        return $this->db->get('em_master_detection')->result_array();
    }

    /*
     * function to add new detection
     */
    function add_detection($params)
    {
        $this->db->insert('em_master_detection', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update detection
     */
    function update_detection($id_master_detection, $params)
    {
        $this->db->where('id_master_detection', $id_master_detection);
        return $this->db->update('em_master_detection', $params);
    }

    /*
     * function to delete detection
     */
    function delete_detection($id_master_detection)
    {
        return $this->db->delete('em_master_detection', array('id_master_detection' => $id_master_detection));
    }
}

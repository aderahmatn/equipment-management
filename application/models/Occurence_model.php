<?php


class Occurence_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get occurence by id_master_occurence
     */
    function get_occurence($id_master_occurence)
    {
        return $this->db->get_where('em_master_occurence', array('id_master_occurence' => $id_master_occurence))->row_array();
    }

    /*
     * Get all occurence
     */
    function get_all_occurence()
    {
        $this->db->order_by('id_master_occurence', 'desc');
        return $this->db->get('em_master_occurence')->result_array();
    }

    /*
     * function to add new occurence
     */
    function add_occurence($params)
    {
        $this->db->insert('em_master_occurence', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update occurence
     */
    function update_occurence($id_master_occurence, $params)
    {
        $this->db->where('id_master_occurence', $id_master_occurence);
        return $this->db->update('em_master_occurence', $params);
    }

    /*
     * function to delete occurence
     */
    function delete_occurence($id_master_occurence)
    {
        return $this->db->delete('em_master_occurence', array('id_master_occurence' => $id_master_occurence));
    }
}

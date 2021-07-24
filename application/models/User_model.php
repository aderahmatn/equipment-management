<?php


class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by id_master_create_user
     */
    function get_user($id_master_create_user)
    {
        return $this->db->get_where('em_master_create_user', array('id_master_create_user' => $id_master_create_user))->row_array();
    }

    /*
     * Get all user
     */
    function get_all_user()
    {
        $this->db->order_by('id_master_create_user', 'desc');
        return $this->db->get('em_master_create_user')->result_array();
    }

    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('em_master_create_user', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user
     */
    function update_user($id_master_create_user, $params)
    {
        $this->db->where('id_master_create_user', $id_master_create_user);
        return $this->db->update('em_master_create_user', $params);
    }

    /*
     * function to delete user
     */
    function delete_user($id_master_create_user, $file)
    {
        unlink(FCPATH . "uploads/picture/" . $file);
        return $this->db->delete('em_master_create_user', array('id_master_create_user' => $id_master_create_user));
    }
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('em_master_create_user');
        $this->db->where('nik', $post['nik']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }
}
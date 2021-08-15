<?php


class Equipment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_data_entry_machine()
    {
        $query = $this->db->query("SELECT
	machine_enter_line,
	sum(em_master_equipment.qty) AS total_entry
FROM
	em_master_equipment
GROUP BY
	machine_enter_line");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return json_encode($hasil);
        }
    }
    /*
     * Get equipment by id_master_equipment
     */
    function get_equipment($id_master_equipment)
    {
        return $this->db->get_where('em_master_equipment', array('id_master_equipment' => $id_master_equipment))->row_array();
    }
    public function get_total()
    {
        $query = $this->db->get('em_master_equipment');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
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

    public function update_qty($post)
    {
        $post = $this->input->post();
        $this->db->set('qty', $post['now']);
        $this->db->where('id_master_equipment', $post['id_master_equipment']);
        $this->db->update('em_master_equipment');
    }
    public function get_letest_equipment()
    {
        $query = $this->db->query("SELECT  * FROM em_master_equipment  ORDER BY id_master_equipment DESC LIMIT 1");
        return $query->row();
    }
}

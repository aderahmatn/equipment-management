<?php


class Machine_shrinkage_model extends CI_Model
{

    private $_table = "em_machine_shrinkage";

    public $id_machine_shrinkage;
    public $id_master_equipment;
    public $overall_frpn;
    public $qty_machine_shrinkage;


    public function rules()
    {
        return [
            [
                'field' => 'id_master_equipment',
                'label' => 'Equipment',
                'rules' => 'required'
            ],
            [
                'field' => 'qty_machine_shrinkage',
                'label' => 'Qty',
                'rules' => 'required'
            ]
        ];
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->join('em_master_equipment', 'em_master_equipment.id_master_equipment = em_machine_shrinkage.id_master_equipment', 'left');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_machine_shrinkage" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->id_master_equipment = $post['id_master_equipment'];
        $this->overall_frpn = $post['overall_frpn'];
        $this->qty_machine_shrinkage = $post['qty_machine_shrinkage'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_machine_shrinkage', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('occurence_type', $post['occurence_type']);
        $this->db->set('probability_of_damage', $post['probability_of_damage']);
        $this->db->set('occurence_value', $post['occurence_value']);
        $this->db->set('rangkings', $post['rangkings']);
        $this->db->where('id_master_occurence', $post['id_master_occurence']);
        $this->db->update($this->_table);
    }
}

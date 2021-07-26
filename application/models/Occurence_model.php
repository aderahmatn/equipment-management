<?php


class Occurence_model extends CI_Model
{

    private $_table = "em_master_occurence";

    public $id_master_occurence;
    public $occurence_type;
    public $probability_of_damage;
    public $occurence_value;
    public $rangkings;


    public function rules()
    {
        return [
            [
                'field' => 'occurence_type',
                'label' => 'Occurence Type',
                'rules' => 'required'
            ],
            [
                'field' => 'probability_of_damage',
                'label' => 'Probability Of Damage',
                'rules' => 'required'
            ],
            [
                'field' => 'occurence_value',
                'label' => 'Occurence Value',
                'rules' => 'required'
            ],
            [
                'field' => 'rangkings',
                'label' => 'Rangkings',
                'rules' => 'required'
            ]
        ];
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_master_occurence" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->occurence_type = $post['occurence_type'];
        $this->probability_of_damage = $post['probability_of_damage'];
        $this->occurence_value = $post['occurence_value'];
        $this->rangkings = $post['rangkings'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_master_occurence', $id);
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

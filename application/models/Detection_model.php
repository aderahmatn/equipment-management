<?php


class Detection_model extends CI_Model
{
    private $_table = "em_master_detection";

    public $id_master_detection;
    public $detection_type;
    public $criteria;
    public $detection_value;
    public $rangkings;


    public function rules()
    {
        return [
            [
                'field' => 'detection_type',
                'label' => 'Detection Type',
                'rules' => 'required'
            ],
            [
                'field' => 'criteria',
                'label' => 'Criteria',
                'rules' => 'required'
            ],
            [
                'field' => 'detection_value',
                'label' => 'detection Value',
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
        return $this->db->get_where($this->_table, ["id_master_detection" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->detection_type = $post['detection_type'];
        $this->criteria = $post['criteria'];
        $this->detection_value = $post['detection_value'];
        $this->rangkings = $post['rangkings'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_master_detection', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('detection_type', $post['detection_type']);
        $this->db->set('criteria', $post['criteria']);
        $this->db->set('detection_value', $post['detection_value']);
        $this->db->set('rangkings', $post['rangkings']);
        $this->db->where('id_master_detection', $post['id_master_detection']);
        $this->db->update($this->_table);
    }
}

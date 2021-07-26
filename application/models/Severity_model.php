<?php


class Severity_model extends CI_Model
{
    private $_table = "em_master_severity";

    public $id_master_severity;
    public $severity_type;
    public $severity_effect;
    public $severity_value;
    public $rangkings;


    public function rules()
    {
        return [
            [
                'field' => 'severity_type',
                'label' => 'Severity Type',
                'rules' => 'required'
            ],
            [
                'field' => 'severity_effect',
                'label' => 'Severity Effect',
                'rules' => 'required'
            ],
            [
                'field' => 'severity_value',
                'label' => 'Severity Value',
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
        return $this->db->get_where($this->_table, ["id_master_Severity" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->severity_type = $post['severity_type'];
        $this->severity_effect = $post['severity_effect'];
        $this->severity_value = $post['severity_value'];
        $this->rangkings = $post['rangkings'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_master_severity', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('severity_type', $post['severity_type']);
        $this->db->set('severity_effect', $post['severity_effect']);
        $this->db->set('severity_value', $post['severity_value']);
        $this->db->set('rangkings', $post['rangkings']);
        $this->db->where('id_master_severity', $post['id_master_severity']);
        $this->db->update($this->_table);
    }
}

<?php


class Machine_shrinkage_model extends CI_Model
{

    private $_table = "em_machine_shrinkage";

    public $id_machine_shrinkage;
    public $id_master_equipment;
    public $overall_frpn;
    public $qty_machine_shrinkage;
    public $date_shrinkage;


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
    public function get_latest_machine_shrinkage()
    {
        $query = $this->db->query("SELECT  * FROM em_machine_shrinkage  ORDER BY id_machine_shrinkage DESC LIMIT 1");
        return $query->row();
    }
    function get_data_out_machine()
    {
        $query = $this->db->query("SELECT
	date_shrinkage,
	sum(qty_machine_shrinkage) AS total_out
FROM
	em_machine_shrinkage
GROUP BY
	date_shrinkage");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return json_encode($hasil);
        }
    }
    public function get_total()
    {
        $query = $this->db->get('em_machine_shrinkage');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function get_all()
    {

        $query = $this->db->query('SELECT
	em_master_equipment.machine_code,
	em_master_equipment.equipment_name,
	em_master_equipment.line,
	em_master_equipment.qty,
	SUM(qty_machine_shrinkage) AS qty_shrinkage,
	SUM(overall_frpn) AS overall_frpn
FROM
	em_machine_shrinkage
	INNER JOIN em_master_equipment ON em_master_equipment.id_master_equipment = em_machine_shrinkage.id_master_equipment
GROUP BY
	em_machine_shrinkage.id_master_equipment');

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
        $this->date_shrinkage = date('Y-m-d');
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

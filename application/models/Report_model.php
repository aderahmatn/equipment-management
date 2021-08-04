<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function rules_master_equipment()
    {
        return [
            [
                'field' => 'sort_by',
                'label' => 'Sort by',
                'rules' => 'required'
            ],
            [
                'field' => 'start_date',
                'label' => 'Start date',
                'rules' => 'required'
            ],
            [
                'field' => 'finish_date',
                'label' => 'Finish date',
                'rules' => 'required'
            ]
        ];
    }
    public function get_by_master_equipment($tgl1, $tgl2, $sort)
    {
        $this->db->select('*');
        if ($sort == 'purchase') {
            $this->db->where('machine_purchase_date >=', $tgl1);
            $this->db->where('machine_purchase_date <=', $tgl2);
        } else {
            $this->db->where('machine_enter_line >=', $tgl1);
            $this->db->where('machine_enter_line <=', $tgl2);
        }
        $this->db->from('em_master_equipment');
        $this->db->order_by('machine_purchase_date', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_total($tgl1, $tgl2, $pemilik, $status)
    {
        $this->db->select_sum('kontrakan.harga');
        $this->db->where('pesanan.tgl_pesanan >=', $tgl1);
        $this->db->where('pesanan.tgl_pesanan <=', $tgl2);
        $this->db->from('pesanan');
        if ($status != 'all') {
            $this->db->where('pesanan.status_pemesanan =', $status);
        }
        $this->db->join('users', 'users.id_user = pesanan.id_user');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan');
        $this->db->join('owners', 'owners.id_owner = kontrakan.id_owner');
        if ($pemilik != 'all') {
            $this->db->where('kontrakan.id_owner =', $pemilik);
        }
        $this->db->order_by('pesanan.tgl_pesanan', 'asc');
        $query = $this->db->get();
        $row = $query->row();
        return $row->harga;
    }
}

/* End of file Report_model.php */

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Get_model extends CI_Model
{

    public $table = 'data_cus_aktif';
    public $id = 'id_cus_aktif ';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    public function listing() {
        $id_cabang_sales    = $this->session->userdata('id_cabang');
        $this->db->select('t1.*,t2.*');
        $this->db->from('data_cus_aktif as t1');
        $this->db->join('cabang as t2','t1.id_cabang=t2.id_cabang');
        $this->db->where('t1.id_cabang',$id_cabang_sales);

                $this->db->order_by('id_cus_aktif','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}
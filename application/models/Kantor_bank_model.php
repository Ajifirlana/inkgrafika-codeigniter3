<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kantor_bank_model extends CI_Model
{

    public $table = 'kantor_bank';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function getalltwotable(){
        $this->db->select('kantor_bank.*');
            $this->db->from('kantor_bank');
            $this->db->join('laporan_kerja','kantor_bank.id = laporan_kerja.alamat_instansi_d','LEFT');
            $this->db->group_by('id', 'DESC LIMIT 1');
             $query = $this->db->get();
        return $query->result();
    }

    function getall()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
      function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
     function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
      function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function join($alamat_instansi_d)
    {
        $this->db->where($this->id, $alamat_instansi_d);
        return $this->db->get($this->table)->row();
    }
}

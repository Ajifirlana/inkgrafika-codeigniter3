<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Injectpns_model extends CI_Model
{

    public $table = 'inject_data_pns';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

      function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function delete_all(){
        $this->db->empty_table($this->table);       
    }
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function download_inject_pns($tgl_lapor){
        $this->db->select('*');
        $this->db->from($this->table);

         $this->db->where('tgl_lapor', $tgl_lapor);
        $this->db->order_by('id','DESC');

        $query = $this->db->get();
        return $query->result();
    }

}
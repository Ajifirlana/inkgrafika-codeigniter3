<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prapen_model extends CI_Model
{
	 public $table = 'data_cus_prapen';
    public $id = 'id_cus_prapen';
    public $order = 'DESC';
     function __construct()
    {
        parent::__construct();
    }
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    
     function get_limit_data() {
        $this->db->order_by($this->id, $this->order);
       
        return $this->db->get($this->table)->result();
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
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
}
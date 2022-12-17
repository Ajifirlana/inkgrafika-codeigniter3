<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Injectasabri_model extends CI_Model
{

    public $table = 'inject_data_asabri';
    public $id = 'id';
    public $order = 'DESC';
public $limit= '10';
    function __construct()
    {
        parent::__construct();
    }

      function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

     function filterteendata()
    {
        $tgl_lapor = date('Y-m-d');
        $this->db->where('tgl_lapor',$tgl_lapor);
        $this->db->order_by($this->id, $this->order);
$this->db->limit(10); 
        return $this->db->get($this->table)->result();
    }

    function filterteenpns(){

        $tgl_lapor = date('Y-m-d');
        $this->db->where('tgl_lapor',$tgl_lapor);
        $this->db->order_by($this->id, $this->order);
$this->db->limit(10); 
        return $this->db->get('inject_data_pns')->result();
    }

    function filterteenprapensiun(){

        $tgl_lapor = date('Y-m-d');
        $this->db->where('tgl_lapor',$tgl_lapor);
        $this->db->order_by($this->id, $this->order);
$this->db->limit(10); 
        return $this->db->get('inject_data_prapensiun')->result();   
    }

    function filterteenumkm(){

        $tgl_lapor = date('Y-m-d');
        $this->db->where('tgl_lapor',$tgl_lapor);
        $this->db->order_by($this->id, $this->order);
$this->db->limit(10); 
        return $this->db->get('inject_data_umkm')->result();     
    }

    function filterteentaspen(){

        $tgl_lapor = date('Y-m-d');
        $this->db->where('tgl_lapor',$tgl_lapor);
        $this->db->order_by($this->id, $this->order);
$this->db->limit(10); 
        return $this->db->get('inject_data_taspen')->result();     
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
    
    function delete_all(){
        $this->db->empty_table($this->table);       
    }
     function download_inject_asabri($tgl_lapor){
        $this->db->select('*');
        $this->db->from($this->table);

         $this->db->where('tgl_lapor', $tgl_lapor);
        $this->db->order_by('id','DESC');

        $query = $this->db->get();
        return $query->result();
    }

}
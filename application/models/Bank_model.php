<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bank_model extends CI_Model
{

    public $table = 'bank';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
     function getall()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
     function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
}
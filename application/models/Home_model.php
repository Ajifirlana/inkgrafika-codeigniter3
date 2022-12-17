<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model
{
	 public $table = 'data_cus_aktif';
    public $id = 'id_cus_aktif';
    public $order = 'DESC';
     function __construct()
    {
        parent::__construct();
    }
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}
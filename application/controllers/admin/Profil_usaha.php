<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_usaha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Profil_model');
        $this->load->library('form_validation');
    }

    public function index()
    { 

		$data = array(  
            
				'title'=>'Inkgrafika',
            'isi'    => 'admin/profil/list');

$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_usaha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->library('form_validation');
    }

    public function index()
    { 

        $row = $this->Profil_model->get_by_id('1');
		$data = array(  

        'title'                =>'Edit Data Profil',
            'id'=>$row->id,
            'nama_usaha'=>$row->nama_usaha,
            'alamat'=>$row->alamat,
				'title'=>'Inkgrafika',
            'isi'    => 'admin/profil/profile');

$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    function update(){
        $data = array('nama_usaha'=>$this->input->post('nama_usaha'),
                    'alamat'=>$this->input->post('alamat'));

            $this->Profil_model->update($this->input->post('id'), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            redirect(base_url('admin/profil_usaha'));
        echo "ok";
    }
}
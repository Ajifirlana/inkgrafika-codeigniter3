<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_prapensiun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prapen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $start = intval($this->input->get('start'));
        
    	$prapendata = $this->Prapen_model->get_limit_data();

        $data = array(
            'customer_data' => $prapendata,
            'start' => $start,

            'title'      =>'Data Customer Prapensiun',
            'isi'        =>'admin/customer_prapensiun/customer_list');
    $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => base_url('admin/customer_prapensiun/create_action'),
        'id_cus_prapen' => set_value('id_cus_prapen'),
        'nama_lengkap' => set_value('nama_lengkap'), 

        'alamat' => set_value('alamat'), 
        'jk_aktif' => set_value('jk_aktif'), 
        'no_hp' => set_value('no_hp'), 
        'tgl_lahir' => set_value('tgl_lahir'), 
        'gaji_saat_ini' => set_value('gaji_saat_ini'), 
        'jangka_pinjam_max' => set_value('jangka_pinjam_max'), 

        'keterangan' => set_value('keterangan'), 

       'title'          =>'Tambah Data Customer Prapensiun',
       'isi'            =>'admin/customer_prapensiun/customer_form');

       $this->load->view('admin/layout/wrapper', $data, FALSE); 
    }
     public function create_action() 
    {
      
            $data = array(

        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE), 

        'alamat' => $this->input->post('alamat',TRUE), 
        'jk_aktif' => $this->input->post('jk_aktif',TRUE), 
        'no_hp' => $this->input->post('no_hp',TRUE), 
        'tgl_lahir' => $this->input->post('tgl_lahir',TRUE), 
        'gaji_saat_ini' => $this->input->post('gaji_saat_ini',TRUE), 
        'jangka_pinjam_max' => $this->input->post('jangka_pinjam_max',TRUE),  

        'keterangan' => $this->input->post('keterangan',TRUE), 
        'jenis_pinjaman' => $this->input->post('jenis_pinjaman',TRUE), 
        );

            $this->Prapen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('admin/customer_prapensiun'));
        
    }
    public function delete($id) 
    {
        $row = $this->Prapen_model->get_by_id($id);

        if ($row) {
            $this->Prapen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('admin/customer_prapensiun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/customer_prapensiun'));
        }
    }
    public function update($id) 
    {
        $row = $this->Prapen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/customer_prapensiun/update_action'),
        'id_cus_prapen' => set_value('id_cus_prapen', $row->id_cus_prapen),
        'jk_aktif' => set_value('jk_aktif', $row->jk_aktif),
        'jenis_pinjaman' => set_value('jk_aktif', $row->jenis_pinjaman),
  'alamat' => set_value('jk_aktif', $row->alamat),
  'keterangan' => set_value('jk_aktif', $row->keterangan),

        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap), 
        'no_hp' => set_value('no_hp', $row->no_hp),
        'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
        'gaji_saat_ini' => set_value('gaji_saat_ini', $row->gaji_saat_ini),
        
        'jangka_pinjam_max' => set_value('jangka_pinjam_max', $row->jangka_pinjam_max), 

        'title'                =>'Edit Data Customer',
        'isi'                  =>'admin/customer_prapensiun/customer_form');

        $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/customer_prapensiun'));
        }
    }
    public function update_action() 
    {
            $data = array(
        'alamat' => $this->input->post('alamat',TRUE), 
        'keterangan' => $this->input->post('keterangan',TRUE), 

        'jenis_pinjaman' => $this->input->post('jenis_pinjaman',TRUE), 
        'jk_aktif' => $this->input->post('jk_aktif',TRUE), 
        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE), 
        'no_hp' => $this->input->post('no_hp',TRUE), 
        'tgl_lahir' => $this->input->post('tgl_lahir',TRUE), 
        'gaji_saat_ini' => $this->input->post('gaji_saat_ini',TRUE), 
        'jangka_pinjam_max' => $this->input->post('jangka_pinjam_max',TRUE),  
        );

            $this->Prapen_model->update($this->input->post('id_cus_prapen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('admin/customer_prapensiun'));
        
    }
    public function read($id) 
    {
        $row = $this->Prapen_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_cus_prapen' => $row->id_cus_prapen,
        'keterangan' => $row->keterangan, 
        'alamat' => $row->alamat, 

        'jenis_pinjaman' => $row->jenis_pinjaman, 
        'jk_aktif' => $row->jk_aktif, 
        'nama_lengkap' => $row->nama_lengkap, 
        'no_hp' => $row->no_hp, 
        'tgl_lahir' => $row->tgl_lahir, 
        'gaji_saat_ini' => $row->gaji_saat_ini, 
        'jangka_pinjam_max' => $row->jangka_pinjam_max,  

        'title'      =>'Detail Data Customer Prapensiun',
        'isi'        =>'admin/customer_prapensiun/customer_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/customer_prapensiun'));
        }
    }
   
}
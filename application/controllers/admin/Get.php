<?php

date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Get extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('Get_model');

        $this->load->model('Injectpns_model');
        $this->load->model('Injectasabri_model');
        $this->load->library('form_validation');
    }
    function index(){
    	$start = intval($this->input->get('start'));
        
 $getbycustomer = $this->Get_model->listing();

        $data = array(
            'getbycustomer' => $getbycustomer,
             'start' => $start,

            'title'      =>'Data By Customer',
            'isi'        =>'admin/getbycus/get_list');
             $this->load->view('admin/layout/wrapper', $data, FALSE);  

    }
    public function read($id) 
    {
        $row = $this->Get_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_cus_aktif' => $row->id_cus_aktif,
        'keterangan' => $row->keterangan, 
        'alamat' => $row->alamat, 

        'jenis_pinjaman' => $row->jenis_pinjaman, 
        'jk_aktif' => $row->jk_aktif, 
        'nama_lengkap' => $row->nama_lengkap, 
        'no_hp' => $row->no_hp, 
        'tgl_lahir' => $row->tgl_lahir, 
        'gaji_saat_ini' => $row->gaji_saat_ini, 
        'jangka_pinjam_max' => $row->jangka_pinjam_max,  

        'title'      =>'Detail Data Customer',
        'isi'        =>'admin/getbycus/get_read');

        $this->load->view('admin/layout/wrapper', $data, FALSE); 
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('admin/get'));
        }
    }

    function list_data_inject_asabri(){
            
        $start = intval($this->input->get('start'));
         $pns = $this->Injectasabri_model->filterteendata();

            $data = array(
                
            'customer_data' => $pns ,
            'title'      =>'Inject Data ASABRI',
                        'start' => $start,

            'isi'        =>'admin/getbycus/injectasabri_list',);

             $this->load->view('admin/layout/wrapper', $data, FALSE); 

    }

    function list_data_pns(){
        $start = intval($this->input->get('start'));
         $pns = $this->Injectasabri_model->filterteenpns();

            $data = array(
                
            'customer_data' => $pns ,
            'title'      =>'Inject Data PNS',
                        'start' => $start,

            'isi'        =>'admin/getbycus/injectdatapns',);

             $this->load->view('admin/layout/wrapper', $data, FALSE);         
    }

    function download_all(){

$tgl_lapor = date('y-m-d');
        $start = intval($this->input->get('start'));
$getfile = $this->Injectpns_model->download_inject_pns($tgl_lapor);

            $data = array(
                'file_download' => $getfile,

            'title'      =>'Download Inject Data PNS',
                        'start' => $start,

            'isi'        =>'admin/getbycus/download_inject_pns',);

              $this->load->view('admin/getbycus/download_inject_pns', $data, FALSE);          
    }

    function download_all_asabri(){

$tgl_lapor = date('y-m-d');
        $start = intval($this->input->get('start'));
$getfile = $this->Injectasabri_model->download_inject_asabri($tgl_lapor);

            $data = array(
                'file_download' => $getfile,

            'title'      =>'Download Inject Data PNS',
                        'start' => $start,

            'isi'        =>'admin/getbycus/download_inject_asabri',);

              $this->load->view('admin/getbycus/download_inject_asabri', $data, FALSE);          
    }

    function list_data_prapensiun(){

        $start = intval($this->input->get('start'));
         $pns = $this->Injectasabri_model->filterteenprapensiun();

            $data = array(
                
            'customer_data' => $pns ,
            'title'      =>'Inject Data PRAPENSIUN',
                        'start' => $start,

            'isi'        =>'admin/getbycus/injectdataprapensiun',);

             $this->load->view('admin/layout/wrapper', $data, FALSE);       
    }

    function list_data_umkm(){

        $start = intval($this->input->get('start'));
         $umkm = $this->Injectasabri_model->filterteenumkm();

            $data = array(
                
            'customer_data' => $umkm ,
            'title'      =>'Inject Data UMKM',
                        'start' => $start,

            'isi'        =>'admin/getbycus/injectdataumkm',);

             $this->load->view('admin/layout/wrapper', $data, FALSE);       
    }

    function list_data_taspen(){
        $start = intval($this->input->get('start'));
         $taspen = $this->Injectasabri_model->filterteentaspen();

            $data = array(
                
            'customer_data' => $taspen ,
            'title'      =>'Inject Data TASPEN',
                        'start' => $start,

            'isi'        =>'admin/getbycus/injectdatataspen',);

             $this->load->view('admin/layout/wrapper', $data, FALSE);    
    }
}
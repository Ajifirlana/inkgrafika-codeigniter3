<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->model('Profil_model');
        
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['banner'] = $this->Slider_model->get_all();
        $data['hero'] = $this->Slider_model->get_all();

        $data['row'] = $this->Profil_model->get_by_id('1');
        $this->load->view('website/menu_utama',$data);
    }

    
    public function page_search()
    {
        $this->load->view('user/page_search');
    }

    public function search()
    {
        $judul = $this->input->post('nama_produk');
        if ($judul === ' ') {
            $this->load->view('user/page_search');
        } else {
            $data['produk'] = $this->M_user->search_data($judul);
            $this->load->view('user/pencarian', $data);
        }
    }

    public function detail_produk($id_barang)
    {
        $data['detail'] = $this->M_user->tampil_detail($id_barang);
        $this->load->view('user/page_detail', $data);
    }
}

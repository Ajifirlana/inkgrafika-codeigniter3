<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Slider_model');
        $this->load->model('Artikel_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $slider = $this->Slider_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $artikel = $this->Artikel_model->get_all();
        $data = array(

            'slider' => $slider,
            'artikel' => $artikel,
            
            'karyawan' => $karyawan,
            'title' => 'Artikel'
        );

        $this->load->view('website/artikel/artikel.php',$data);
    }
    public function detail($judul)
    { 
        $slider = $this->Slider_model->get_all();
        $karyawan = $this->Karyawan_model->get_all();
        $artikel = $this->Artikel_model->detail_artikel($judul); 
        
        $data = array(

            'slider' => $slider,
            'judul' => $artikel->judul,
            'artikel' => $artikel->artikel,
            'deskripsi'=>$artikel->deskripsi,
            'karyawan' => $karyawan,
            'title' => 'Artikel'
        );
        $this->load->view('website/artikel/artikel_detail.php',$data);
    }
}
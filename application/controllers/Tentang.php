<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Cabang_model');
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
    	$slider = $this->Slider_model->get_all();
        $kantor_utama = $this->Karyawan_model->get_all();

       
        $cabang = $this->Cabang_model->get_all();
    	$data = array(

            'slider' => $slider,
            
            'kantor_utama' => $kantor_utama,
            'cabang' =>$cabang,
			'title' => 'Danapati Jaya Mandiri'
		);

		$this->load->view('website/tentang/tentang.php',$data);
    }
}
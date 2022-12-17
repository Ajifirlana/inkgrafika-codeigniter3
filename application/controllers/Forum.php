<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
    	$slider = $this->Slider_model->get_all();
        // $karyawan = $this->Karyawan_model->get_all();
    	$data = array(

            'slider' => $slider,
            
            // 'karyawan' => $karyawan,
			'title' => 'Danapati Jaya Mandiri'
		);

		$this->load->view('website/home/forum.php',$data);
    }
}